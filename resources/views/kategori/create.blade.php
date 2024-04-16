@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat Kategori Baru</h3>
            </div>

            <form method="POST" action="../kategori">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kategori_id">Kode Kategori</label>
                        <input type="text" class="form-control" name="kategori_id" id="kategori_id" placeholder="Untuk makanan, contoh MKN" class="@error('kategori_id') is-invalid
                            
                        @enderror">
                        @error('kategori_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama kategori</label>
                        <input type="text" class="form-control" name="namaKategori" id="namaKategori" placeholder="Nama">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif