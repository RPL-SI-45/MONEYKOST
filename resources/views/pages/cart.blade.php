@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Cart Pemesanan', 'titleSub' => 'Customer : ' . Auth::user()->username])

  <div class="container">
    <div class="row">
      <div class="col-12">
        @foreach ($data as $item)
          <div class="card mb-4">
            <div class="row g-0">
              <div class="col-md-4 d-flex justify-content-end align-items-center">
                <img class="img-fluid rounded-start" src="{{ asset('storage/' . $item['gambar_makanan']) }}" alt="makanan">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $item['nama_makanan'] }}</h5>
                  <p class="card-text mb-0">Qty: {{ $item['qty'] }}</p>
                  <p class="card-text mb-0">Rp. {{ $item['harga_makanan'] }}</p>
                  @php
                    $total = $item['harga_makanan'] * $item['qty'];
                  @endphp
                  <p class="card-text mb-0">Total: Rp. {{ $total }}.000</p>
                  <a href="#" class="btn btn-primary mt-2">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
