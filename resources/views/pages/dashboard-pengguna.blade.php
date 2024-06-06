@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard', 'titleSub' => 'Customer : '])

    <div class="container-fluid">
        <div class="container mt-0">
            <div class="col-md-4 mb-4">
            <div class="card card-custom py-2 text-center" style="background-color: #5D5FF0;">
                <h5 class="text-white text-3xl m-0">Pembayaran Wifi</h5>
            </div>
            </div>

            <div class="row">
                @php
                    $colors = ['#FFDDC1', '#BEEBE9', '#FFD6E0', '#C9CCE1', '#FFB6C1', '#C0C4CF', '#D0F0C0'];
                    $colorIndex = 0;
                @endphp
                @foreach ($wifi as $data)
                    <div class="col-md-3 mb-4">
                        <div class="card card-custom" style="background-color: {{ $colors[$colorIndex % count($colors)] }};">
                            @php
                                $monthName = \Carbon\Carbon::parse($data->tanggal_tagihan)->locale('id')->translatedFormat('F');
                            @endphp
                            <div class="card-body">
                                <h5>{{ $monthName }}</h5>
                                <p>Rp. {{$data['jumlah']}}</p>
                                <p>{{ $data['status'] }}</p>
                            </div>
                        </div>
                    </div>
                    @php
                        $colorIndex++;
                    @endphp
                @endforeach
            </div>

            <div class="row mt-4">
            <h3 class="mb-4">Pembayaran Laundry</h3>
            @php
                $colorIndex = 0;
            @endphp
    @foreach ($laundry as $data_lau)
        <div class="col-md-3 mb-4">
            <div class="card card-custom" style="background-color: {{ $colors[$colorIndex % count($colors)] }};">
                @php
                    $formattedDate = \Carbon\Carbon::parse($data_lau->tanggal_tagihan)->locale('id')->translatedFormat('d F Y');
                @endphp
                <div class="card-body">
                    <h5>{{ $formattedDate }}</h5>
                    <p>Rp. {{ $data_lau['jumlah']}}</p>
                    <p>{{ $data_lau['status'] }}</p>
                </div>
            </div>
        </div>
        @php
            $colorIndex++;
        @endphp
    @endforeach
</div>

            <div class="row mt-4 justify-content-md-center">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Top Foods</h6>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Orders</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($top_foods as $index => $food)
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $food->nama_makanan }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $food->total_qty }}</p>
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
