@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pembayaran Wifi Customer', 'titleSub' => 'Customer : ' . Auth::user()->username])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Pembayaran Wifi</h6>
                        <button dusk="belipaket"type="button" class="btn btn-outline-info"><a href="{{route('tambah.wifi')}}" class="text-center text-uppercase text-secondary">Beli Paket</a></button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            ID Pembayaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Tagihan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jumlah</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Paket</th>
                                       
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Bukti</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['id']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['tanggal_tagihan'];}}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['jumlah'];}}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['paket'];}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($item['status'] == 'lunas')
                                            <a href="{{ asset('storage/' . $item['bukti']) }}" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                File
                                            </a>
                                            @else
                                            <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Upload Bukti</button>
                                            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="card card-plain">
                                                                <div class="card-header pb-0 text-left">
                                                                    <h3 class="font-weight-bolder text-info text-gradient">Upload Bukti</h3>
                                                                    <p class="mb-0">Tolong upload bukti pembayaran anda !</p>
                                                                </div>
                                                            <div class="card-body">
                                                                <form role="form text-left" role="form" method="POST" action="{{ route('upload-bukti-wifi', ['id' => $item['id']]) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('post')
                                                                    <div class="input-group mb-3">
                                                                        <input type="file" name='upload-bukti'>
                                                                    </div>
                                                                    @error('upload-bukti') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                                                    <div class="text-center">
                                                                        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Upload</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </td>
                                        <td class='align-middle text-center text-s'>
                                            @if ($item['status'] == 'lunas')
                                            <span class="badge badge-sm bg-gradient-success">Lunas</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger">Belum</span>
                                            @endif
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
@endsection