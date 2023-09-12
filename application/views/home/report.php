<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h4>Laporan</h4>
            <a href="<?= site_url('home/'); ?>" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>

        <?php 
            $a = 1;
            $b = 1;
            $month = date('m');
            $year = date('Y');
            $date_A = date('Y-m-01');
            $date_B = date('Y-m-t');

            foreach($perum as $p){ 
            $id_perum = $p->id_perumahan;    
            ?>
            <div class="col-12 mt-3">
                <h5><?= $p->nama_perumahan ?></h5>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card mt-3">
                            <div class="card-header bg-primary text-light">
                                <h3 class="card-title">
                                    <b>Laporan Bulanan</b>
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool bg-white text-primary" data-toggle="collapse" data-target="#collapseExample<?=$a++?>" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive collapse" id="collapseExample<?=$b++?>">

                                <table class="table table-bordered table-sm mt-3">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th>Kode</th>
                                            <th>Akun</th>
                                            <th>Kredit</th>
                                            <th>Debit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($kode as $k){ ?>
                                            <tr class="bg-secondary">
                                                <td><?= $k->kode ?></td>
                                                <td colspan="3"><?= $k->deskripsi_kode ?></td>
                                            </tr>
                                            <?php 
                                                $sub_kode = $this->db->order_by('sub_kode','ASC')->get_where('sub_kode',['id_kode' => $k->id_kode])->result();
                                                foreach($sub_kode as $sk){
                                            ?>
                                                <tr style="background: #c1c1c1">
                                                    <td><?= $k->kode .'.'. $sk->sub_kode ?></td>
                                                    <td colspan="3"><?= $sk->deskripsi_sub_kode ?></td>
                                                </tr>


                                                <?php
                                                    $title_kode = $this->db->order_by('kode_title','ASC')->get_where('title_kode',['id_sub' => $sk->id_sub])->result();
                                                    foreach($title_kode as $tk){

                                                        // $q = "SELECT SUM(jumlah) as total_all FROM approved_history WHERE id_perumahan = $id_perum AND id_title_kode = $tk->id_title" AND month(tanggal) = $month AND year(tanggal) = $year;
                                                        $this->db->select('SUM(jumlah) as total_all')->from('approved_history')->where([
                                                            'id_perumahan' => $id_perum,
                                                            'id_title_kode' => $tk->id_title,
                                                            'month(tanggal)' => $month,
                                                            'year(tanggal)' => $year
                                                        ]);

                                                        // $kredit = $this->db->query($q)->row()->total_all;
                                                        $kredit = $this->db->get()->row()->total_all;
                                                ?>

                                                    <tr>
                                                        <td><?= $k->kode .'.'. $sk->sub_kode .'.'. $tk->kode_title ?></td>
                                                        <td><?= $tk->deskripsi ?></td>

                                                        <?php if($k->kode == 1){ ?>
                                                            <td></td>
                                                            <td>Rp. <?= number_format($kredit); ?></td>
                                                        <?php } else if($k->kode == 2){ ?>
                                                            <td>Rp. <?= number_format($kredit); ?></td>
                                                            <td></td>
                                                        <?php } ?>
                                                    </tr>


                                                
                                                <?php } ?>

                                            <?php } ?>
                                            

                                        <?php } ?>
                                                            
                                        <?php 
                                            $total_pemasukan = 0;
                                            $total_pengeluaran = 0;
                                            foreach($kode as $k){ 


                                                $q = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                                                    title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                                                    sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN
                                                    kode ON sub_kode.id_kode = kode.id_kode
                                                    WHERE approved_history.id_perumahan = $id_perum AND
                                                    kode.id_kode = $k->id_kode AND year(tanggal) = $year AND month(tanggal) = $month
                                                    ";
                                                    $q_pemasukan = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                                                    title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                                                    sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN
                                                    kode ON sub_kode.id_kode = kode.id_kode
                                                    WHERE approved_history.id_perumahan = $id_perum AND
                                                    kode.id_kode = $k->id_kode AND year(tanggal) = $year AND month(tanggal) = $month AND kode.kode = 1
                                                    ";
                                                    $q_pengeluaran = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                                                    title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                                                    sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN
                                                    kode ON sub_kode.id_kode = kode.id_kode
                                                    WHERE approved_history.id_perumahan = $id_perum AND
                                                    kode.id_kode = $k->id_kode AND year(tanggal) = $year AND month(tanggal) = $month AND kode.kode = 2
                                                    ";


                                                    $total_All = $this->db->query($q)->row();
                                                    $total_pemasukan += $this->db->query($q_pemasukan)->row()->total;
                                                    $total_pengeluaran += $this->db->query($q_pengeluaran)->row()->total;
                                         ?>

                                            <tr style="background: #F2E879;">
                                                <th colspan="2">Total <?= $k->deskripsi_kode ?></th>
                                                <th colspan="2">Rp. <?= number_format($total_All->total) ?></th>
                                            </tr>

                                        <?php } ?>

                                        <?php
                                            //pemasukan
                                            $bank_tjl_1 = $this->master->get_sisa_pembayaran('bank_tjl', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $bank_um_1 = $this->master->get_sisa_pembayaran('bank_um', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $bank_kt_1 = $this->master->get_sisa_pembayaran('bank_kt', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $bank_rb_1 = $this->master->get_sisa_pembayaran('bank_rb', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $bank_pb_1 = $this->master->get_sisa_pembayaran('bank_pb', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $bank_pak_1 = $this->master->get_sisa_pembayaran('bank_pak', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $bank_lain_1 = $this->master->get_sisa_pembayaran('bank_lain', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $bank_tj_1 = $this->master->get_sisa_pembayaran('bank_tj', $date_A, $date_B, $id_perum, 1)->row()->total;

                                            $inhouse_tj_1 = $this->master->get_sisa_pembayaran('inhouse_tj', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $inhouse_hk_1 = $this->master->get_sisa_pembayaran('inhouse_hk', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $inhouse_tjl_1 = $this->master->get_sisa_pembayaran('inhouse_tjl', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $inhouse_um_1 = $this->master->get_sisa_pembayaran('inhouse_um', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $inhouse_kt_1 = $this->master->get_sisa_pembayaran('inhouse_kt', $date_A, $date_B, $id_perum, 1)->row()->total;

                                            $pemasukan_lain_1 = $this->master->get_sisa_pembayaran('pemasukan_lain', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            
                                            $fee_marketing_1 = $this->master->get_sisa_pembayaran('fee_marketing', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $pembatalan_1 = $this->master->get_sisa_pembayaran('pembatalan', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            
                                            $upah_pekerja_1 = $this->master->get_sisa_pembayaran('upah_pekerja', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $pengajuan_material_1 = $this->master->get_sisa_pembayaran('pengajuan_material', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            $insidentil_1 = $this->master->get_sisa_pembayaran('insidentil', $date_A, $date_B, $id_perum, 1)->row()->total;
                                            
                                            $kas_operasional_1 = $this->master->get_sisa_pembayaran('kas_operasional', $date_A, $date_B, $id_perum, 1)->row()->total;



                                            //pengeluaran
                                            $bank_tjl_2 = $this->master->get_sisa_pembayaran('bank_tjl', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $bank_um_2 = $this->master->get_sisa_pembayaran('bank_um', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $bank_kt_2 = $this->master->get_sisa_pembayaran('bank_kt', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $bank_rb_2 = $this->master->get_sisa_pembayaran('bank_rb', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $bank_pb_2 = $this->master->get_sisa_pembayaran('bank_pb', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $bank_pak_2 = $this->master->get_sisa_pembayaran('bank_pak', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $bank_lain_2 = $this->master->get_sisa_pembayaran('bank_lain', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $bank_tj_2 = $this->master->get_sisa_pembayaran('bank_tj', $date_A, $date_B, $id_perum, 2)->row()->total;

                                            $inhouse_tj_2 = $this->master->get_sisa_pembayaran('inhouse_tj', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $inhouse_hk_2 = $this->master->get_sisa_pembayaran('inhouse_hk', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $inhouse_tjl_2 = $this->master->get_sisa_pembayaran('inhouse_tjl', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $inhouse_um_2 = $this->master->get_sisa_pembayaran('inhouse_um', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $inhouse_kt_2 = $this->master->get_sisa_pembayaran('inhouse_kt', $date_A, $date_B, $id_perum, 2)->row()->total;

                                            $pemasukan_lain_2 = $this->master->get_sisa_pembayaran('pemasukan_lain', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            
                                            $fee_marketing_2 = $this->master->get_sisa_pembayaran('fee_marketing', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $pembatalan_2 = $this->master->get_sisa_pembayaran('pembatalan', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            
                                            $upah_pekerja_2 = $this->master->get_sisa_pembayaran('upah_pekerja', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $pengajuan_material_2 = $this->master->get_sisa_pembayaran('pengajuan_material', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            $insidentil_2 = $this->master->get_sisa_pembayaran('insidentil', $date_A, $date_B, $id_perum, 2)->row()->total;
                                            
                                            $kas_operasional_2 = $this->master->get_sisa_pembayaran('kas_operasional', $date_A, $date_B, $id_perum, 2)->row()->total;



                                            $sisa_pemasukan = $bank_tjl_1 + $bank_um_1 + $bank_kt_1 + $bank_rb_1 + $bank_pb_1 + $bank_pak_1 + $bank_lain_1 + $bank_tj_1 + $inhouse_tj_1 + $inhouse_hk_1 + $inhouse_tjl_1 + $inhouse_um_1 + $inhouse_kt_1 + $pemasukan_lain_1 + $fee_marketing_1 + $pembatalan_1 + $upah_pekerja_1 + $pengajuan_material_1 + $insidentil_1 + $kas_operasional_1;

                                            $sisa_pengeluaran = $bank_tjl_2 + $bank_um_2 + $bank_kt_2 + $bank_rb_2 + $bank_pb_2 + $bank_pak_2 + $bank_lain_2 + $bank_tj_2 + $inhouse_tj_2 + $inhouse_hk_2 + $inhouse_tjl_2 + $inhouse_um_2 + $inhouse_kt_2 + $pemasukan_lain_2 + $fee_marketing_2 + $pembatalan_2 + $upah_pekerja_2 + $pengajuan_material_2 + $insidentil_2 + $kas_operasional_2;

                                        ?>

                                        <tr style="background: #F2E879;">
                                            <th colspan="2">Sisa Pemasukan</th>
                                            <th colspan="2">Rp. <?= number_format($sisa_pemasukan) ?></th>
                                        </tr>
                                        <tr style="background: #F2E879;">
                                            <th colspan="2">Sisa Pengeluaran</th>
                                            <th colspan="2">Rp. <?= number_format($sisa_pengeluaran) ?></th>
                                        </tr>

                                        <tr style="background: #F2E879;">
                                            <th colspan="2">Saldo</th>
                                            <th colspan="2">Rp. <?= number_format($total_pemasukan - $total_pengeluaran); ?></th>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card mt-3">
                            <div class="card-header bg-success text-light">
                                <h3 class="card-title">
                                    <b>Laporan Arus Kas</b>
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool bg-white text-primary" data-toggle="collapse" data-target="#collapse<?=$a++?>" aria-expanded="false" aria-controls="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive collapse" id="collapse<?=$b++?>">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $jml_debit = $this->master->get_arus_kas($date_A, $date_B, $id_perum, 1)->row()->total_all;
                                        $jml_kredit = $this->master->get_arus_kas($date_A, $date_B, $id_perum, 2)->row()->total_all;  
                                        $list = $this->master->get_arus_kas($date_A, $date_B, $id_perum, null)->result();
                                    ?>
                                    <?php 
                                    $i = 1;
                                    foreach($list as $l){ 
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>
                                                <?php $date = date_create($l->tanggal); echo date_format($date, 'd/m/Y'); ?>
                                            </td>
                                            <td><?= $l->ket ?></td>
                                            <?php if($l->kode == 1){ ?>
                                                <td>Rp. <?= number_format($l->jumlah) ?></td>
                                                <td></td>
                                            <?php } else if($l->kode == 2){ ?>
                                                <td></td>
                                                <td>Rp. <?= number_format($l->jumlah) ?></td>
                                            <?php } ?>
                                            
                                        </tr>
                                    <?php } ?>

                                    <tr style="background: #FFF566;">
                                        <th colspan="3">Jumlah</th>
                                        <th>Rp. <?= number_format($jml_debit) ?></th>
                                        <th>Rp. <?= number_format($jml_kredit) ?></th>
                                    </tr>
                                    <tr style="background: #FFF566;">
                                        <th colspan="3">Sisa Saldo</th>
                                        <th colspan="2">Rp. <?= number_format($jml_debit - $jml_kredit) ?></th>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        <?php } ?>

    </div>
</div>