<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-custom {
            margin: 10px;
            text-align: center;
            border-radius: 10px;
            padding: 20px;
        }
        .card-custom p {
            margin: 0;
        }
        .bg-march { background-color: #ffcccc; }
        .bg-february { background-color: #ffffcc; }
        .bg-january { background-color: #ccffcc; }
        .bg-december { background-color: #ffccff; }

        .progress-bar-custom {
            height: 20px;
            border-radius: 10px;
        }
        .progress-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .progress-label {
            width: 200px;
        }
        .progress-number {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Pembayaran Wifi</h3>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-custom bg-march">
                    <h5>Maret</h5>
                    <p>Rp. 80.000</p>
                    <p>Belum Lunas</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom bg-february">
                    <h5>Februari</h5>
                    <p>Rp. 85.000</p>
                    <p>Lunas</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom bg-january">
                    <h5>Januari</h5>
                    <p>Rp. 78.000</p>
                    <p>Lunas</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom bg-december">
                    <h5>Desember</h5>
                    <p>Rp. 79.000</p>
                    <p>Lunas</p>
                </div>
            </div>
        </div>

        <h3 class="mb-4 mt-5">Pembayaran Laundry</h3>
        <div class="row">
            @foreach ($totals as $monthName => $data)
            <div class="col-md-3">
                <div class="card card-custom bg-{{ strtolower($monthName) }}">
                    <h5>{{ $monthName }}</h5>
                    <p>Rp. {{ number_format($data['total'], 0, ',', '.') }}</p>
                    <p>{{ $data['status'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-8 justify-content-md-center">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Top Foods</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Popularity</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">1</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Indomie Goreng</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">45 %</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">2</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Nasi Goreng</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">29 %</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">3</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Ayam Bakar</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">18 %</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">4</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Ayam Goreng</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">25 %</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
