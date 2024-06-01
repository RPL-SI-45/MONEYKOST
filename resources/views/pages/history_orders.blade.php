@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'History Orders Customer', 'titleSub' => 'Customer: ' . Auth::user()->name])
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
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Makanan</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $order)
                                    <tr>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order['id'] }}</p></td>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order['nama_makanan'] }}</p></td>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order['qty'] }}</p></td>
                                        <td class="align-middle text-center text-s">
                                            @if ($order['status'] == 'Selesai dimasak')
                                                <span class="badge badge-sm bg-gradient-success">{{ $order['status'] }}</span>
                                            @elseif ($order['status'] == 'Sedang dimasak')
                                                <span class="badge badge-sm bg-gradient-warning">{{ $order['status'] }}</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-danger">{{ $order['status'] }}</span>
                                            @endif
                                        </td>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">{{ $order['created_at'] }}</p></td>
                                        <td><p class="text-center text-xs font-weight-bold mb-0">Rp.{{ $order['grand_total'] }}.000</p></td>
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
