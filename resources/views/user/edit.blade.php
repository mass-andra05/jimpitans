@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="card-header">
        <div class="content">
            <div class="col-lg-7">
                <form action="{{ route('user.update', $row) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="username"
                            value="{{ old('username', $row->username) }}" />
                    </div>
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="{{ old('name', $row->name) }}" />
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" value="{{ old('email', $row->email) }}" />
                    </div>
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" name="password" />
                        <p class="form-text">Kosongkan jika tidak ingin mengubah password.</p>
                    </div>
                    <div class="form-group">
                        <label>Level <span class="text-danger">*</span></label>
                        <select class="form-control" name="level" />
                        @foreach($levels as $key => $val)
                        @if($key==old('level', $row->level))
                        <option value="{{ $key }}" selected>{{ $val }}</option>
                        @else
                        <option value="{{ $key }}">{{ $val }}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                        <a class="btn btn-danger" href="{{ route('user.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection