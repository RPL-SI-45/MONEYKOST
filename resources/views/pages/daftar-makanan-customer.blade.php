@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Menu Makanan', 'titleSub' => 'Customer : ' . Auth::user()->username])
    <div class="container">
        <div class="row">
            @foreach($daftar_makanan as $data)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class=" shadow-full p-0 m-2 border-gray-100">
                        <div class="card rounded" style="width: 18rem">
                            <a href="../menumakanan/{{$data['id']}}">
                                <img class="card-img-top" style="height: 12rem ;" src="{{ asset('storage/' . $data['gambar_makanan']) }}" alt="makanan" >
                                <div class="card-body">
                                    <h5 class="card-title">{{$data['nama_makanan']}}</h5>
                                    <p class="text-gray-700 text-base">
                                        Rp. {{$data['harga_makanan']}}
                                    </p>
                                    <button class="btn btn-lg btn-info btn-rounded btn-lg w-100 mt-4 mb-0">Beli</button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
