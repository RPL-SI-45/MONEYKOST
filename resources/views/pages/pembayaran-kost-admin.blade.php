@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Pembayaran Kost Admin', 'titleSub' => 'Admin : '])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Pembayaran Kost</h6>
                        <button type="button" class="btn btn-outline-info"><a href="{{route('tambah.kost')}}" class="text-center text-uppercase text-secondary">Add Tagihan Kost</a></button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            ID Pembayaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Pembayaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tipe Kamar</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jumlah</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bukti</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['nama_cust']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['id_pembayaran']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['tanggal_tagihan'];}}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['tipe_kamar'];}}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['jumlah'];}}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($item['status'] == 'lunas')
                                            <a href="{{ asset('storage/' . $item['bukti']) }}" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                File
                                            </a>
                                            @else
                                            <p class="text-center text-xs font-weight-bold mb-0">Belum Lunas</p>
                                            @endif
                                        </td>
                                        <td class='align-middle text-center text-s'>
                                            @if ($item['status'] == 'lunas')
                                            <span class="badge badge-sm bg-gradient-success">Lunas</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger">Belum</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-sm bg-gradient-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Ubah Status
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ route('ubah-status', ['id' => $item['id_pembayaran'], 'status' => 1])}}">Lunas</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('ubah-status', ['id' => $item['id_pembayaran'], 'status' => 0])}}">Belum Lunas</a></li>
                                                </ul>
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
@endsection