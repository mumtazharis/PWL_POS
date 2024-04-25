<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\PenjualanDetailModel;
use App\Models\penjualanModel;
use App\Models\StokModel;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;


class PenjualanController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar penjualan barang',
            'list' => ['Home', 'Penjualan']
        ];
        $page = (object)[
            'title' => 'Daftar penjualan barang yang tedaftar dalam sistem'
        ];

        $activeMenu = 'penjualan';

        
        $user = UserModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user'=>$user,'activeMenu' => $activeMenu]);
    }

    
    public function list(Request $request){
        $penjualans = PenjualanModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal')
                    ->with('user', 'penjualanDetail');
        if ($request->user_id){
            $penjualans->where('user_id', $request->user_id);
        }
        
        return DataTables::of($penjualans)
            ->addIndexColumn()
            ->addColumn('aksi', function($penjualan){
                $btn = '<a href="'.url('/penjualan/'.$penjualan->penjualan_id).'" class="btn btn-info btn-sm">Detail</a>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah penjualan',
            'list'  => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah penjualan baru'
        ];
        $barang = BarangModel::all();
        $latestPenjualanId = PenjualanModel::max('penjualan_id')+1;
        $kodePenjualan = "Penjualan " . "$latestPenjualanId";
        $activeMenu = 'penjualan';

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kodePenjualan' => $kodePenjualan,'barang'=>$barang, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        
        //dd($request->all());
        $request->validate([
            'pembeli' => 'required|string',
            'penjualan_kode' => 'required|string',
            'barang_id.*' => 'required|integer',
            'jumlah.*' => 'required|integer'
        ]);

        $penjualan = PenjualanModel::create([
            'user_id' => 3,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => Carbon::now('Asia/Jakarta')
        ]);
    
        foreach ($request->barang_id as $index => $barangId) {
            $barang = BarangModel::findOrFail($barangId);

            PenjualanDetailModel::create([
                'penjualan_id' => $penjualan->penjualan_id,
                'barang_id' => $barangId,
                'jumlah' => $request->jumlah[$index],
                'harga' => $barang->harga_jual
                // Tambahkan field lain jika ada
            ]);

            $stokBarang = StokModel::find($barangId);

            if ($stokBarang) {
                $stokBarang->update([
                    'stok_jumlah' => $stokBarang->stok_jumlah - $request->jumlah[$index],
                    'stok_tanggal' => Carbon::now('Asia/Jakarta')
                ]);
            }
        }

        return redirect('/penjualan')->with('success', 'Data barang berhasil disimpan');
    }

    public function show(string $id){
        $penjualan = penjualanModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Detail penjualan',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail penjualan'
        ];

        $totalHarga = $penjualan->penjualanDetail->sum(function ($item) {
            return $item->jumlah * $item->harga;
        });

        $activeMenu = 'penjualan';
        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'totalHarga' => $totalHarga, 'activeMenu' => $activeMenu]);
    }
}
