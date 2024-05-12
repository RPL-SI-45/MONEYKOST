@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Menu Makanan', 'titleSub' => 'Admin'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Edit Menu Makanan</h6>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="/editmenu/{{$daftar_makanan->id}}/perform" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="namaMakananInput" class="form-control-label">Nama Makanan</label>
                                <input class="form-control" type="text" id="namaMakananInput" name="nama_makanan" value="{{$daftar_makanan->nama_makanan}}">
                                @error('nama_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="hargaMakananInput" class="form-control-label">Harga Makanan</label>
                                <input class="form-control" type="number" id="hargaMakananInput" name="harga_makanan" value="{{$daftar_makanan->harga_makanan}}">
                                @error('harga_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="tipeMakananInput" class="form-control-label" >Tipe</label>
                                <select class="form-control" name="tipe_makanan">
                                    <option selected>{{$daftar_makanan->tipe_makanan}}</option>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                                @error('tipe_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsiMakananInput" class="form-control-label">Deskripsi Makanan</label>
                                <textarea class="form-control" type="text" id="deskripsiMakananInput" name="deskripsi_makanan">{{$daftar_makanan->deskripsi_makanan}}</textarea>
                                @error('deskripsi_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <label for="gambarMakananInput" class="form-control-label">Gambar</label>
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $daftar_makanan['gambar_makanan']) }}"/>
                            </div>
                            <input class="form-control" type="file" id="gambarMakananInput" name="gambar_makanan">
                                @error('gambar_makanan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
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