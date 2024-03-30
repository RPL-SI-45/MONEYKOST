@extends('layouts.master')

@section('content')
    <div class="container">
        <a class="btn btn-outline-primary" href="/create" style="color: black">Pembayaran Listrik</a>
        <table class="table table-hover">
            <tr>
                <th>ID Pembayaran</th>
                <th>Tanggal Tagihan</th>
                <th>Jumlah</th>
                <th>kWh</th>
                <th>Bukti</th>
                <th>Status</th>
            </tr>
            @foreach($pembayaranlistrik as $pembayaranlistrik)
                <tr>
                    <td>{{ $pembayaranlistrik->id }}</td>
                    <td>{{ $pembayaranlistrik->tanggaltagihan }}</td>
                    <td>{{ $pembayaranlistrik->jumlah }}</td>
                    <td>{{ $pembayaranlistrik->kwh }}</td>
                    <td>{{ $pembayaranlistrik->bukti }}</td>
                    <td>{{ $pembayaranlistrik->status }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection