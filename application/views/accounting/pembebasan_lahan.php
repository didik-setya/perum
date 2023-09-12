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
            <h1>Pembebasan Lahan</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card table-responsive">
                    <div class="card-body">

                    <table class="table table-bordered" id="idTable">
                        <thead>
                            <tr class="bg-dark text-light">
                                <th>#</th>
                                <th>Nama Penjual</th>
                                <th>Perumahan</th>
                                <th>No Surat</th>
                                <th>Jenis Surat</th>
                                <th>Tgl Pengalihan</th>
                                <th>Total Pembelian</th>
                                <th>Status</th>
                                <th><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($list_data as $p){ ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $p->nama_penjual ?></td>
                                    <td><?= $p->nama_perumahan ?></td>
                                    <td><?= $p->no_surat ?></td>
                                    <td><?= $p->jenis_surat ?></td>
                                    <td><?= $p->tgl_pengalihan ?></td>
                                    <td>Rp. <?= number_format($p->total_pembelian) ?></td>
                                    <td>
                                      <?php if($p->status == 1){ ?>
                                        <span class="badge badge-secondary">Menunggu Accounting</span>
                                      <?php } else if($p->status == 2){ ?>
                                        <span class="badge badge-success">Approved</span>
                                      <?php } else if($p->status == 0){ ?>
                                        <span class="badge badge-danger">Di tolak</span>
                                      <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($p->status == 1){ ?>
                                          <button class="btn btn-xs btn-success check <?= $acs ?>" data-id="<?= $p->id_pembebasan ?>"><i class="fa fa-check"></i></button>
                                          <button class="btn btn-xs btn-danger tolak <?= $acs ?>" data-id="<?= $p->id_pembebasan ?>"><i class="fa fa-times"></i></button>
                                          <button class="btn btn-xs btn-secondary view-kode" data-kode="<?= $p->title_kode ?>"><i class="fa fa-search"></i> Lihat Kode</button>
                                        <?php } else if($p->status == 2){ ?>
                                          
                                          <button class="btn btn-xs btn-primary addCicil" data-id="<?= $p->id_pembebasan ?>"><i class="fa fa-plus"></i></button>

                                          <button  class="btn btn-xs btn-warning edit-kode <?= $acs ?>" data-id="<?= $p->id_pembebasan ?>" data-type="pembebasan_lahan"><i class="fa fa-edit"></i> Edit Kode</button>

                                          <button class="btn btn-xs btn-secondary view-kode" data-kode="<?= $p->title_kode ?>"><i class="fa fa-search"></i> Lihat Kode</button>

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
<div class="modal fade" id="modalKode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= site_url('accounting/check_pembebasan_lahan'); ?>" method="post" id="formKode">
      <div class="modal-body">
        <input type="hidden" name="id_cicil" id="id_cicil">

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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pembebasan Lahan</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body showDetails">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
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
      <form action="<?= site_url('accounting/addCicilPembebasan'); ?>" id="formCicilFee" method="post">
      <div class="modal-body">
        <input type="hidden" name="id_data" id="id_data">
        <div class="row">
            <div class="col-lg-6 <?= $acs ?>">
                <div class="form-group">
                    <label>Tanggal Input</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-6 <?= $acs ?>">
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
                    <tbody id="showHistory">

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
        <button type="submit" id="toSave" class="btn btn-primary <?= $acs ?>">Save</button>
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
      <form action="<?= site_url('accounting/editCicilPembebasan'); ?>" id="formEditCicilFee" method="post">
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
      <form action="<?= site_url('accounting/addBuktiCicilPembebasan'); ?>" id="formBukti" method="post">
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