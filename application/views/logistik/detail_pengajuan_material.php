<table class="table table-bordered">
    <tr class="bg-dark text-light">
        <th>#</th>
        <th>Nama Material</th>
        <th>Jumlah Pengajuan</th>
        <th>Total di Ajukan</th>
        <th>Sisa Pengajuan</th>
        <th>Total Harga</th>
    </tr>
    <?php $i=1;
        $total = 0;
    foreach($data as $d){ 
    $proyek = $this->db->get_where('master_proyek',['id' => $d->proyek_id])->row();
   
    $prev = $this->db->where([
        'proyek_material_id' => $d->proyek_material_id,
        'id <' => $d->id_logistik
    ])->get('master_logistik')->result();



        if($d->type == 1){
            $source = 'RAB';
            $proyek_name = $proyek->nama_proyek;
            $total += $d->jml_pengajuan * $d->harga;
            $harga = '<b>Rp. '.number_format($d->jml_pengajuan * $d->harga) .'</b> <br>
            <small class="text-primary">Rp. '. number_format($d->harga) .'</small>';

        } else if($d->type == 2){
            $source = 'Logistik Gudang';
            $proyek_name = $proyek->nama_proyek;
            $harga = '-';
        }

    ?>
    <tr>
        <td><?= $i++; ?></td>
        <td><b><?= $d->nama_material ?></b><br>
            <small class="text-success"><?= $d->kategori_produk ?></small>
        </td>
        <td><?= $d->jml_pengajuan .' '. $d->nama_satuan ?></td>

        <td>
            <?php
            
            $total_prev = 0;
            foreach($prev as $p){
                $total_prev += $p->jml_pengajuan;
            } 
            $total_di_ajukan = $total_prev + $d->jml_pengajuan;

            $sisa = $d->quantity - $total_di_ajukan;

            echo $total_di_ajukan .' '. $d->nama_satuan;
            ?>

        </td>
        <td><?= $sisa .' '. $d->nama_satuan ?></td>


        <td>
            <?= $harga ?>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <th colspan="5">Total Harga</th>
        <th>Rp. <?= number_format($total) ?></th>
    </tr>
</table>