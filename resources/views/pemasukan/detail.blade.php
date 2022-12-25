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
                            <th>Nama Pemasukan</th>
                            <td>:</td>
                            <td>{{ $pemasukan->judul }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>:</td>
                            <td>{{ $pemasukan->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td>{{ $pemasukan->kategori }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td>{{ $pemasukan->tanggal }}</td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td>:</td>
                            <td><h5><span class="badge badge-primary text-white">{{ $pemasukan->user }}</span></h5></td>
                        </tr>
                        <tr>
                            <th>Jumlah Pemasukan</th>
                            <td>:</td>
                            <td>Rp. {{ $pemasukan->jumlah }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>
                                @if( $pemasukan->status === 'diterima' )
                                <h5><span class="badge badge-success text-white">Diterima</span></h5>
                                @elseif ( $pemasukan->status === 'tidak diterima' )
                                <h5><span class="badge badge-danger text-white">Tidak Diterima</span></h5>
                                @else
                                <h5><span class="badge badge-warning text-white">Dalam Proses</span></h5>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Di Input Pada</th>
                            <td>:</td>
                            <td>{{ $pemasukan->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Update Pada</th>
                            <td>:</td>
                            <td>{{ $pemasukan->updated_at }}</td>
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