<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Stok barang',
            'list' => ['Home', 'Stok']
        ];
        $page = (object)[
            'title' => 'Daftar stok barang yang tedaftar dalam sistem'
        ];

        $activeMenu = 'stok';

        
        $user = UserModel::all();

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user'=>$user,'activeMenu' => $activeMenu]);
    }

    
    public function list(Request $request){
        $stoks = StokModel::select('stok_id', 'user_id', 'barang_id', 'stok_jumlah', 'stok_tanggal')
                    ->with('barang', 'user');
        if ($request->user_id){
            $stoks->where('user_id', $request->user_id);
        }
        
        return DataTables::of($stoks)
            ->addIndexColumn()
            ->addColumn('aksi', function($stok){
                $btn = '<a href="'.url('/stok/'.$stok->stok_id).'" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="'.url('/stok/'.$stok->stok_id.'/edit').'" class="btn btn-warning btn-sm">Edit</a>';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/stok/'.$stok->stok_id).'">'
                        . csrf_field().method_field('DELETE').
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin menghapus data ini?\');">Hapus</button</form>';
                        return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Stok',
            'list'  => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah stok baru'
        ];
        $barang = BarangModel::all();
        $activeMenu = 'stok';

        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page,'barang'=>$barang, 'activeMenu' => $activeMenu]);
    }
    
    public function store(Request $request){
        
        $request->validate([
        
            'barang_id' => 'required|integer',
            'stok_jumlah'  => 'required|integer|min:1'
            
        ]);

        $barangStok = StokModel::where('barang_id', $request->barang_id)->first();
    
        if ($barangStok) {
            $barangStok->stok_jumlah += $request->stok_jumlah;
            $barangStok->save();
        } else {
            StokModel::create([
                'user_id' => 3,
                'barang_id' => $request->barang_id,
                'barang_nama' => $request->barang_nama,
                'stok_jumlah' => $request->stok_jumlah,
                'stok_tanggal' => Carbon::now('Asia/Jakarta')
            ]);
        }

        return redirect('/stok')->with('success', 'Data barang berhasil disimpan');
    }
    
    public function show(string $id){
        $stok  = StokModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail stok',
            'list' => ['Home', 'Stok', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail user'
        ];

        $activeMenu = 'stok';
        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id){
        $stok  = StokModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit stok barang',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit stok barang'
        ];

        $barang = BarangModel::find($stok->barang_id);

        $activeMenu = 'stok';
        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'barang'=>$barang, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'barang_id' => 'required|integer',
            'stok_jumlah'  => 'required|integer|min:0'
            
        ]);

        StokModel::find($id)->update([
            'barang_id' => $request->barang_id,
            'stok_jumlah' => $request->stok_jumlah,
            'stok_tanggal' => Carbon::now('Asia/Jakarta')
        ]);


        return redirect('/stok')->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id){
        $check = StokModel::find($id);
        if(!$check){
            return redirect('/stok')->with('error', 'Data stok barang tidak ditemukan');
        }

        try{
            StokModel::destroy($id);
            return redirect('/stok')->with('success', 'Data stok barang berhasil dihapus');
        } catch(\Illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Data stok barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
