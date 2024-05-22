@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard', 'titleSub' => 'Admin : '. Auth::user()->username])
    <div class="container-fluid py-1">
        <div class="row mt-12 justify-content-md-center">
            <div class="col-lg-10 mb-lg-0 mb-4">
                <div class="card z-index-2">
                    <div class="container mt-2">
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <div class="profile-img mt-3 mb-3 mx-auto">
                                    <img src="{{ asset('storage/' . $user['gambar_profile']) }}" width="100" height="100" alt="Profile Picture" class="rounded-circle img-fluid">
                                    {{-- <span class="edit-icon">
                                        <img src="path/to/edit-icon.png" alt="Edit Icon" width="20">
                                    </span> --}}
                                    <h4 class="mt-4 mb-4">{{ ucwords($user->name) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container px-5 mb-4">
                        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Nama</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                        {{-- <div class="input-group-append">
                                            <span class="input-group-text">
                                                <img src="path/to/edit-icon.png" alt="Edit Icon" width="20">
                                            </span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                        {{-- <div class="input-group-append">
                                            <span class="input-group-text">
                                                <img src="path/to/edit-icon.png" alt="Edit Icon" width="20">
                                            </span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">No. Handphone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$user->no_hp}}"> 
                                        {{-- <div class="input-group-append">
                                            <span class="input-group-text">
                                                <img src="path/to/edit-icon.png" alt="Edit Icon" width="20">
                                            </span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" >
                                        {{-- <div class="input-group-append">
                                            <span class="input-group-text">
                                                <img src="path/to/edit-icon.png" alt="Edit Icon" width="20">
                                            </span>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="no_kamar">No. Kamar</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="no_kamar" name="no_kamar" value="{{$user->no_kamar}}">
                                        {{-- <div class="input-group-append">
                                            <span class="input-group-text">
                                                <img src="path/to/edit-icon.png" alt="Edit Icon" width="20">
                                            </span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            </div>
                            <input class="form-control" type="file" id="gambar_profileInput" name="gambar_profile">
                                @error('gambar_profile') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                            <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-md-4 text-center">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
