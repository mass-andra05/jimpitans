@extends('layouts.app')
@section('content')
<div class="content">
    <div class="card-header">
        <!-- DataTales Example -->
        <div class="card mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary float-left">{{ $title }}</h3>
                <a type="button" class="float-right btn btn-primary btn" href="/pemasukan/create"><i
                        class="fa fa-plus"></i>
                </a>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-success mb-2" onclick="getImport()" data-toggle="modal"
                    data-target="#form-import"><i class="fa fa-sign-in-alt"></i> Import Excel
                </button>
                <a type="button" class="btn btn-success mb-2" href="/pemasukanexport">
                    <i class="fa fa-sign-out-alt"></i> Export Excel</a>
                <a type="button" class="btn btn-danger mb-2" href="/pemasukancetak">
                    <i class="fa fa-file"></i> Export PDF</a>
                <hr>
                <div class="table-responsive">
                    <table class="table table-custom" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul Pemasukan</th>
                                <th scope="col">Deskripsi Pemasukan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Status</th>
                                <th scope="col">Konfirmasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $pemasukans as $pemasukan )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemasukan->judul }}</td>
                                <td>{{ $pemasukan->deskripsi }}</td>
                                <td>{{ $pemasukan->kategori }}</td>
                                <td>{{ $pemasukan->tanggal }}</td>
                                <td>Rp. {{ $pemasukan->jumlah }}</td>
                                <td>
                                    @if( $pemasukan->status === 'diterima' )
                                    <strong>Terkonfirmasi</strong> <br>
                                    <span class="badge badge-success" style="color:white; ">Diterima</span>
                                    @elseif ( $pemasukan->status === 'tidak diterima' )
                                    <strong>Tidak Terkonfirmasi</strong> <br>
                                    <span class="badge badge-danger" style="color:white; ">Tidak Diterima</span>
                                    @else
                                    <strong>Dalam Proses</strong><br>
                                    <span class="badge badge-warning" style="color:white; ">Dalam Proses</span>
                                    @endif
                                </td>
                                <td>
                                    @if(empty($pemasukan->status))
                                    <form action="/pemasukan/status/{{ $pemasukan->id }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="diterima">
                                        <button class="badge bg-success border-0 color-white"
                                            onclick="return confirm(' Apakah Kamu Yakin Dengan Ini ')">Terima</button>
                                    </form>
                                    <br>
                                    <form action="/pemasukan/status/{{ $pemasukan->id }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="tidak diterima">
                                        <button class="badge bg-danger border-0 color-white"
                                            onclick="return confirm(' Apakah Kamu Yakin Dengan Ini ')">Tidak
                                            Diterima</button>
                                    </form>
                                    @else
                                    <span class="badge badge-warning" style="color:white; ">Status Telah Ada</span>
                                    @endif
                                    <form action="/pemasukan/{{ $pemasukan->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 color-white"
                                            onclick="return confirm(' Apakah Kamu Yakin Untuk Menghapus ')">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn-sm btn-info border-0 p-2 d-inline"
                                        href="/pemasukan/{{ $pemasukan->id }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn-sm btn-primary  border-0 p-2 d-inline"
                                        href="/pemasukan/{{ $pemasukan->id }}/edit"><i class="fa fa-pen"></i></a>
                                    <form action="/pemasukan/{{ $pemasukan->id }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn-sm btn-danger border-0 p-2"
                                            onclick="return confirm(' Yakin Akan Dihapus? ')"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md" id="form-import" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul">Import {{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/pemasukanimport" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid border mb-3 p-3" src="{{ url('bt') }}/img/index-brg.jpg" alt="...">
                            <h3><i class="fa fa-circle-exclamation"></i></i> Perhatian</h3>
                            <p>Pastikan Format dan Penempatan Data Sesuai Dengan Gambar Diatas!</p>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" class="form-control" name="file" required="required">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary w-100 mb-2">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection