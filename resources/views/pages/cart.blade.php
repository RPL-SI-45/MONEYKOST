@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
  @include('layouts.navbars.auth.topnav', ['title' => 'Cart Pemesanan', 'titleSub' => 'Customer : ' . Auth::user()->username])

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        @foreach ($data as $item)
          <div class="card mb-4 rounded-5">
            <div class="row g-0">
              <div class="col-md-4 d-flex justify-content-end">
                <img class="img-fluid rounded" src="{{ asset('storage/' . $item['gambar_makanan']) }}" alt="makanan">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $item['nama_makanan'] }}</h5>
                  <p class="card-text mb-0">Qty: {{ $item['qty'] }}</p>
                  <p class="card-text mb-0">Rp. {{ $item['harga_makanan'] }}</p>
                  @php
                    $total = $item['harga_makanan'] * $item['qty'];
                  @endphp
                  <p class="card-text mb-0">Total: Rp. {{ number_format($total, 0, ',', '.') }}.000</p>
                  <form action="/hapuscart/{{ $item['id'] }}" method="POST">
                    @csrf
                    @method('delete')
                    <input dusk="delete" type="submit" class="btn btn-lg btn-danger btn-rounded mt-3 mb-0" value="Delete">
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      
      <div class="col-md-4">
  <form role="form" method="POST" action="{{ route('bayar-cart') }}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="card rounded-5">
      <div class="card-body">
        <h5 class="card-title">Order Summary</h5>
        @php
          $grandTotal = 0;
          foreach ($data as $item) {
            $grandTotal += $item['harga_makanan'] * $item['qty'];
          }
        @endphp
        <p class="card-text">Total Items: {{ count($data) }}</p>
      </div>
      <div class="form-group">
        <label for="grandTotalInput" class="form-control-label">Grand Total</label>
        <input class="form-control" type="number" id="grandTotalInput" name="grandTotal" value = "{{$grandTotal}}.000" readonly>
            @error('grandTotal') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
      </div>
      <div class="card-body d-flex justify-content-center">
        <button dusk="bayar" type="submit" class="btn btn-lg btn-info w-50 btn-rounded mt-0 mb-0">Bayar</button>
      </div>
    </div>
  </form>
</div>

      
    </div>
  </div>
@endsection
