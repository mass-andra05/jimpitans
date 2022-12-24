@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    @include('layouts.title')
    <div class="card-header">
        <div class="content">
            <form class="form-valide" action="/pemasukan" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Judul Pemasukan</label>
                    <input type="text" class="form-control" name="judul" id="exampleFormControlInput1"
                        placeholder="Input..." required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Deskripsi Pemasukan</label>
                    <input type="text" class="form-control" name="deskripsi" id="exampleFormControlInput1"
                        placeholder="Input..." required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="exampleFormControlInput1"
                        placeholder="Input..." required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal Pemasukan</label>
                    <input type="date" class="form-control" name="tanggal" id="exampleFormControlInput1"
                        placeholder="Input..." required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">User</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="user"
                        value="{{ auth()->user()->name }}" required disabled>
                    <input type="hidden" class="form-control" id="exampleFormControlInput1" name="user"
                        value="{{ auth()->user()->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nominal Pemasukan</label>
                    <input type="number" class="form-control" name="jumlah" id="exampleFormControlInput1"
                        placeholder="Input..." required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a class="btn btn-danger" href="/pemasukan">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection