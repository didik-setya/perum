<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data</title>
    <style>
        #Title1 {
            font-size: 25px;
        }
        #perumName {
            font-size: 15px;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 5px;
        }

        .heading {
            background: #adadad;
            color: #1a1a1a;
            font-size: 12px;
        }

        .heading2{
            background: #8787ff;
            color: #fcfcfc;
            font-size: 12px;
        }

        tr th, td {
            padding: 5px 1px;
        }


        tr td {
            font-size: 11px;
        }
        tr th {
            font-size: 12px;
        }

        .text-success {
            color: #0ccc13;
        }

        .text-danger {
            color: #c92118;
        }

        .float-right {
            text-align: center;
        }
        .center {
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="center">
        <span id="Title1"><b>Laporan RAB Proyek</b></span> <br>
        <span id="perumName"><b>Perumahan <?= $perum->nama_perumahan ?></b></span>
    </div>
    
    <hr>
    <small>Proyek: <?= $proyek->nama_proyek ?> <br> Tanggal Cetak: <?php $date = date_create(date('Y-m-d')); echo date_format($date, 'd F Y'); ?> </small> 

    <p><b>RAB Material</b></p>

<?php 
    $total_material = 0;
    foreach($tipe as $t){ 
    $jenis_material = $this->proyek->get_jenis_material_ajax_detail($t->id_tipe, $id_proyek)->result();    
    $list_blok = $this->proyek->get_blok_ajax_detail($t->id_tipe, $id_proyek)->result();    
?>
    <table class="table" border="1">
        <tr class="heading2">
            <th>Tipe</th>
            <th colspan="6"><?= $t->tipe ?></th>
        </tr>
        <tr class="heading2">
            <th>Kavling</th>
            <th colspan="6">
                <?php foreach($list_blok as $blok){ echo $blok->blok.$blok->no_rumah . ' '; } ?>
            </th>
        </tr>
        <tr class="heading">
            <th>Jenis Material</th>
            <th>Nama Material</th>
            <th>Jumlah Material</th>
            <th>Harga Satuan</th>
            <th>Harga Real</th>
            <th>Total Harga</th>
            <th>Total per Jenis Material</th>
        </tr>

        <?php 
        foreach($jenis_material as $jm){ 
            $jml_material = $this->proyek->get_jml_material_ajax_detail_material($t->id_tipe, $id_proyek, $jm->kategori_id)->num_rows();
            $material = $this->proyek->get_jml_material_ajax_detail_material($t->id_tipe, $id_proyek, $jm->kategori_id)->result();
            $total_per_jenis =  $this->proyek->get_total_per_jenis_ajax_detail_material($t->id_tipe, $id_proyek, $jm->kategori_id);

            $total_all_per_jenis = 0;
            foreach($material as $m){
              $id_proyek_material = $m->id_proyek_material;
              $mout = $this->proyek->get_material_out_rab($id_proyek_material)->result();
              $tot1 = 0;
              foreach($mout as $mt){
                $tot1 += $mt->harga_real * $mt->jml_pengajuan;
              }
              $total_all_per_jenis += $tot1;
            }
            $total_material += $total_all_per_jenis;
        ?>
            <tr>
                <td rowspan="<?= $jml_material + 1 ?>"><?= $jm->kategori_produk ?></td>
                <td colspan="5" class="bg-secondary"></td>
                <td rowspan="<?= $jml_material + 1 ?>">
                    Rp. <?= number_format($total_per_jenis) ?> <br>
                    <small class="text-success">Total Terbayar: Rp. <?= number_format($total_all_per_jenis) ?></small>
                </td>
            </tr>

            <?php
            foreach($material as $mat){ 
                $id_proyek_material = $mat->id_proyek_material;
                $mat_out = $this->proyek->get_material_out_rab($id_proyek_material)->result();
                // var_dump($mat_out);
                $total_material_out = 0;
                foreach($mat_out as $mo){
                    $total_material_out += $mo->jml_pengajuan;
                    $total_all_per_jenis += $mo->jml_pengajuan * $mo->harga_real;
                }
            ?>
                <tr>
                    <td><?= $mat->nama_material ?></td>
                    <td>
                        <?= $mat->quantity .' '. $mat->nama_satuan; ?>
                        <p class="text-danger">Material di belanjakan: <?= $total_material_out .' '. $mat->nama_satuan ?></p>
                    </td>
                    <td>Rp. <?= number_format($mat->harga) ?></td>
                    <td>
                    <ul>
                    <?php 
                    $tot_mat_out = 0;
                    foreach($mat_out as $mt){ 
                    $tot_mat_out += $mt->jml_pengajuan * $mt->harga_real;
                    ?>
                        <li class="text-primary">
                        <small><?= $mt->jml_pengajuan ?> x Rp. <?= number_format($mt->harga_real) ?> = Rp. <?= number_format($mt->jml_pengajuan * $mt->harga_real) ?></small>
                        </li>
                        <?php } ?>
                    </ul>
                        
                    </td>
                    <td>Rp. <?= number_format($mat->total) ?> <br>
                        <small class="text-success">Rp. <?= number_format($tot_mat_out) ?></small>
                    </td>
                </tr>
            <?php  } ?>

        <?php } ?>



    </table>
<?php } ?>

    <p><b>RAB Upah Pekerja</b></p>

<?php 
  $total_upah = 0;
  foreach($tipe as $ti){ 
    $list_blok = $this->proyek->get_blok_ajax_detail($ti->id_tipe, $id_proyek)->result(); 
    $upah = $this->proyek->get_upah_ajax_detail($ti->id_tipe, $id_proyek);
    $jml_blok = $this->proyek->get_blok_ajax_detail($ti->id_tipe, $id_proyek)->num_rows();
?>
    <table class="table" border="1">
        <tr class="heading2">
            <th>Tipe</th>
            <th colspan="3">
                <?= $ti->tipe ?>
            </th>
        </tr>
        <tr class="heading2">
            <th>Kavling</th>
            <th colspan="3">
                <?php foreach($list_blok as $blok){ echo $blok->blok.$blok->no_rumah . ' '; } ?>
            </th>
        </tr>
        <tr>
            <th>Ket. Upah</th>
            <th>Harga Kontrak per Blok</th>
            <th>Telah di Bayarkan</th>
            <th>Total Harga Kontrak</th>
        </tr>

        <?php
          $totUp1 = 1;
          foreach($upah as $up){ 
          $id_upah = $up->id;  
          $total_all_terbayar = 0;
        ?>
          <tr>
            <td width="20%"><?= $up->ket ?></td>
            <td width="20%">Rp. <?= number_format($up->harga_kontrak) ?></td>
            <td width="30%">
              <ul>
                <?php foreach($list_blok as $blok){ 
                  $id_kavling = $blok->id_kavling;
                  $jumlah = $this->proyek->count_total_upah_out($id_upah, $id_kavling)->row();
                  $total_all_terbayar += $jumlah->total;
                ?>
                <li><?= $blok->blok.$blok->no_rumah ?> <span class="float-right">Rp. <?php
                  if(isset($jumlah)){
                    echo number_format($jumlah->total);
                  } else {
                    echo '0';
                  }
                ?></span></li>
                <?php } ?>
              </ul>
            </td>
            <td width="30%">Rp. <?php $total_kontrak = $up->harga_kontrak * $jml_blok; echo number_format($total_kontrak); ?>
                  <br>
                  <p class="text-danger">Total Terbayar : Rp. <?= number_format($total_all_terbayar) ?></p>
            </td>
          </tr>
        <?php $totUp1 += $total_all_terbayar; } ?>


    </table>
<?php $total_upah += $totUp1; } ?>

    <p><b>Total Keseluruhan</b></p>

    <?php
      $rab_material = $this->proyek->get_total_material_ajax_detail($id_proyek);
      $rab_upah = 0;
      $rab_lainnya = 0;
      $upah1 = $this->db->get_where('tbl_proyek_upah',['proyek_id' => $id_proyek])->result();
      $lainnya1 =  $this->db->get_where('tbl_proyek_lainnya',['proyek_id' => $id_proyek])->result();
      
      foreach($upah1 as $up1){
        $qKav = "SELECT * FROM master_proyek_kavling JOIN tbl_kavling ON master_proyek_kavling.kavling_id = tbl_kavling.id_kavling WHERE master_proyek_kavling.proyek_id = $id_proyek AND tbl_kavling.id_tipe = $up1->tipe_id";
        $totKav = $this->db->query($qKav)->num_rows();
        $jmTot = $totKav * $up1->harga_kontrak;
        $rab_upah += $jmTot;
      }

      foreach($lainnya1 as $lain1){
        $qKav2 = "SELECT * FROM master_proyek_kavling JOIN tbl_kavling ON master_proyek_kavling.kavling_id = tbl_kavling.id_kavling WHERE master_proyek_kavling.proyek_id = $id_proyek AND tbl_kavling.id_tipe = $lain1->tipe_id";
        $totKav2 = $this->db->query($qKav2)->num_rows();
        $jmTot2 = $totKav2 * $lain1->harga_lainnya;
        $rab_lainnya += $jmTot2;
      }

      $total_all = $rab_material + $rab_upah + $rab_lainnya;
      $total_all_finish = $total_material + $total_upah;

    ?>

    <table class="table" border="1">
        <tr class="heading">
            <th>RAB</th>
            <th>Total RAB</th>
            <th>Total Terbayarkan</th>
        </tr>
        <tr>
            <td>RAB Material</td>
            <td>Rp. <?= number_format($rab_material) ?> </td>
            <td>Rp. <?= number_format($total_material); ?></td>    
        </tr>
        <tr>
            <td>RAB Upah Pekerja</td>
            <td>Rp. <?= number_format($rab_upah) ?></td>
            <td>Rp. <?= number_format($total_upah) ?></td>
        </tr>
        <tr>
            <th>Total Keseluruhan</th>
            <td>Rp. <?= number_format($total_all); ?></td>
            <td>Rp. <?= number_format($total_all_finish) ?></td>
        </tr>
        
    </table>
</body>

</html>