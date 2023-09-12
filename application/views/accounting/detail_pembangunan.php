<?php
    $upah_id = $detail->progres_upah_id;
    $kavling_id = $detail->progres_kavling_id;

    $total_persentase = $this->db->select('SUM(progres) AS persentase')->from('progres_pembangunan')->where(['upah_id' => $upah_id, 'kavling_id' => $kavling_id, 'status !=' => 1])->get()->row()->persentase;

    $total_setuju = $this->db->select('SUM(total) AS jumlah')->from('progres_pembangunan')->where(['upah_id' => $upah_id, 'kavling_id' => $kavling_id, 'status' => 3])->get()->row()->jumlah;
    

?>
<div class="row">
    <div class="col-lg-6">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <td><?php $date = date_create($detail->tanggal); echo date_format
                    ($date, 'd F Y'); ?></td>
                </tr>
                <tr>
                    <th>Nama Proyek</th>
                    <td><?= $detail->nama_proyek ?></td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td><?= $detail->ket; ?></td>
                </tr>
                <tr>
                    <th>Tipe</th>
                    <td><?= $detail->tipe ?></td>
                </tr>
                <tr>
                    <th>Blok</th>
                    <td><?= $detail->blok . $detail->no_rumah ?></td>
                </tr>
                <tr>
                    <th>Cluster</th>
                    <td><?= $detail->nama_cluster ?></td>
                </tr>
                <tr>
                    <th>Harga Kontrak per Blok</th>
                    <td>Rp. <?= number_format($detail->harga_kontrak); ?></td>
                </tr>
                <tr>
                    <th>Progres Pembangunan</th>
                    <td><?= $detail->progres ?>%</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp. <?= number_format($detail->total) ?></td>
                </tr>
                <tr>
                    <th>Total Persentase</th>
                    <td><?= $total_persentase ?>%</td>
                </tr>
                <tr>
                    <th>Total di Setujui</th>
                    <td>Rp. <?= number_format($total_setuju) ?></td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-lg-6">
        <table class="table table-bordered">
            <tr class="bg-dark text-light">
                <th>Foto Bukti</th>
            </tr>
            <tr>
                <td>
                    <img src="<?= base_url('assets/upload/progres/') . $detail->foto; ?>" alt="foto-progres" width="100%">
                </td>
            </tr>
        </table>
    </div>
</div>