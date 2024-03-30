{{-- @extends('layout.app') --}}
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
                Data yang Anda cari tidak ditemukan.
            </div>
            <a href="{{url('user')}}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{url('/user/'. $user->user_id)}}" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Level</label>
                        <div class="col-11">
                            <select class="form-control" name="level_id" id="level_id" required>
                                <option value="">- Pilih Level -</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
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
                            <input type="text" class="form-control" id="username" name="username" value="{{old('username', $user->username)}}" required>
                            @error('username')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Nama</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama', $user->nama)}}" required>
                            @error('username')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Password</label>
                        <div class="col-11">
                            <input type="password" class="form-control" id="password" name="password">
                            @error('username')
                                <small class="form-text text-danger">{{$message}}</small>
                                @else
                                <small class="form-text text-muted">Abaikan (jangan diisi) jika tidak ingin mengganti password user</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a class="btn btn-secondary" href="{{url('user')}}">Kembali</a>
                        </div>
                    </div>
                </form>
                @endempty
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
@endpush

{{-- @section('content')
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
            <form action="/user/{{ $useri->user_id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Masukkan Nama" value="{{ $useri->nama }}">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" placeholder="Masukkan Username"
                                value="{{ $useri->username }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password" value="{{ $useri->password }}">
                        </div>
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select class="form-control @error('level_id') is-invalid @enderror" name="level_id"
                                    id="level_id">
                                    <option value="" disabled>Pilih Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->level_id }}"
                                            @if ($level->level_id == $useri->level_id) selected @endif>{{ $level->level_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </form>
            <div class="container">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Hapus User</h3>
                    </div>
                    <form action="/user/{{ $useri->user_id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="card-body">
                            <p>Apakah Anda yakin ingin menghapus user ini?</p>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                        </div>
                    </form>
            </div>
        </div>
    </div> 
@endsection --}}
