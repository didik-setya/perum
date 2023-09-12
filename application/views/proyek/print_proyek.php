<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Proyek</title>
    <style>
        #print_page {
            width: 120px;
            height: 30px;
            border: none;
            background : #cc1030;
            color: #ffffff;
            border-radius: 3px;
        }
        #print_page {
            cursor: pointer;
        }
        #title-text {
            text-transform: uppercase;
        }
        #subtitle-text {
            text-transform: uppercase;
            font-size: 20px;
        }
        .text-bold {
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .thead {
            background: #C1C1C1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, td{
            border: 1px solid #999;
            padding: 7px;
        }
        @media print{
            #print_page {
                display: none;
            }
        }
    </style>
</head>
<body>
    
   <button id="print_page" onclick="window.print()">PRINT</button>
   <div class="text-center">
       <span id="title-text" class="text-bold">Laporan Akhir Pembangunan</span><br>
       <span id="subtitle-text" class="text-bold">Perumahan <?= $perum->nama_perumahan ?></span><br>
       <span><?= $perum->alamat_perumahan ?></span>
    </div>

    <table border="1" style="margin-top: 40px">
        <tr>
            <td class="text-bold" style="width:20%">Nama Perumahan</td>
            <td><?= $perum->nama_perumahan; ?></td>
        </tr>
        <tr>
            <td class="text-bold">Nama Proyek</td>
            <td><?= $proyek->nama_proyek ?></td>
        </tr>
        <tr>
            <td class="text-bold">Tanggal Pengajuan</td>
            <td>
                <?php 
                    $date = date_create($proyek->tgl_pengajuan);
                    echo date_format($date, 'j F Y');
                ?>
            </td>
        </tr>
        
    </table>

    <table style="margin-top: 20px">
        <tr>
        <td colspan="4" class="text-bold" style="font-size: 19px; text-transform: uppercase; width: 100%;">Detail Material RAB</td>
        </tr>
    </table>

    <table border="1">
        <thead class="thead">
            <tr>
                <th>Material</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($material as $m){ ?>
            <tr>
                <td><?= $m->nama_material ?></td>
                <td><?= $m->quantity .' '. $m->nama_satuan?></td>
                <td>Rp. <?= number_format($m->harga); ?></td>
                <td>Rp. <?= number_format($m->total) ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Akhir</th>
                <th>Rp. <?= number_format($total_material) ?></th>
            </tr>
        </tfoot>
    </table>


    <table style="margin-top: 20px">
        <tr>
            <td colspan="4" class="text-bold" style="font-size: 19px; text-transform: uppercase; width: 100%;">Detail Material Masuk</td>
        </tr>
    </table>
    <table border="1">
        <thead class="thead">
            <tr>
                <th>Material</th>
                <th>Jumlah</th>
                <th>Harga Real</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $tot = 0;
            foreach($material_masuk as $mm){ 
                $total = $mm->jml_pengajuan * $mm->harga_real;
                $tot += $total;
            ?>
            <tr>
                <td><?= $mm->nama_material ?></td>
                <td><?= $mm->jml_pengajuan .' '. $mm->nama_satuan ?></td>
                <td>Rp. <?= number_format($mm->harga_real) ?></td>
                <td>Rp. <?= number_format($total); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Akhir</th>
                <th>Rp. <?= number_format($tot); ?></th>
            </tr>
        </tfoot>
    </table>

    <table style="margin-top: 20px">
        <tr>
            <td colspan="4" class="text-bold" style="font-size: 19px; text-transform: uppercase; width: 100%;">Detail Material Keluar</td>
        </tr>
    </table>
    <table border="1">
        <thead class="thead">
            <tr>
                <th>Material</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($material_keluar as $mk){ 
                $q_masuk = "SELECT SUM(material_masuk) AS masuk FROM master_logistik_masuk JOIN master_logistik ON master_logistik_masuk.logistik_id = master_logistik.id WHERE master_logistik.material_id = $mk->material_id AND master_logistik.id_proyek = $id_pro";

                $q_keluar = "SELECT SUM(jml_keluar) AS keluar FROM material_keluar JOIN master_logistik ON material_keluar.id_logistik = master_logistik.id WHERE master_logistik.material_id = $mk->material_id AND master_logistik.id_proyek = $id_pro";

                $q_stok = "SELECT SUM(stok) AS stock FROM logistik_stok JOIN master_logistik ON logistik_stok.logistik_id = master_logistik.id WHERE master_logistik.material_id = $mk->material_id AND master_logistik.id_proyek = $id_pro";  
                
                
                $masuk = $this->db->query($q_masuk)->row()->masuk;
                $keluar = $this->db->query($q_keluar)->row()->keluar;
                $stok = $this->db->query($q_stok)->row()->stock;
                if($masuk == ''){
                    $show_masuk = 0;
                } else {
                    $show_masuk = $masuk;
                }
                
                if($keluar == ''){
                    $show_keluar = 0;
                } else {
                    $show_keluar = $keluar;
                }

                if($stok == ''){
                    $show_stok = 0;
                } else {
                    $show_stok = $stok;
                }
            ?>
            <tr>
                <td><?= $mk->nama_material ?></td>
                <td><?= $show_masuk .' '. $mk->nama_satuan ?></td>
                <td><?= $show_keluar .' '. $mk->nama_satuan ?></td>
                <td><?= $show_stok .' '. $mk->nama_satuan ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>







    <table style="margin-top: 20px">
        <tr>
            <td colspan="4" class="text-bold" style="font-size: 19px; text-transform: uppercase; width: 100%;">Upah Pekerja</td>
        </tr>
    </table>
    <table border="1">
        <thead class="thead">
            <tr>
                <th>Tipe</th>
                <th>Harga Kontrak per Blok</th>
                <th>Jumlah Blok</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $toUp = 0;
            foreach($upah as $up){
                $q = "SELECT * FROM
                    tbl_proyek_upah,
                    master_proyek_kavling,
                    tbl_kavling
                    WHERE 
                    tbl_proyek_upah.proyek_id = master_proyek_kavling.proyek_id AND
                    master_proyek_kavling.kavling_id = tbl_kavling.id_kavling AND
                    tbl_proyek_upah.tipe_id = tbl_kavling.id_tipe AND
                    tbl_proyek_upah.proyek_id = $id_pro AND
                    tbl_proyek_upah.tipe_id = $up->tipe_id
                ";    
                $jml_kav = $this->db->query($q)->num_rows();
                $tot = $jml_kav * $up->harga_kontrak;
                $toUp += $tot;
            ?>
            <tr>
                <td><?= $up->tipe ?></td>
                <td>Rp. <?= number_format($up->harga_kontrak) ?></td>
                <td><?= $jml_kav ?></td>
                <td>
                    Rp. <?= number_format($jml_kav * $up->harga_kontrak) ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Akhir</th>
                <th><?= number_format($toUp) ?></th>
            </tr>
        </tfoot>
    </table>

    <table style="margin-top: 20px">
        <tr>
            <td colspan="4" class="text-bold" style="font-size: 19px; text-transform: uppercase; width: 100%;">Detail Upah Pekerja</td>
        </tr>
    </table>
    <table border="1">
        <thead class="thead">
            <tr>
                <th>Blok</th>
                <th>Minggu Ke</th>
                <th>Tanggal</th>
                <th>Progres Pembangunan</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($detail_upah as $dup){
                $query = $this->db->get_where('progres_pembangunan',['upah_id' => $dup->id_upah,'kavling_id' => $dup->id_kavling]); 
                $progres = $query->result();
                $jml_progres = $query->num_rows();
             ?>
            <tr>
                <td rowspan="<?= $jml_progres + 1 ?>"><?= $dup->blok . $dup->no_rumah ?></td>
                <td style="border: none; background: #c1c1c1"></td>
                <td style="border: none; background: #c1c1c1"></td>
                <td style="border: none; background: #c1c1c1"></td>
                <td style="border: none; background: #c1c1c1"></td>
                <td rowspan="<?= $jml_progres + 1 ?>">
                    <?php
                        $tPro = 0;
                        foreach($progres as $p){
                            $tPro += $p->total;
                        }
                        echo 'Rp. ' . number_format($tPro);
                    ?>
                </td>
            </tr>

            <?php $i = 1; foreach($progres as $pro){ ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td>
                        <?php
                            $date = date_create($pro->tanggal);
                            echo date_format($date, 'j F Y');
                        ?>
                    </td>
                    <td width="10%"><?= $pro->progres ?>%</td>
                    <td>Rp. <?= number_format($pro->total); ?></td>
                </tr>
            <?php } ?>

            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Total Akhir</th>
                <th>Rp. <?= number_format($total_detail_upah) ?></th>
            </tr>
        </tfoot>
    </table>

    <table style="margin-top: 20px;">
        <tr>
            <td colspan="4" class="text-bold" style="font-size: 19px; text-transform: uppercase; width: 100%;">Lain-lain</td>
        </tr>
    </table>
    <table border="1">
        <thead class="thead">
            <tr>
                <th>Tipe</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totAkhLa = 0;
            foreach($lain as $la){
                $q = $this->db->get_where('tbl_proyek_lainnya',['tipe_id' => $la->id_tipe, 'proyek_id' => $id_pro]); 
                $lain2 = $q->result();
                $jml_lain = $q->num_rows();  
                $totAkhLa += $la->harga_lainnya;
            ?>
            <tr>
                <td rowspan="<?= $jml_lain + 1; ?>"><?= $la->tipe ?></td>
                <td style="border: none; background: #c1c1c1"></td>
                <td style="border: none; background: #c1c1c1"></td>
            </tr>
                <?php foreach($lain2 as $l2){ ?>
                    <tr>
                        <td><?= $l2->keterangan ?></td>
                        <td>Rp. <?= number_format($l2->harga_lainnya) ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total Akhir</th>
                <th>Rp. <?= number_format($totAkhLa) ?></th>
            </tr>
        </tfoot>
    </table>

</body>
</html>