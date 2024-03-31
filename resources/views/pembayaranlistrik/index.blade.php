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
            @foreach($pembayaranlistrik as $pl)
                <tr>
                    <td>{{ $pl->id }}</td>
                    <td>{{ $pl->tanggaltagihan }}</td>
                    <td>{{ $pl->jumlah }}</td>
                    <td>{{ $pl->kwh }}</td>
                    <td>{{ $pl->bukti }}</td>
                    <td>{{ $pl->status }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection