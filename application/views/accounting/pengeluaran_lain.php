<?php $user = $this->session->userdata('group_id');
  if($user == 3){
    $access = '';
  } else {
    $access = 'd-none';
  }
 ?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Pengeluaran Lain</h1>
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

                        <table class="table table-bordered" id="tablePengeluaran">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Ket</th>
                                    <th>Status</th>
                                    <th><i class="fa fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($list as $l){ ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $l->tgl_pengeluaran ?></td>
                                    <td>Rp. <?= number_format($l->jml_pengeluaran); ?></td>
                                    <td><?= $l->keterangan ?></td>
                                    <td>
                                    <?php if($l->status == 0){ ?>
                                        <span class="badge badge-danger">Di Tolak</span>
                                      <?php } else if($l->status == 1){ ?>
                                        <span class="badge badge-warning">Menunggu Persetujuan Accounting</span>
                                      <?php } else if($l->status == 2){ ?>
                                        <span class="badge badge-success">Approved</span>
                                      <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($user == 3){ ?>
                                                <?php if($l->status == 1){ ?>
                                                    <button class="btn btn-xs btn-success check" data-id="<?= $l->id_pengeluaran ?>"><i class="fas fa-check"></i></button>
                                                <?php } else if($l->status == 2){ ?>
                                                    <button class="btn btn-xs btn-primary addCicil" data-id="<?= $l->id_pengeluaran ?>"><i class="fas fa-plus"></i></button>

                                                    <button class="btn btn-xs btn-warning edit-kode" data-id="<?= $l->id_pengeluaran ?>" data-type="pengeluaran_lain"><i class="fa fa-edit"></i> Edit Kode</button>
                                                <?php } ?>
                                                <button class="btn btn-xs btn-secondary view-kode" data-kode="<?= $l->title_kode ?>"><i class="fa fa-search"></i> Lihat Kode</button>
                                        <?php } else { ?>
                                          <?php if($l->status == 2){ ?>
                                                    <button class="btn btn-xs btn-primary addCicil" data-id="<?= $l->id_pengeluaran ?>"><i class="fas fa-plus"></i></button>
                                                <?php } ?>
                                                <button class="btn btn-xs btn-secondary view-kode" data-kode="<?= $l->title_kode ?>"><i class="fa fa-search"></i> Lihat Kode</button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kode</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/add_kode_pengeluaran_lain'); ?>" method="post" id="formKode">
      <div class="modal-body">
        
        <input type="hidden" name="id_pengeluaran" id="id_pengeluaran">

        <input type="hidden" name="id" id="id_edit">
        <input type="hidden" name="type" id="type_edit">
        
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
<div class="modal fade" id="modalCicil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/addCicilPengeluaran'); ?>" id="formCicilFee" method="post">
      <div class="modal-body">
        <input type="hidden" name="id_add" id="id_add">
        <div class="row">
            <div class="col-lg-6 <?= $access ?>">
                <div class="form-group">
                    <label>Tanggal Input</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-6 <?= $access ?>">
                <div class="form-group">
                    <label>Jumlah Pengajuan</label>
                    <input type="text" name="jml" id="jml" class="form-control" required>
                    <input type="hidden" name="max_jml" id="max_jml">
                </div>
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-info text-light">
                            <th colspan="5">History Pengajuan</th>
                        </tr>
                        <tr class="bg-dark text-light">
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody id="showHistoryFeeMarketing">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total Terbayar</th>
                            <td id="showTerbayar" colspan="2"></td>
                        </tr>
                        <tr>
                            <th colspan="3">Sisa Pembayaran</th>
                            <td id="showSisa" colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="toSave" class="btn btn-primary <?= $access ?>">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/editCicilPengeluaran'); ?>" id="formEditCicilFee" method="post">
      <div class="modal-body">
        <input type="hidden" name="id_edit" id="id_edit">
        <div class="form-group">
            <label>Tanggal Input</label>
            <input type="date" name="date" required id="date" required class="form-control">
        </div>
        <div class="form-group">
            <label>Jumlah Pengajuan</label>
            <input type="text" name="jml_edit" required id="jml_edit" class="form-control">
            <input type="hidden" name="max_edit" id="max_edit">
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


<div class="modal fade" id="modalBukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Bukti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/addBuktiCicilPengeluaran'); ?>" id="formBukti" method="post">
      <div class="modal-body">
        <input type="hidden" name="id_bukti" id="id_bukti">
        <div class="form-group">
            <label>Bukti</label>
            <input type="file" name="bukti" required id="bukti" class="form-control">
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