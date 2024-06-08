@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Wifi', 'titleSub' => 'Customer'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Tambah </h6>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('tambah-wifi.perform') }}">
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
                                <input class="form-control" type="date" name="tanggal_tagihan" id="tanggalInput">
                                @error('tanggal_tagihan') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="paketInput" class="form-control-label">Paket</label>
                                <select class="form-control" name="paket">
                                    <option selected>Pilih paket</option>
                                    
                                    <option value="10 Mbps">10 Mpbs | Rp.120.000</option>
                                    <option value="5 Mbps">5 Mpbs | Rp.90.000</option>
                                </select>
                                @error('paket') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <button dusk="tambah" type="submit" class="btn btn-lg btn-info btn-lg w-100 mt-4 mb-0">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection