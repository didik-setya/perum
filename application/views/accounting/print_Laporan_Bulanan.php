<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .theTable {
            border-collapse: collapse;
        }

        .tBorderthead, th{
            border: 1px solid #999;
            padding: 8px 20px;  
            background: #4a4a4a;
            color: #ffffff;
            font-family: sans-serif;
        }

        .tbodytr td {
            border: 1px solid #999;
            padding: 8px 20px;
            font-family: sans-serif;
            background: #828282;
            color: #ffffff;
        }

        .tbodytr1 td {
            border: 1px solid #999;
            padding: 8px 20px;
            font-family: sans-serif;
            background: #d9d7d7;
            color: #303030;
        }

        .tbodytr2 td {
            border: 1px solid #999;
            padding: 8px 20px;
            font-family: sans-serif;
        }

        

    </style>
    <title>Laporan Bulanan</title>
    
</head>
<body>
    
    <table width="100%" style="text-align: center; margin-bottom: 30px;">
        <tr>
            <td><img src="<?= base_url('assets/img/g1.png'); ?>" width="70px"></td>
            <td>
                <b style="font-size: 20px">Laporan Keuangan Bulanan</b><br>
                <span>Perumahan <?= $perumahan->nama_perumahan ?><span><br>
                <span>Bulan <?php $date = date_create($date_A); echo date_format($date, 'F Y') ?></span>
            </td>
            <td><img src="<?= base_url('assets/img/') . $this->session->userdata('logo_perumahan'); ?>" width="70px"></td>
        </tr>
    </table>


    <table class="theTable" style="margin-bottom: 30px" width="100%" border="1">
        <thead>
            <tr class="tBorderthead">
                <th width="14%">Kode</th>
                <th>Akun</th>
                <th>Kredit</th>
                <th>Debit</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($kode as $k){ ?>
            <tr class="tbodytr">
                <td><?= $k->kode ?></td>
                <td colspan="3"><?= $k->deskripsi_kode ?></td>
            </tr>


            <?php 
                $sub_kode = $this->db->order_by('sub_kode','ASC')->get_where('sub_kode',['id_kode' => $k->id_kode])->result();
                foreach($sub_kode as $sk){
            ?>
                <tr class="tbodytr1">
                    <td><?= $k->kode .'.'. $sk->sub_kode ?></td>
                    <td colspan="3"><?= $sk->deskripsi_sub_kode ?></td>
                </tr>


                <?php
                $title_kode = $this->db->order_by('kode_title','ASC')->get_where('title_kode',['id_sub' => $sk->id_sub])->result();
                foreach($title_kode as $tk){

                    $q = "SELECT SUM(jumlah) as total_all FROM approved_history WHERE id_perumahan = $perum AND id_title_kode = $tk->id_title AND tanggal BETWEEN '".$date_A."' AND '".$date_B."'";
                    $kredit = $this->db->query($q)->row()->total_all;
                ?>

                    <tr class="tbodytr2">
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
         foreach($kode as $k){ ?>
            <?php
                $q = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                    title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                    sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN
                    kode ON sub_kode.id_kode = kode.id_kode
                    WHERE approved_history.id_perumahan = $perum AND
                    kode.id_kode = $k->id_kode AND tanggal BETWEEN '".$date_A."' AND '".$date_B."'
                ";

                $q_pemasukan = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                    title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                    sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN
                    kode ON sub_kode.id_kode = kode.id_kode
                    WHERE approved_history.id_perumahan = $perum AND
                    kode.id_kode = $k->id_kode AND tanggal BETWEEN '".$date_A."' AND '".$date_B."' AND kode.kode = 1
                ";
                $q_pengeluaran = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                    title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                    sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN
                    kode ON sub_kode.id_kode = kode.id_kode
                    WHERE approved_history.id_perumahan = $perum AND
                    kode.id_kode = $k->id_kode AND tanggal BETWEEN '".$date_A."' AND '".$date_B."' AND kode.kode = 2
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
        $bank_tjl_1 = $this->master->get_sisa_pembayaran('bank_tjl', $date_A, $date_B, $perum, 1)->row()->total;
        $bank_um_1 = $this->master->get_sisa_pembayaran('bank_um', $date_A, $date_B, $perum, 1)->row()->total;
        $bank_kt_1 = $this->master->get_sisa_pembayaran('bank_kt', $date_A, $date_B, $perum, 1)->row()->total;
        $bank_rb_1 = $this->master->get_sisa_pembayaran('bank_rb', $date_A, $date_B, $perum, 1)->row()->total;
        $bank_pb_1 = $this->master->get_sisa_pembayaran('bank_pb', $date_A, $date_B, $perum, 1)->row()->total;
        $bank_pak_1 = $this->master->get_sisa_pembayaran('bank_pak', $date_A, $date_B, $perum, 1)->row()->total;
        $bank_lain_1 = $this->master->get_sisa_pembayaran('bank_lain', $date_A, $date_B, $perum, 1)->row()->total;
        $bank_tj_1 = $this->master->get_sisa_pembayaran('bank_tj', $date_A, $date_B, $perum, 1)->row()->total;

        $inhouse_tj_1 = $this->master->get_sisa_pembayaran('inhouse_tj', $date_A, $date_B, $perum, 1)->row()->total;
        $inhouse_hk_1 = $this->master->get_sisa_pembayaran('inhouse_hk', $date_A, $date_B, $perum, 1)->row()->total;
        $inhouse_tjl_1 = $this->master->get_sisa_pembayaran('inhouse_tjl', $date_A, $date_B, $perum, 1)->row()->total;
        $inhouse_um_1 = $this->master->get_sisa_pembayaran('inhouse_um', $date_A, $date_B, $perum, 1)->row()->total;
        $inhouse_kt_1 = $this->master->get_sisa_pembayaran('inhouse_kt', $date_A, $date_B, $perum, 1)->row()->total;

        $pemasukan_lain_1 = $this->master->get_sisa_pembayaran('pemasukan_lain', $date_A, $date_B, $perum, 1)->row()->total;
        
        $fee_marketing_1 = $this->master->get_sisa_pembayaran('fee_marketing', $date_A, $date_B, $perum, 1)->row()->total;
        $pembatalan_1 = $this->master->get_sisa_pembayaran('pembatalan', $date_A, $date_B, $perum, 1)->row()->total;
        
        $upah_pekerja_1 = $this->master->get_sisa_pembayaran('upah_pekerja', $date_A, $date_B, $perum, 1)->row()->total;
        $pengajuan_material_1 = $this->master->get_sisa_pembayaran('pengajuan_material', $date_A, $date_B, $perum, 1)->row()->total;
        $insidentil_1 = $this->master->get_sisa_pembayaran('insidentil', $date_A, $date_B, $perum, 1)->row()->total;
        
        $kas_operasional_1 = $this->master->get_sisa_pembayaran('kas_operasional', $date_A, $date_B, $perum, 1)->row()->total;



        //pengeluaran
        $bank_tjl_2 = $this->master->get_sisa_pembayaran('bank_tjl', $date_A, $date_B, $perum, 2)->row()->total;
        $bank_um_2 = $this->master->get_sisa_pembayaran('bank_um', $date_A, $date_B, $perum, 2)->row()->total;
        $bank_kt_2 = $this->master->get_sisa_pembayaran('bank_kt', $date_A, $date_B, $perum, 2)->row()->total;
        $bank_rb_2 = $this->master->get_sisa_pembayaran('bank_rb', $date_A, $date_B, $perum, 2)->row()->total;
        $bank_pb_2 = $this->master->get_sisa_pembayaran('bank_pb', $date_A, $date_B, $perum, 2)->row()->total;
        $bank_pak_2 = $this->master->get_sisa_pembayaran('bank_pak', $date_A, $date_B, $perum, 2)->row()->total;
        $bank_lain_2 = $this->master->get_sisa_pembayaran('bank_lain', $date_A, $date_B, $perum, 2)->row()->total;
        $bank_tj_2 = $this->master->get_sisa_pembayaran('bank_tj', $date_A, $date_B, $perum, 2)->row()->total;

        $inhouse_tj_2 = $this->master->get_sisa_pembayaran('inhouse_tj', $date_A, $date_B, $perum, 2)->row()->total;
        $inhouse_hk_2 = $this->master->get_sisa_pembayaran('inhouse_hk', $date_A, $date_B, $perum, 2)->row()->total;
        $inhouse_tjl_2 = $this->master->get_sisa_pembayaran('inhouse_tjl', $date_A, $date_B, $perum, 2)->row()->total;
        $inhouse_um_2 = $this->master->get_sisa_pembayaran('inhouse_um', $date_A, $date_B, $perum, 2)->row()->total;
        $inhouse_kt_2 = $this->master->get_sisa_pembayaran('inhouse_kt', $date_A, $date_B, $perum, 2)->row()->total;

        $pemasukan_lain_2 = $this->master->get_sisa_pembayaran('pemasukan_lain', $date_A, $date_B, $perum, 2)->row()->total;
        
        $fee_marketing_2 = $this->master->get_sisa_pembayaran('fee_marketing', $date_A, $date_B, $perum, 2)->row()->total;
        $pembatalan_2 = $this->master->get_sisa_pembayaran('pembatalan', $date_A, $date_B, $perum, 2)->row()->total;
        
        $upah_pekerja_2 = $this->master->get_sisa_pembayaran('upah_pekerja', $date_A, $date_B, $perum, 2)->row()->total;
        $pengajuan_material_2 = $this->master->get_sisa_pembayaran('pengajuan_material', $date_A, $date_B, $perum, 2)->row()->total;
        $insidentil_2 = $this->master->get_sisa_pembayaran('insidentil', $date_A, $date_B, $perum, 2)->row()->total;
        
        $kas_operasional_2 = $this->master->get_sisa_pembayaran('kas_operasional', $date_A, $date_B, $perum, 2)->row()->total;



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
            <th colspan="2">Rp. <?= number_format($total_pemasukan - $total_pengeluaran) ?></th>
        </tr>

        </tbody>
    </table>

    <table width="100%">
        <tr>
            <td style="text-align: left">
            <span><?= $perumahan->kabupaten .', '. date('d F Y') ?></span>
                <p>Menyetujui</p>
                <br><br><br><br> <br>

                ---------------- <br>
                <span>Direktur</span>
            </td>
            <td style="text-align: right">
                <br>
                <p>Di Buat Oleh</p>
                <br><br><br><br>
                <?= $user->nama ?>
                <br>
                ---------------- <br>
                <span>Accounting</span>
            </td>
        </tr>
    </table>

</body>
</html>
