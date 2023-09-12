<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Material</button>
    <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Upah</button>
    <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Lainnya</button>
    <button class="nav-link" id="nav-total-tab" data-toggle="tab" data-target="#nav-total" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Total</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    <!-- table material   -->
    <?php 
    $total_material = 0;
    foreach($tipe as $t){ 
        $jenis_material = $this->proyek->get_jenis_material_ajax_detail($t->id_tipe, $id_proyek)->result();    
        $list_blok = $this->proyek->get_blok_ajax_detail($t->id_tipe, $id_proyek)->result();    
        
    ?>
    <table class="table table-bordered mt-3">
            <tr class="bg-dark text-light">
                <th>Tipe</th>
                <th colspan="2"><?= $t->tipe ?></th>
                <th>Blok</th>
                <th colspan="3">
                  <?php foreach($list_blok as $lb){ ?>
                    <?= $lb->blok . $lb->no_rumah ?>
                  <?php } ?>
                </th>
            </tr>
            <tr class="bg-info text-light">
             
                <th>Jenis Material</th>
                <th>Nama Material</th>
                <th>Jumlah Material</th>
                <th>Harga Satuan</th>
                <th>Harga Real</th>
                <th>Total Harga</th>
                <th>Total Per Jenis Material</th>
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
                <td rowspan="<?= $jml_material + 1 ?>">Rp. <?= number_format($total_per_jenis) ?> <br>
                <small class="text-success">Total Harga Real: Rp. <?= number_format($total_all_per_jenis) ?></small>
                </td>
            </tr>
          
            
            <?php
            // var_dump($material);
            // die;
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
                    $id_pengajuan = $mt->pengajuan_id;
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

  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

  <?php 
  $total_upah = 0;
  foreach($tipe as $ti){ 
    $list_blok = $this->proyek->get_blok_ajax_detail($ti->id_tipe, $id_proyek)->result(); 
    $upah = $this->proyek->get_upah_ajax_detail($ti->id_tipe, $id_proyek);
    $jml_blok = $this->proyek->get_blok_ajax_detail($ti->id_tipe, $id_proyek)->num_rows();
  ?>
    <table class="table table-bordered mt-3">
      <tr class="bg-dark text-light">
        <th>Tipe: <?= $ti->tipe ?></th>
        <th colspan="3">Blok: 
          <?php foreach($list_blok as $blok){ echo $blok->blok.$blok->no_rumah . ' '; } ?>
        </th>
      </tr>
        <tr class="bg-info text-light">
            <th>Ket. Upah</th>
            <th>Harga Kontrak Per Blok</th>
            <th>Telah di bayarkan</th>
            <th>Total Kontrak Harga</th>
        </tr>

        <?php
          $totUp1 = 1;
          foreach($upah as $up){ 
          $id_upah = $up->id;  
          $total_all_terbayar = 0;
        ?>
          <tr>
            <td><?= $up->ket ?></td>
            <td>Rp. <?= number_format($up->harga_kontrak) ?></td>
            <td>
              <ul>
                <?php foreach($list_blok as $blok){ 
                  $id_kavling = $blok->id_kavling;
                  $jumlah = $this->proyek->count_total_upah_out($id_upah, $id_kavling)->row();
                  $total_all_terbayar += $jumlah->total;
                ?>
                <li><?= $blok->blok.$blok->no_rumah ?> <div class="float-right">Rp. <?php
                  if(isset($jumlah)){
                    echo number_format($jumlah->total);
                  } else {
                    echo '0';
                  }
                ?></div></li>
                <?php } ?>
              </ul>
            </td>
            <td>Rp. <?php $total_kontrak = $up->harga_kontrak * $jml_blok; echo number_format($total_kontrak); ?>
                  <br>
                  <p class="text-danger">Total Terbayar : Rp. <?= number_format($total_all_terbayar) ?></p>
            </td>
          </tr>
        <?php $totUp1 += $total_all_terbayar; } ?>
    </table>
  <?php $total_upah += $totUp1; } ?>

  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

  <?php foreach($tipe as $tip){ 
    $list_blok = $this->proyek->get_blok_ajax_detail($tip->id_tipe, $id_proyek)->result(); 
    $qty_blok = $this->proyek->get_blok_ajax_detail($tip->id_tipe, $id_proyek)->num_rows(); 
    $lain = $this->proyek->get_lainnya_ajax_detail($tip->id_tipe, $id_proyek);
  ?>
    <table class="table table-bordered mt-3">
      <tr class="bg-dark text-light">
        <th>Tipe: <?= $tip->tipe ?></th>
        <th colspan="2">Blok: 
          <?php foreach($list_blok as $list){ echo $list->blok.$list->no_rumah .' '; } ?>
        </th>
      </tr>
      <tr class="bg-info text-light">
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Total</th>
      </tr>
      <?php foreach($lain as $l){ ?>
        <tr>
          <td><?= $l->keterangan ?></td>
          <td>Rp. <?= number_format($l->harga_lainnya) ?></td>
          <td>Rp. <?php $total_lain = $l->harga_lainnya * $qty_blok; echo number_format($total_lain); ?></td>
        </tr>
      <?php } ?>
    </table>
  <?php } ?>


  </div>
  <div class="tab-pane fade" id="nav-total" role="tabpanel" aria-labelledby="nav-total-tab">

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

        <table class="table table-bordered mt-3">
          <tr class="bg-dark text-light">
            <th>Nama</th>
            <th>Total</th>
          </tr>
          <tr>
            <td>RAB Material</td>
            <td>Rp. <?= number_format($rab_material) ?> 
              <br>
              <small class="text-success">Terbayar: Rp. <?= number_format($total_material); ?></small>
            </td>
          </tr>
          <tr>
            <td>RAB Upah</td>
            <td>Rp. <?= number_format($rab_upah) ?>
            <br>
            <small class="text-success">Terbayar: Rp. <?= number_format($total_upah) ?></small>
            </td>
          </tr>
          <tr>
            <td>RAB Lainnya</td>
            <td>Rp. <?= number_format($rab_lainnya) ?></td>
          </tr>
          <tr class="bg-secondary text-light">
            <th>Total Keseluruhan</th>
            <th>Rp. <?= number_format($total_all); ?> <br> <small>Total terbayar: Rp. <?= number_format($total_all_finish) ?></small></th>
          </tr>
        </table>

  </div>
</div>



