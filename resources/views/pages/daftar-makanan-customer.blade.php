@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'Menu Makanan', 'titleSub' => 'Customer : ' . Auth::user()->username])
    <style type="text/css">
        .search-form {
            position: relative;
            z-index: 10; 
            padding: 10px;
            border-radius: 5px;
        }
        

    </style>

<div class="container">
    <form class="search-form" action="{{ route('searchmakanan') }}" method="GET">
        <div class="row align-items-center"> <!-- Changed from form-row to row -->
            <div class="col-sm-2 mb-2">
                <input class="form-control" type="text" name="cari" placeholder="Cari Makanan .." value="{{ old('cari') }}">
            </div>
            <div class="form-group col-sm-2 mb-1">
                <select name="kategori" class="form-control">
                    <option disabled selected value>Semua Kategori</option>
                    <option value="makanan" {{ request('kategori') == 'Makanan Utama' ? 'selected' : '' }}>Makanan</option>
                    <option value="minuman" {{ request('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                </select>
            </div>
            <div class="col-md-1"> 
                <input type="submit" value="Cari" class="btn btn-warning btn-rounded mt-0 mb-0">
            </div>
            <div class="col-md-7 d-flex justify-content-end"> <!-- New column to push the cart button to the right -->
                <a class="nav-link {{ str_contains(request()->url(), 'dashboardmain') == true ? 'active' : '' }}" href="{{ route('cart', ['auth' => Auth::user()->auth]) }}">
                    <div dusk="cart" class="btn btn-info btn-rounded btn-sm mt-0 mb-0">
                        <div class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center">
                            <i class="ni ni-cart text-white text-lg opacity-10 mt-0 mb-0"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </form>





        <div class="row">
            @foreach($daftar_makanan as $data)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="shadow-full p-0 m-2 border-gray-100">
                        <div class="card rounded" style="width: 18rem">
                            <a href="/dashboard/menumakanan/{{$data['id']}}">
                                <img class="card-img-top" style="height: 12rem;" src="{{ asset('storage/' . $data['gambar_makanan']) }}" alt="makanan">
                                <div class="card-body">
                                    <h5 class="card-title">{{$data['nama_makanan']}}</h5>
                                    <p class="text-gray-700 text-base">
                                        Rp. {{$data['harga_makanan']}}
                                    </p>
                                    <button dusk="beli-{{$data['id']}}" class="btn btn-lg btn-info btn-rounded btn-lg w-100 mt-4 mb-0">Beli</button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
