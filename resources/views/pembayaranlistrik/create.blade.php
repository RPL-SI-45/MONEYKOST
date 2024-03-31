@extends('layouts.master')

@section('content')

    <div class="container">
    @csrf
        <h1>Pembayaran Listrik</h1>
        <form action="/listkegiatan/store" method="POST">
        <!-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id Pembayaran</label>
            <input type="email" class="form-control" id="idpembayaran" aria-describedby="idpembayaran">
        </div> -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Tagihan</label>
            <input type="date" class="form-control" id="tanggaltagihan" aria-describedby="tanggaltagihan">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
            <input type="int" class="form-control" id="jumlah" aria-describedby="jumlah">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">kWH</label>
            <input type="int" class="form-control" id="kwh" aria-describedby="kwh">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Bukti</label>
            <input type="file" class="form-control" id="bukti" aria-describedby="bukti">
        </div>
            <select class="form-select" name="status">
                <option value="" selected disabled>Status</option>
                <option value="sudah">Lulus</option>
                <option value="belum">Belum</option>
            </select><br>
            <input type="submit" name="submit" class="btn btn-info" value="Save">
        </form>
    </div>
@endsection