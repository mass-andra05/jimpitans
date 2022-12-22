@extends('layouts.app')
@section('content')
<div class="content">
    <div class="card-header">
        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary float-left">Data User</h3>
                <button type="button" class="float-right btn btn-primary btn" onclick="getCreateUser()"
                    data-toggle="modal" data-target="#form-user"><i class="fa fa-plus"></i> &nbsp; Add User
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-custom" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $no = 1 ?>
                        @foreach($rows as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->level }}</td>
                            <td>{{ $row->email }}</td>
                            <td class="budget">
                                <span class="d-flex">
                                    <a class="btn btn-circle btn-primary border-0 p-2"
                                        href="{{ route('user.edit', $row) }}"><i class="fas fa-pen"></i></a>&nbsp;
                                    <form method="POST" action="{{ route('user.destroy', $row) }}">
                                        @csrf
                                        @method('DELETE')
                                        <span class="btn btn-circle btn-danger border-0 p-2"
                                            onclick="return confirm('Yakin Akan Dihapus?')"><i
                                                class="fas fa-trash"></i></span>
                                    </form>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md" id="form-user" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="username" requiredautofocus />
                            </div>
                            <div class="form-group">
                                <label>Nama User <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" requiredautofocus />
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" required autofocus />
                            </div>
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password" required autofocus />
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="level">
                                    <option selected>Pilih Status</option>
                                    @foreach($levels as $key => $val)
                                    @if($key==old('level'))
                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $val }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer right-content-between">
                        <button class="btn btn-primary">Save</button>
                        <a class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection