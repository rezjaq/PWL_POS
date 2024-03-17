@extends('layout.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

{{-- @section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center"> 
                    <span>Manage Kategori</span>
                    <a href="{{ url('/kategori/create') }}" class="btn btn-primary">Tambah Kategori</a> 
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive"> 
                    {{ $dataTable->table(['class' => 'table table-bordered table-striped']) }} 
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
            <div class="d-flex justify-content-end">
                <a href="/kategori/create" class="btn btn-primary">
                    <i class="bi bi-plus-circle-fill mr-1"></i>
                    <span>Tambah Kategori</span>
                </a>
            </div>
            {{$dataTable->table()}}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
