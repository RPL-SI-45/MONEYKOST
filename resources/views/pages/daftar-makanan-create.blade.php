@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Menu Makanan', 'titleSub' => 'Admin'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Tambah Menu </h6>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('tambah-menu.perform') }}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="namaMakananInput" class="form-control-label">Nama Menu</label>
                                <input class="form-control" type="text" id="namaMakananInput" name="nama_makanan">
                                @error('nama_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="hargaMakananInput" class="form-control-label">Harga Menu</label>
                                <input class="form-control" type="number" id="hargaMakananInput" name="harga_makanan">
                                @error('harga_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="tipeMakananInput" class="form-control-label">kategori</label>
                                <select class="form-control" name="tipe_makanan">
                                    <option selected></option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                                @error('tipe_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsiMakananInput" class="form-control-label">Deskripsi Menu</label>
                                <textarea class="form-control" type="text" id="deskripsiMakananInput" name="deskripsi_makanan"></textarea>
                                @error('deskripsi_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="gambarMakananInput" class="form-control-label">Gambar</label>
                                <input class="form-control" type="file" id="gambarMakananInput" name="gambar_makanan">
                                @error('gambar_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-info btn-lg w-100 mt-4 mb-0">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection