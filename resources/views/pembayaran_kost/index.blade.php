
<table border='1'>
    <tr>
        <th>ID Pembayaran</th>
        <th>Tagihan</th>
        <th>Tanggal Pembayaran</th>
        <th>Bukti Pembayaran</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    
    @foreach($pembayaran_kost as $p)
        <tr>
            <td>{{$p->id_Pembayaran_Kost}}</td>
            <td>{{$p->tagihan_Pembayaran_Kost}}</td>
            <td>{{$p->tanggal_Pembayaran_Kost}}</td>
            <td>
                {{$p->bukti_Pembayaran_Kost}}
            </td>
            <td>{{$p->status}}</td>
            <td></td>
        </tr>
    @endforeach
</table>