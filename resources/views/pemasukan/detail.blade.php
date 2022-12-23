@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    @include('layouts.title')
    <div class="card-header">
        <div class="content">
            <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                    <tbody>
                        @foreach( $pemasukans as $pemasukan )
                        <tr>
                            <th>Judul Pemasukan</th>
                            <td>:</td>
                            <td>{{ $pemasukan->judul }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>:</td>
                            <td>{{ $pemasukan->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pemasukan</th>
                            <td>:</td>
                            <td>{{ $pemasukan->jumlah }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{ $pemasukan->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <a class="btn btn-primary w-100" href="/pemasukan">Kembali</a>
    </div>
</div>
@endsection