{{-- //jobsheet 5 --}}
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

{{-- //jobsheet 6 --}}
{{-- @extends('layout.app')

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
@endsection --}}

{{-- // jobsheet 7 --}}
@extends('layout.template')

@section('content')
    <div class="card card-outlines card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$page->title}}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{url('user/create')}}">
                    <i class="fas fa-plus-circle mr-1"></i> Tambah Pengguna
                </a>                
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" name="level_id" id="level_id" required>
                                <option value="">- Semua Level -</option>
                                @foreach ($level as $item)
                                    <option value="{{$item->level_id}}">{{$item->level_nama}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Level Pengguna</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        var dataUser = $('#table_user').DataTable({
            serverSide: true,
            ajax: {
                "url" : "{{url('user/list')}}",
                "dataType": "json",
                "type": "POST",
                "data": function(d) {
                    d.level_id = $('#level_id').val();
                }
            },
            columns: [
                {
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },{
                    data: "username",
                    className: "",
                    orderable: true,
                    searchable: true
                },{
                    data: "nama",
                    className: "",
                    orderable: true,
                },{
                    data: "level.level_nama",
                    className: "",
                    orderable: false, 
                    searchable: false
                },{
                    data: "aksi",
                    className: "",
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('#level_id').on('change', function(){
            dataUser.ajax.reload();
        });
    }); 
</script>
@endpush
