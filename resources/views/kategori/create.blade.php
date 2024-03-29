{{-- @extends('layout.app')

@section('subtitle', 'kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat Kategori Baru</h3>
            </div>

            <form method="POST" action="../kategori">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class="form-control @error('kategori_kode') is-invalid @enderror" id="kodeKategori" name="kategori_kode" placeholder="Kode Kategori">
                        @error('kategori_kode')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="kodeKategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kategori_nama" placeholder="Nama Kategori">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('/kategori') }}" class="btn btn-secondary">Back</a> 
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@if ($errors->any)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    
@endif
 --}}
 @extends('layouts.app')

@section('subtitle', 'Tambah User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Tambah User')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="/m_user" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    
    <div class="col">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulir</h3>
            </div>
            <form action="/user" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" placeholder="Masukkan Username"
                                value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select class="form-control @error('level_id') is-invalid @enderror" name="level_id"
                                    id="level_id">
                                    <option value="" disabled selected>Pilih Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->level_id }}">{{ $level->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

