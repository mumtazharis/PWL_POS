@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
            </div>

            <form method="POST" action="../../kategori/save_edit/{{$data->kategori_id}}">
                {{csrf_field()}}
                {{method_field('PUT')}}
                
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class="form-control" name="kodeKategori" id="kodeKategori" placeholder="Untuk makanan, contoh MKN" value="{{$data->kategori_kode}}">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama kategori</label>
                        <input type="text" class="form-control" name="namaKategori" id="namaKategori" placeholder="Nama" value="{{$data->kategori_nama}}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection