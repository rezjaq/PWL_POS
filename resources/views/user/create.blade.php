{{-- jobsheet 5 --}}
{{-- @extends('/user/template')

@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah User Baru</h3>
            </div>

            <form method="POST" action="../user">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username">
                        @error('username')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama">
                        @error('nama')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                     <div class="form-group">
                        <label for="level_id">Level</label>
                        <select class="form-control @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                            @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->level_nama}}</option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('/user') }}" class="btn btn-secondary">Back</a> 
                </div>
            </form>
        </div>
    </div>
@endsection --}}

{{-- jobsheet 6 --}}
{{-- @extends('layout.app')

@section('subtitle', 'Tambah User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Tambah User')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="/user" class="btn btn-primary">Kembali</a>
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
@endsection --}}

{{-- jobsheet 7 --}}
@extends('layout.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$page->title}}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('user')}}" class=""form-horizontal>
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Level</label>
                    <div class="col-1">
                        <select class="form-control" name="level_id" id="level_id" required>
                            <option value="">- Pilih Level</option>
                            @foreach ($level as $item)
                                <option value="{{$item->level_id}}">{{$item->level_nama}}</option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Username</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" required>
                        @error('username')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}" required>
                        @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Password</label>
                    <div class="col-11">
                        <input type="password" class="form-control" id="password" name="password" value="{{old('name')}}" required>
                        @error('password')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                       <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                       <a class="btn btn-sm btn-default ml-1" href="{{url('user')}}"></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush

