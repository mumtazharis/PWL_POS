@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
<div class="card-body">
@empty($penjualan)
<div class="alert alert-danger alert-dismissible">
    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
    Data yang Anda cari tidak ditemukan.
</div>
@else
<table class="table table-bordered table-striped table-hover tablesm">
    <tr>
        <th>ID Penjualan</th>
        <td>{{ $penjualan->penjualan_id }}</td>
    </tr>
    <tr>
        <th>Kode Penjualan</th>
        <td>{{ $penjualan->penjualan_kode }}</td>
    </tr>
    <tr>
        <th>Tanggal</th>
        <td>{{ $penjualan->penjualan_tanggal }}</td>
    </tr>
    <tr>
        <th>Nama Penjual</th>
        <td>{{ $penjualan->user->nama }}</td>
    </tr>
    <tr>
        <th>Nama pembeli</th>
        <td>{{ $penjualan->pembeli }}</td>
    </tr>
    
</table>
<br><br>
<table class="table table-bordered table-striped table-hover tablesm"> 
    <tr>
        <th>Nama barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Total</th>
    </tr>
    @foreach ($penjualan->penjualanDetail as $item)
    <tr>
        <td>{{ $item->barang->barang_nama }}</td>
        <td>{{ $item->jumlah }}</td>
        <td>{{ $item->harga }}</td>
        <td>{{ $item->jumlah * $item->harga }}</td>
    </tr>
    
@endforeach
<tr>
    <th>Total Harga</th>
    <td></td>
    <td></td>
    <td>{{ $totalHarga }}</td>
</tr>
</table>
@endempty
<br>
<a href="{{ url('penjualan') }}" class="btn btn-sm btn-default mt2">Kembali</a>
</div>
</div>
@endsection
@push('css')
@endpush
