<h1>Create Pembayaran Kost</h1>

<form action="/kelola_pembayaran_kost/store" method="POST">
    @csrf
    <input type="text" name="id_Pembayaran_Kost" placeholder ="Id Pembayaran"><br>
    <input type="text" name="tagihan_Pembayaran_Kost" placeholder ="Tagihan Pembayaran"><br>
    <input type="date" name="tanggal_Pembayaran_Kost"><br>
    <select name="status" id="">
        <option value="">Pilih Status</option>
        <option value="Belum Lunas">Belum Lunas</option>
        <option value="Sudah Lunas">Sudah Lunas</option>
    </select>
    <input type="submit" name="submit" value="save">
</form>