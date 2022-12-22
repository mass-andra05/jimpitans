@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-6 col-sm-6 col-12">
        <div class="card card-noborder b-radius">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mt-2">
                        <form action=" {{ route('update-password', Auth::user()->name) }} " method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="password">Old Password  <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required autofocus>
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="password_baru">New Password  <span class="text-danger">*</span></label>
                                <input type="password"
                                    class="form-control @error('password_baru') is-invalid @enderror"
                                    id="password_baru" name="password_baru" required autofocus>
                                @error('password_baru')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="konfirmasi_password">Confirmation Password  <span class="text-danger">*</span></label>
                                <input type="password"
                                    class="form-control  @error('konfirmasi_password') is-invalid @enderror"
                                    id="konfirmasi_password" name="konfirmasi_password" required autofocus>
                                @error('konfirmasi_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 account-detail mb-4 col-12">
        <div class="card card-noborder b-radius">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center foto">
                        <img src="{{ url('bt') }}/img/undraw_profile.svg" width="145px" class="foto-profil">
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <p class="name">Name : {{ auth()->user()->name }}</p>
                        <p class="level">Level : {{ auth()->user()->level }}</p>
                        <p class="username">Username : {{ auth()->user()->username }}</p>
                        <p class="level">Email : {{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection