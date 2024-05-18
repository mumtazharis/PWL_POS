<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(){
        return PenjualanModel::all();
    }

    public function show($penjualan){
        $penjualan = PenjualanModel::with('penjualanDetail.barang')->find($penjualan);

        return response()->json($penjualan);
    }

}
