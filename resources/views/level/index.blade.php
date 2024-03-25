@extends('layout.app')

@section('subtitle', 'Level')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Level')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Level</div>
            <div class="d-flex justify-content-end">
                <a href="/user/create" class="btn btn-primary">
                    <i class="bi bi-plus-circle-fill mr-1"></i>
                    <span>Tambah Level</span>
                </a>
            </div>
            {{$dataTable->table()}}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
