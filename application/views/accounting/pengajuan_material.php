<?php $user = $this->session->userdata('group_id'); 
  if($user == 3){
    $acs = '';
  } else {
    $acs = 'd-none';
  }
?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Pengajuan Material</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                <div class="row">
                  <div class="col-lg-6">
                    <button class="btn btn-sm btn-success" id="btnfilterDate"><i class="fa fa-calendar"></i> Filter Tanggal</button>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                    <div class="form-group">
                      <label>Filter by Proyek</label>
                      <select name="filter" class="form-control" id="filter">
                        <option value="">--All--</option>
                        <?php foreach($filter as $f){ ?>
                          <?php if($_GET['filter'] == $f->id){ ?>
                            <option value="<?= $f->id ?>" selected><?= $f->nama_proyek ?></option>
                          <?php } else { ?>
                            <option value="<?= $f->id ?>"><?= $f->nama_proyek ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>

                  </div>
                </div>


                    <table class="table table-bordered" id="pegajuanTable">
                        <thead>
                            <tr class="bg-dark text-light">
                                <th>#</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Nama Proyek</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Status</th>
                                <th><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($data as $d){ 
                              $logistik = $this->db->select('
                                master_logistik.id,
                                master_logistik.jml_pengajuan,
                                master_logistik.tipe
                              ')->from('master_logistik')
                              ->join('pengajuan_material', 'master_logistik.time = pengajuan_material.time')
                              ->where('pengajuan_material.id_pengajuan', $d->id_pengajuan)->get()->result();

                              $harga_rab = 0;
                              $harga_gudang = 0;
                              foreach($logistik as $log){
                                if($log->tipe == 1){
                                  $harga_real = $this->db->get_where('master_logistik_detail',['logistik_id' => $log->id])->row();

                                  if($harga_real){
                                    $harga_rab += $harga_real->harga_real * $log->jml_pengajuan;
                                  } else {
                                    $harga_rab += 0;
                                  }


                                } else {
                                  $harga_gudang += 0;
                                }
                              }

                              $total = $harga_rab + $harga_gudang;
                              


                            ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?php $date = date_create($d->tgl_pengajuan); echo date_format($date, 'd F Y'); ?></td>
                                <td><?= $d->nama_proyek ?></td>
                                <td>Rp. <?= number_format($total) ?></td>
                                <td>
                                                <?php
                                                    if($d->status_pengajuan == 1){
                                                        $show = 'Di ajukan';
                                                        $color = 'secondary';
                                                    } else if($d->status_pengajuan == 2){
                                                        $show = 'Approved';
                                                        $color = 'warning';
                                                    } else if($d->status_pengajuan == 3){
                                                        $show = 'Menunggu accounting';
                                                        $color = 'success';
                                                    } else if($d->status_pengajuan == 4){
                                                        $show = 'Approved';
                                                        $color = 'info';
                                                    } else if($d->status_pengajuan == 5){
                                                        $show = 'Approved super admin';
                                                        $color = 'primary';
                                                    } else if($d->status_pengajuan == 0){
                                                        $show = 'Di tolak';
                                                        $color = 'danger';
                                                    }
                                                    echo '<span class="badge badge-pill badge-'.$color.'">'.$show.'</span>'
                                                ?>
                                </td>
                                <td>
                                    <?php if($user == 3){ ?>
                                        <?php if($d->status_pengajuan == 3){ ?>
                                            <button class="btn btn-xs btn-success check" data-id="<?= $d->id_pengajuan ?>"><i class="fa fa-check"></i></button>
                                        <?php } else if($d->status_pengajuan == 4){ ?>
                                            <button class="btn btn-xs btn-primary mcm" data-id="<?= $d->id_pengajuan ?>"><i class="fa fa-plus"></i></button>
                                            
                                            <button class="btn btn-xs btn-warning edit-kode" data-id="<?= $d->id_pengajuan ?>" data-type="pengajuan_material"><i class="fa fa-edit"></i> Edit Kode</button>
                                            <button class="btn btn-xs btn-secondary view-kode" data-kode="<?= $d->title_kode ?>"><i class="fa fa-search"></i> Lihat Kode</button>

                                        <?php } ?>
                                        <button class="btn btn-xs btn-secondary detail" data-id="<?= $d->id_pengajuan ?>"><i class="fa fa-search"></i></button>
                                    <?php } else { ?>
                                      <?php if($d->status_pengajuan == 4){ ?>
                                        <button class="btn btn-xs btn-primary mcm" data-id="<?= $d->id_pengajuan ?>"><i class="fa fa-plus"></i></button>
                                        <button class="btn btn-xs btn-secondary view-kode" data-kode="<?= $d->title_kode ?>"><i class="fa fa-search"></i> Lihat Kode</button>
                                      <?php } ?>
                                      <button class="btn btn-xs btn-secondary detail" data-id="<?= $d->id_pengajuan ?>"><i class="fa fa-search"></i></button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<!-- Modal Detail-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan Material</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body detailshow">
                                            
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalKode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kode</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/toKodePengajuanMaterial'); ?>" id="postKode" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        
      <input type="hidden" name="id" id="id">
      <input type="hidden" name="type" id="type_kode">

      <div class="form-group">
            <label>Kode</label>
            <select name="kode" id="kode" class="form-control" required>
                <option value="">--Pilih--</option>
                <?php foreach($kode as $k){ ?>
                    <option value="<?= $k->id_kode ?>">(<?= $k->kode .'). '. $k->deskripsi_kode?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Sub Kode</label>
            <select name="sub_kode" id="sub_kode" required class="form-control">
                <option value="">--Pilih--</option>
            </select>
        </div>
        <div class="form-group">
            <label>Title Kode</label>
            <select name="title_kode" id="title_kode" required class="form-control">
                <option value="">--Pilih--</option>
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalMCM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Data Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/addMCM') ?>" enctype="multipart/form-data" id="formMCM" method="post">
      <div class="modal-body">
      <input type="hidden" name="id_logistik" id="id_logistik">
        <div class="row">
            <div class="col-lg-6 <?= $acs ?>">
                <div class="form-group">
                    <label>Tanggal Input</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" required>
                </div>
            </div>
           
            <div class="col-lg-6  <?= $acs ?>">
                <div class="form-group">
                    <label>Jumlah Pengajuan</label>
                    <input type="text" name="jml_pengajuan" id="jml_pengajuan" class="form-control" required onkeyup="allowIDR()">
                    <input type="hidden" name="jml_max" id="jml_max" class="form-control" required>
                </div>
            </div>  

            <div class="col-12 <?= $acs ?>">
              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="ket" id="ket" cols="30" rows="3" class="form-control" required></textarea>
              </div>
            </div>

            

        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <tr class="bg-info text-light">
                        <td colspan="5">Data Supplier</td>
                    </tr>
                    <tr class="bg-dark text-light">
                        <th>Nama Toko</th>
                        <th>Nama</th>
                        <th>Data Rekening</th>
                        <th>Nota Pembayaran</th>
                        <th>Total Pembayaran</th>
                    </tr>
                    <tbody id="showSupp">

                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <tr class="bg-info text-light">
                        <td colspan="7">History Pembayaran</td>
                    </tr>
                   
                        <tr class="bg-dark text-light">
                            <th>#</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jumlah</th>
                            <th>Bukti Transfer</th>
                            <th>Status Pengajuan</th>
                            <th>Keterangan</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                        <tbody id="bodyHistory">

                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="5">Total Terbayarakan</th>
                            <th colspan="2" id="total_terbayar"></th>
                          </tr>
                          <tr>
                            <th colspan="5">Sisa Pembayaran</th>
                            <th colspan="2" id="sisaPembayaran"></th>
                          </tr>
                        </tfoot>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary <?= $acs ?>" id="toSavePembayaran">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addBuktiPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Bukti Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/addBuktiTransaksiMaterial'); ?>" method="post" id="formAddBuktiPengajuan">
      <div class="modal-body">
        <input type="hidden" name="id_cicil" id="id_cicil">
        <div class="form-group">
            <label>Bukti Transaksi</label>
            <input type="file" name="bukti" id="bukti" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Detail-->
<div class="modal fade" id="repeat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Ulangi Pengajuan</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/repeatPengajuan'); ?>" id="formRepeat" method="post">
      <div class="modal-body">
                                            
        <input type="hidden" name="id_repeat" id="id_repeat">
        
        <div class="form-group">
          <label>Tanggal Input</label>
          <input type="date" name="tgl_repeat" id="tgl_repeat" required class="form-control">
        </div>

        <div class="form-group">
          <label>Jumlah Pengajuan</label>
          <input type="text" name="jml_repeat" id="jml_repeat" required class="form-control" onkeyup="allowIDR()">
          <input type="hidden" name="repeat_max" id="repeat_max" required class="form-control">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalShowImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Show Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ZoomImage">
        
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="detailKode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-light">
        <h5 class="modal-title" id="exampleModalLabel">Detail Kode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body showKode">
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalfilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="exampleModalLabel">Filter Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="date" name="date_a" id="date_a" class="form-control">
          </div>

          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="date" name="date_b" id="date_b" class="form-control">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="toFilter">Go</button>
      </div>
    </div>
  </div>
</div>
