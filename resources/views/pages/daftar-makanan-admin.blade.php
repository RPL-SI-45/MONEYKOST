@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Daftar Makanan', 'titleSub' => 'Admin : Admin'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>Daftar Makanan</h6>
                        <button type="button" class="btn btn-outline-info"><a href="{{route('tambah.menu')}}" class="text-center text-uppercase text-secondary">Tambah Makanan</a></button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-6">
                                            Nama Makanan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">
                                            Gambar</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">
                                            Tipe Makanan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Deskripsi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftar_makanan as $data)
                                    <tr>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $data['id']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $data['nama_makanan']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $data['harga_makanan'];}}</p>
                                        </td>
                                        <td>
                                            <a href="{{ asset('storage/' . $data['gambar_makanan']) }}" class="text-info font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                File Gambar
                                            </a>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $data['tipe_makanan'];}}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ substr($data['deskripsi_makanan'], 0, 50) }}{{ strlen($data['deskripsi_makanan']) > 50 ? '...' : '' }}</p>
                                        <td class="align-middle">
                                            <form action="/editmenu/{{ $data['id']; }}" method = "GET">
                                                <input type="submit" class="btn btn-lg btn-info btn-sm w-80 mt-4 mb-0"  value="Edit">
                                            </form>
                                            <form action="/hapusmenu/{{ $data['id']; }}" method = "POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-lg btn-danger w-80 btn-sm mt-3 mb-0"  value="Delete">
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
    @include('layouts.footers.auth.footer')
@endsection