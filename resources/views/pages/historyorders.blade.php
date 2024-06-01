@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'History Orders Admin', 'titleSub' => 'Admin : '])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>History Orders</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Customer</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Customer</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Makanan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kamar</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order->id_customer }}</p></td>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order->nama_customer }}</p></td>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order->nama_makanan }}</p></td>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order->qty }}</p></td>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order->kamar }}</p></td>
                                        <td class="align-middle text-center text-s">
                                            @if ($order->status == 'Selesai dimasak')
                                                <span class="badge badge-sm bg-gradient-success">{{ $order->status }}</span>
                                            @elseif ($order->status == 'Sedang dimasak')
                                                <span class="badge badge-sm bg-gradient-warning">{{ $order->status }}</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-danger">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-sm bg-gradient-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Ubah Status
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ url('/ubah-status/' . $order->id . '/0') }}">Belum dimasak</a></li>
                                                    <li><a class="dropdown-item" href="{{ url('/ubah-status/' . $order->id . '/1') }}">Sedang dimasak</a></li>
                                                    <li><a class="dropdown-item" href="{{ url('/ubah-status/' . $order->id . '/2') }}">Selesai dimasak</a></li>
                                                </ul>
                                            </div>
                                            <form action="{{ url('/hapus-order/' . $order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    </div>
@endsection