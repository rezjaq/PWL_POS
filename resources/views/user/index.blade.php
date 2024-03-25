{{-- @extends('layout.app')

@section('subtitle', 'User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'User')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage User</div>
            <div class="d-flex justify-content-end">
                <a href="/user/create" class="btn btn-primary">
                    <i class="bi bi-plus-circle-fill mr-1"></i>
                    <span>Tambah User</span>
                </a>
            </div>
            {{$dataTable->table()}}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush --}}
@extends('layout.app')

@section('subtitle', 'Users')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Users')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="/user/create" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Tambah Data User</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Level</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($useri as $user)
                                <tr>
                                    <td>{{ $user->user_id }}</td>
                                    <td>{{ $user->level->level_id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/user/{{ $user->user_id }}">Show</a>
                                        <a class="btn btn-success" href="/user/{{ $user->user_id }}/edit">Edit</a>
                                        <form action="/m_user/{{ $user->user_id }}" method="POST" style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Level</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
