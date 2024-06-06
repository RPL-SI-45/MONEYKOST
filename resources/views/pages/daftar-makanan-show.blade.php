@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Menu Makanan', 'titleSub' => 'Customer : '])
    <div class="container">
    <div class="card mb-3">
    <form role="form" method="POST" action="/addToCart/{{$daftar_makanan->id}}/perform" enctype="multipart/form-data">
        @csrf
        @method('post')
        <img src="{{ asset('storage/' . $daftar_makanan['gambar_makanan']) }}" class="card-img-top h-20" alt="Gambar detail">
        <div class="card-body">
            <h5 class="card-title">{{ $daftar_makanan['nama_makanan'] }}</h5>
            <p class="card-text"><small class="text-muted">Rp. {{ $daftar_makanan['harga_makanan'] }}</small></p>
            <p class="card-text">{{ $daftar_makanan['deskripsi_makanan'] }}</p>
            <h1 class="font-sans text-sm text-gray-900 leading-8">Quantitiy</h1>
            <div class="form-group">
            <input class="form-control" type="number" value=1 id="qtyInput" name="qty">
             @error('qty') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
            </div>
            <div class="form-group">
                <button dusk="submit" type="submit" class="btn btn-lg btn-info btn-lg w-100 mt-4 mb-0">Add to cart</button>
            </div>
        </div>
    </form>
    </div>
</div>



@endsection
