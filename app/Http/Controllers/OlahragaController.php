<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Olahraga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OlahragaController extends Controller
{
    public function index()
    {
        $data = Olahraga::all();
        return response()->json($data, 200);
    }
    //show data cara 1
    //  public function show(Customer $id){

    //     return response()->json($id,200);
    //  }

    //show data cara 2
    public function show($id)
    {

        $data = Olahraga::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak Ditemukan',
                'data' => null
            ], 404);
        }
        return response()->json([
            'pesan' => 'Data Ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_olahraga' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        $data = Olahraga::create($request->all());

        return response()->json([
            'pesan' => 'Data Berhasil Disimpan',
            'data' => $data
        ], 201);

    }
    public function update(Request $request, $id)
    {
        $data = Olahraga::where('id', $id)->first();

        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        // proses validasi
        $validate = Validator::make($request->all(), [
            'nama_olahraga' => 'required',
            'deskripsi' => 'required',

        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan perubahan data
        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }
    public function delete($id)
    {
        $data = Olahraga::where('id', $id)->first();
        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $data->delete();

        return response()->json([
            'pesan' => 'Data berhasil di hapus',
            'data' => $data
        ], 200);
    }
    //
}
