@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', [
        'title' => 'Pembayaran Sukses', 
        'titleSub' => 'Customer: ' . Auth::user()->username
    ])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Pembayaran Telah Berhasil</h6>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <p class="mb-0">Terima kasih, pembayaran Anda telah berhasil. Makanan yang anda pesan akan segera kami persiapkan</p>
                        <a href="{{ url('/dashboard/customer/menumakanan') }}" class="btn btn-primary mt-3">Kembali ke halaman menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
