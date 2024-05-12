@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Daftar Makanan', 'titleSub' => 'Admin : '])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Daftar Makanan</h6>
                        <button type="button" class="btn btn-outline-info"><a href="{{route('tambah.menu')}}" class="text-center text-uppercase text-secondary">Tambah Makanan</a></button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-6">
                                            Nama Makanan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">
                                            Gambar</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">
                                            Tipe Makanan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Deskripsi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">
                                            Action</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">
                                            Upload Gambar</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftar_makanan as $data)
                                    <tr>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $data['id']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $data['nama_makanan']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $data['harga_makanan'];}}</p>
                                        </td>
                                        <td>
                                            <a href="../menumakanan/{{$data['id']}}" class="text-info font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                File Gambar
                                            </a>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $data['tipe_makanan'];}}</p>
                                        </td>
                                        <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">{{ substr($data['deskripsi_makanan'], 0, 50) }}{{ strlen($data['deskripsi_makanan']) > 50 ? '...' : '' }}</p>
                                        <td class="align-middle">
                                            <form action="" method = "POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger"  value="Delete">
                                            </form>
                                        </td>
                                        <td>
                                        <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Upload Bukti</button>
                                            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="card card-plain">
                                                                <div class="card-header pb-0 text-left">
                                                                    <h3 class="font-weight-bolder text-info text-gradient">Upload</h3>
                                                                    <p class="mb-0">Upload Gambar Menu</p>
                                                                </div>
                                                            <div class="card-body">
                                                            <form role="form text-left" role="form" method="POST" action="{{ route('upload-menumakanan', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('post')
                                                                    <div class="input-group mb-3">
                                                                        <input type="file" name='upload-menumakanan'>
                                                                    </div>
                                                                    @error('upload-menumakanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                                                    <div class="text-center">
                                                                        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Upload</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    </div>
    @include('layouts.footers.auth.footer')
@endsection