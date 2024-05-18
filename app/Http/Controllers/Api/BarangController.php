<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index(){
        return BarangModel::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'kategori_id' => 'required|integer',
            'barang_kode' => 'required|string|min:3|max:20|unique:m_barang,barang_kode',
            'barang_nama' => 'required|string|max:100',
            'harga_beli'  => 'required|integer',
            'harga_jual'  => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 442);
        }

        $barang = BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'image' => $request->image->hashName(),
        ]);

        return response()->json([
            'success' => true,
            'barang' => $barang,
        ], 201);
    }

    public function show($barang){
        return BarangModel::find($barang);
    }

    public function update(Request $request, BarangModel $barang){
        $validator = Validator::make($request->all(),[
            'kategori_id' => 'integer',
            'barang_kode' => 'string|min:3|max:20|unique:m_barang,barang_kode',
            'barang_nama' => 'string|max:100',
            'harga_beli'  => 'integer',
            'harga_jual'  => 'integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 442);
        }

        $data = $request->only(['kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->hashName();
            // Proses upload gambar bisa dilakukan di sini
        }
    
        $barang->update($data);
    

        return response()->json([
            'success' => true,
            'barang' => $barang->fresh(), // Mengambil data terbaru dari database
        ], 200);

    }

    public function destroy(BarangModel $barang){
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
