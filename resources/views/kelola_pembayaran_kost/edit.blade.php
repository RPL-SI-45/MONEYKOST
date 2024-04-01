<h1>Edit Pembayaran Kost</h1>

<form action="/kelola_pembayaran_kost/{{$pembayaran_kost->id}}" method="POST">
    @method('put')
    @csrf
    <input type="text" name="id_Pembayaran_Kost" placeholder ="Id Pembayaran" value="{{$pembayaran_kost->id_Pembayaran_Kost}}"><br>
    <input type="text" name="tagihan_Pembayaran_Kost" placeholder ="Tagihan Pembayaran" value="{{$pembayaran_kost->tagihan_Pembayaran_Kost}}"><br>
    <input type="date" name="tanggal_Pembayaran_Kost" value="{{$pembayaran_kost->tanggal_Pembayaran_Kost}}"><br>
    <select name="status" id="">
        <option value="">Pilih Status</option>
        <option value="Belum Lunas" @if($pembayaran_kost->status == 'Belum Lunas') selected @endif>Belum Lunas</option>
        <option value="Sudah Lunas" @if($pembayaran_kost->status == 'Sudah Lunas') selected @endif>Sudah Lunas</option>
    </select>
    <input type="submit" name="submit" value="save">
</form>