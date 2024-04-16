@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Listrik Admin', 'titleSub' => 'Admin'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Tambah </h6>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('tambah-listrik.perform') }}">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <select class="form-control" name="id_customer">
                                    <option selected>Nama Customer</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                                @error('id_customer') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggalInput" class="form-control-label">Tanggal Tagihan</label>
                                <input class="form-control" type="date" name="tanggaltagihan" id="tanggalInput">
                                @error('tanggaltagihan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlahInput" class="form-control-label">Jumlah</label>
                                <input class="form-control" type="number" name="jumlah" id="jumlahInput">
                                @error('jumlah') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="kwhInput" class="form-control-label">kWh</label>
                                <input class="form-control" type="number" name="kwh" id="kwhInput">
                                @error('kwh') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
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