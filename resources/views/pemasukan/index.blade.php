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
                <a type="button" class="btn btn-success mb-2" href="/pemasukan-export">
                    <i class="fa fa-sign-out-alt"></i> Export Excel</a>
                <a type="button" class="btn btn-danger mb-2" href="/pemasukan-cetak">
                    <i class="fa fa-file"></i> Export PDF</a>
                <hr>
                <div class="table-responsive">
                    <table class="table table-custom" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pemasukan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">User</th>
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
                                <td>{{ $pemasukan->tanggal }}</td>
                                <td>{{ $pemasukan->user }}</td>
                                <td>Rp. {{ $pemasukan->jumlah }}</td>
                                <td>
                                    @if( $pemasukan->status === 'diterima' )
                                    <h5><span class="badge badge-success text-white">Diterima</span></h5>
                                    @elseif ( $pemasukan->status === 'tidak diterima' )
                                    <h5><span class="badge badge-danger text-white">Tidak Diterima</span></h5>
                                    @else
                                    <h5><span class="badge badge-warning text-white">Dalam Proses</span></h5>
                                    @endif
                                </td>
                                <td>
                                    @if(empty($pemasukan->status))
                                    <form action="/pemasukan/status/{{ $pemasukan->id }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="diterima">
                                        <h5><button class="badge bg-success border-0 text-white"
                                                onclick="return confirm(' Apakah Kamu Yakin Dengan Ini?')">Terima</button>
                                        </h5>
                                    </form>
                                    <form action="/pemasukan/status/{{ $pemasukan->id }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="tidak diterima">
                                        <h5><button class="badge bg-danger border-0 text-white"
                                                onclick="return confirm(' Apakah Kamu Yakin Dengan Ini?')">Tidak
                                                Diterima</button></h5>
                                    </form>
                                    @else
                                    <h5><span class="badge badge-warning text-white">Status Telah Ada</span></h5>
                                    @endif
                                </td>
                                <td class="budget">
                                    <span class="d-flex">
                                        <a class="btn btn-circle btn-info border-0 m-1"
                                            href="/pemasukan/{{ $pemasukan->id }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-circle btn-primary border-0 m-1" onclick="getDetail()"
                                            data-toggle="modal" data-target="#form-detail{{ $pemasukan->id }}"><i
                                                class="fa fa-eye"></i></a>
                                        <a class="btn btn-circle btn-primary border-0 m-1" onclick="getEdit()"
                                            data-toggle="modal" data-target="#form-edit{{ $pemasukan->id }}"><i
                                                class="fa fa-pen"></i></a>
                                        <a class="btn btn-circle btn-info border-0 m-1"
                                            href="/pemasukan/{{ $pemasukan->id }}/edit"><i class="fa fa-pen"></i></a>
                                        <form action="/pemasukan/{{ $pemasukan->id }}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-circle btn-danger border-0 m-1"
                                                onclick="return confirm(' Apakah Kamu Yakin Akan Dihapus? ')"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </span>
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


<!-- Extra large modal -->
@foreach( $pemasukans as $pemasukan )
<div class="modal fade bd-example-modal-md" id="form-edit{{ $pemasukan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul">Edit {{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pemasukan/{{ $pemasukan->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="judul" id="exampleFormControlInput1"
                            placeholder="Input..." value="{{ old('judul', $pemasukan->judul) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="exampleFormControlInput1"
                            placeholder="Input..." value="{{ old('deskripsi', $pemasukan->deskripsi) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="exampleFormControlInput1"
                            placeholder="Input..." value="{{ old('kategori', $pemasukan->kategori) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="exampleFormControlInput1"
                            placeholder="Input..." value="{{ old('tanggal', $pemasukan->tanggal) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">User</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="user"
                            value="{{ old('user', $pemasukan->user) }}" required disabled>
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="user"
                            value="{{ old('user', $pemasukan->user) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="exampleFormControlInput1"
                            placeholder="Input..." value="{{ old('jumlah', $pemasukan->jumlah) }}" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-danger" href="/pemasukan">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach




<!-- Extra large modal -->
@foreach( $pemasukans as $pemasukan )
<div class="modal fade bd-example-modal-md" id="form-detail{{ $pemasukan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul">Detail {{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                    <tbody>
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
                            <td>
                                <h5><span class="badge badge-primary text-white">{{ $pemasukan->user }}</span></h5>
                            </td>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection