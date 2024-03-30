@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$page->title}}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($user)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban">Kesalahan!</i></h5>
                    Data yang Anda cari tidak ditemukan
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{$user->user_id}}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{$user->username}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$user->nama}}</td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>***********</td>
                    </tr>
                </table>
            @endempty
            <a class="btn btn-secondary" href="{{url('user')}}">Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
{{-- @section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Detail User</h2>
            <a href="/user" class="float-right btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User_id:</strong>
                        {{ $useri->user_id }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Level_id:</strong>
                        {{ $useri->level_id }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Username:</strong>
                        {{ $useri->username }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {{ $useri->nama }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {{ $useri->password }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
