<!-- <?php var_dump($data); ?> -->
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-dark text-light">
                    <th>#</th>
                    <th>Nama Material</th>
                    <th>Jumlah Pengajuan</th>
                    
                    <th>Total Pengajuan</th>
                    <th>Sisa Pengajuan</th>

                    <th>Harga RAB</th>
                    <th>Harga Rill</th>

                </tr>
            </thead>
            <tbody>
                <?php $i=1;
                $totalRAB = 0;
                $totalReal = 0;
                foreach($data as $d){ 
                    $prev = $this->db->where([
                        'proyek_material_id' => $d->proyek_material_id,
                        'id <' => $d->id_logistik
                    ])->get('master_logistik')->result();

                   
            
                    $total_prev = 0;
                    foreach($prev as $p){
                        $total_prev += $p->jml_pengajuan;
                    } 
                    $total_di_ajukan = $total_prev + $d->jml_pengajuan;

                    $sisa = $d->quantity - $total_di_ajukan;
                
                    

                    $proyek_name = $this->db->get_where('master_proyek',['id' => $d->proyek_id])->row()->nama_proyek;

                    if($d->type == 1){
                        $totalRAB += $d->jml_pengajuan * $d->harga;
                        $type = 'RAB';
                       

                        if($d->status_pengajuan == 3 || $d->status_pengajuan == 4){
                            $harga_real =  $this->db->get_where('master_logistik_detail',['logistik_id' => $d->id_logistik])->row();  

                            if(isset($harga_real)){
                                $rill = $harga_real->harga_real;
                                $sub_total = $harga_real->harga_real * $d->jml_pengajuan;
                                $totalReal += $harga_real->harga_real * $d->jml_pengajuan;
                            } else {
                                $rill = 0;
                                $sub_total = 0 * $d->jml_pengajuan;
                                $totalReal += 0 * $d->jml_pengajuan;
                            }

                        } else {
                            $rill = 0;
                            $sub_total = 0 * $d->jml_pengajuan;
                            $totalReal += 0 * $d->jml_pengajuan;
                        }
                        
                    } else if($d->type == 2){
                        $type = 'Logistik Gudang';
                       
                    }

                    
                   
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><b><?= $d->nama_material ?></b> <br> <small class="text-success"><?= $d->kategori_produk ?></small></td>
                    <td><?= $d->jml_pengajuan.' '.$d->nama_satuan ?></td>
                    
                    <td><?= $total_di_ajukan .' '. $d->nama_satuan; ?></td>
                    <td><?= $sisa. ' '. $d->nama_satuan ?></td>

                    <td>
                        <?php if($d->type == 1){ ?>
                            <b>Rp. <?= number_format($d->jml_pengajuan * $d->harga); ?></b> <br> <small class="text-primary">(Rp. <?= number_format($d->harga); ?> / item)</small>
                        <?php } else { ?>
                            -
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($d->type == 1){ ?>
                            <b>Rp. <?= number_format($sub_total); ?></b> <br> <small class="text-danger">(Rp. <?= number_format($rill); ?> / item)</small>
                        <?php } else if($d->type == 2) { ?>
                            -
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tr>
                <th colspan="5">Total Harga</th>
                <th>Rp. <?= number_format($totalRAB) ?></th>
                <th>Rp. <?= number_format($totalReal) ?></th>
            </tr>
        </table>


        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-success">
                    <th colspan="2">Bukti Nota</th>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <th>Bukti Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($nota as $n){ ?>
                <tr>
                    <td><?php $date = date_create($n->tgl_upload); echo date_format($date, 'd F Y') ?></td>
                    <td class="text-center">
                        <img src="<?= base_url('assets/bukti_pembayaran/') . $n->nota ?>" alt="nota pembayaran" width="50%">
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr class="bg-info text-light">
                    <th colspan="4">History Transfer Dana</th>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Bukti Transfer</th>
                    <th>Status Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $terbayar = 0;
                foreach($cicil as $c){ 

                    if($c->tgl_approve != null){
                        $tgl = date_create($c->tgl_approve);
                        $tg_approve = date_format($tgl, 'd F Y');
                    } else {
                        $tg_approve = '';
                    }

                    if($c->status == 2){
                        $terbayar += $c->jml_pengajuan;
                    }    
                ?>
                <tr>
                    <td><?php $date = date_create($c->tgl_pengajuan); echo date_format($date,'d F Y'); ?></td>
                    <td>Rp. <?= number_format($c->jml_pengajuan) ?></td>
                    <td>
                        <?php if($c->bukti_pembayaran){ ?>
                            <img src="<?= base_url('assets/bukti_pembayaran/') . $c->bukti_pembayaran; ?>" alt="bukti pembayaran" width="50%">
                        <?php } else { ?>
                            -
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($c->status == 0){ ?>
                            <span class="badge badge-danger">Di Tolak</span>
                        <?php } else if($c->status == 1){ ?>
                            <span class="badge badge-warning">Menunggu Super Admin</span>
                        <?php } else if($c->status == 2){ ?>
                            <div class="text-center"> <span class="badge badge-primary ">Approved</span> </div>
                            <br>
                            <p class="text-center"><?= $tg_approve ?></p>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Terbayar</th>
                    <th colspan="2">Rp. <?= number_format($terbayar) ?></th>
                </tr>
                <tr>
                    <th colspan="2">Sisa</th>
                    <th colspan="2">Rp. <?= number_format($totalReal - $terbayar); ?></th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>