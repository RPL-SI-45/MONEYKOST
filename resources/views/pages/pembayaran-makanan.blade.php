@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pembayaran Makanan', 'titleSub' => 'Customer : ' . Auth::user()->username])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Pembayaran Makanan</h6>
                    </div>
                    <div class="text-center">
                        <img src="/img/qris.png" alt="qris" class="img-fluid" style="max-width: 200px;">
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="/uploadbukti/{{$data->id}}/perform" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="grandTotalInput" class="form-control-label">Total Harga</label>
                                <input class="form-control" type="text" id="grandTotalInput" name="grandTotal" value="Rp. {{$data->grandTotal}}"readonly>
                                @error('grandTotal') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <label for="buktiInput" class="form-control-label">Silahkan Upload Bukti Pembayaran</label>
                                <input dusk = "inputgambar" class="form-control" type="file" id="buktiInput" name="bukti">
                                @error('bukti') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            </div>
                            <div class="form-group">
                                <button dusk="submit" type="submit" class="btn btn-lg btn-info btn-lg w-100 mt-4 mb-0">Upload Bukti Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection