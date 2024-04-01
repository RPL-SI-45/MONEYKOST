<h1>Kelola</h1>
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
            <td><a href="/kelola_pembayaran_kost/{{$p->id}}/edit">Edit</a>
                <form action="/kelola_pembayaran_kost/{{$p->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
</table>
<a href="/kelola_pembayaran_kost/create">Add Tagihan</a>