<h2>Tanda Jadi Lokasi Transaksi Bank</h2>
<p>No : </p>
<p>Tanggal Cetak : <?= date('d M Y'); ?></p>
<table border="1" style="margin-bottom: 100px;">
    <thead>
        <tr>
            <th>Jenis Transaksi</th>
            <th>Nama</th>
            <th>Blok</th>
            <th>Jumlah</th>
            <th>Jatuh Tempo</th>
            <th>Tanggal Bayar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Transaksi Bank</td>
            <td><?= $tjl->nama_konsumen ?></td>
            <td><?= $tjl->blok ?></td>
            <td><?= number_format($tjl->jml_tjl) ?></td>
            <td><?= $tjl->jatuh_tempo ?></td>
            <td><?= $tjl->tgl_pembayaran ?></td>
        </tr>
    </tbody>
</table>
<br><br>
<div style="width: 30%; text-align: left; float: right; margin: 100px, 0, 100px, 0">Ttd</div><br>
<div style="width: 30%; text-align: left; float: right;">Admin</div><br>