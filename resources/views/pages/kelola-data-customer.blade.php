@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Customer', 'titleSub' => 'Admin : '])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex align-items-center justify-content-between">
                        <h6>List Customer</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Username</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Password</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No Kamar</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No HP</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelola_data_customer as $item)
                                    <tr>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['username']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['email']; }}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['password'];}}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['no_kamar'];}}</p>
                                        </td>
                                        <td>
                                            <p class="text-center text-xs font-weight-bold mb-0">{{ $item['no_hp'];}}</p>
                                        </td>
                                        <td>
                                        <form action="/hapuscustomer/{{ $item['id']; }}" method = "POST">
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
@endsection