@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Menu Makanan', 'titleSub' => 'Customer : '])
    <style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>
    <div class="container">
        <form class="" action="{{ route('searchmakanan') }}" method="GET">
            <input type="text" name="cari" placeholder="Cari Makanan .." value="{{ old('cari') }}">
            <input type="submit" value="CARI">
            <div class="col-md-4">
                    <select name="kategori" class="form-control">
                        <option disabled selected value>Semua Kategori</option>
                        <option value="makanan" {{ request('kategori') == 'Makanan Utama' ? 'selected' : '' }}>Makanan</option>
                        <option value="minuman" {{ request('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <!-- Tambahkan kategori lain sesuai kebutuhan -->
                    </select>
            </div>
        </form>

            
        <div class="row">
            @foreach($daftar_makanan as $data)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="shadow-full p-0 m-2 border-gray-100">
                        <div class="card rounded" style="width: 18rem">
                            <a href="../menumakanan/{{$data['id']}}">
                                <img class="card-img-top" style="height: 12rem;" src="{{ asset('storage/' . $data['gambar_makanan']) }}" alt="makanan">
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
