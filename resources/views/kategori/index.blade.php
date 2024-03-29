@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage kategori</div>
            <div class="card-body">
                
                {{$dataTable->table()}}
                <div class="mb-3">
                    <a href="kategori/create" class="btn btn-primary mt-3">Add</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush