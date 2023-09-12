<?php
  $upah_id = $this->uri->segment(3);
  $kavling_id = $this->uri->segment(4);
  $total_persentase = $this->db->select('SUM(progres) AS persentase')->from('progres_pembangunan')->where(['upah_id' => $upah_id, 'kavling_id' => $kavling_id, 'status !=' => 1])->get()->row()->persentase;

  $sisa_persentase = 100 - $total_persentase;

  if($sisa_persentase == 0 || $sisa_persentase < 0){
    $to_add = 'disabled';
  } else {
    $to_add = '';
  }

?>
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h5>Detail Progres Pembangunan</h5>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            <div class="card">
                <div class="card-header bg-dark">
                    <a href="<?= site_url('proyek/progres'); ?>" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <button class="btn btn-sm btn-success mb-3 <?php access(); ?>" <?= $to_add ?> id="add-data" data-toggle="modal" data-target="#exampleModal" data-id="<?=  $this->uri->segment(3); ?>" data-blok="<?= $this->uri->segment(4); ?>"><i class="fa fa-plus"></i> Tambah</button>

                    



                    <table class="table table-bordered mt-3" id="tableDetailProgres">
                        <thead>
                            <tr class="bg-dark text-light">
                               
                                <th>Tanggal</th>
                                <th>Persentase</th>
                                <th>Jumlah</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Status Trasfer Dana</th>
                                <th>Mandor</th>
                                <th><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            if(empty($detail)){
                              $sisa = 0;
                              $terbayar = 0;
                              $harga_kontrak = 0;
                            } else {

                            

                            $terbayar = 0;
                            foreach($detail as $d){ 
                                if($d->status == 3){
                                  $terbayar += $d->total;
                                }
                            $mandor_proyek = $this->db->get_where('master_mandor',['id_mandor' => $d->mandor_id])->row();
                            $sisa = $d->harga_kontrak - $terbayar;
                            $harga_kontrak = $d->harga_kontrak;
                            $id_progres = $d->id_progres;
                            $cicil = $this->db->get_where('cicil_progres',['id_progres' => $id_progres])->result();
                            
                            if($mandor_proyek){
                              $show_mandor = $mandor_proyek->nama_mandor;
                            } else {
                              $show_mandor = '<p class="text-danger">Tidak ada mandor</p>';
                            }

                            ?>
                            <tr>
                               
                                <td><?php $date = date_create($d->tanggal); echo date_format($date, 'd F Y') ?></td>
                                <td><?= $d->progres ?>%</td>
                                <td>Rp. <?= number_format($d->total) ?></td>
                                <td>
                                    <img src="<?= base_url('assets/upload/progres/') . $d->foto; ?>" alt="img" width="100px" class="img-progres" data-img="<?= $d->foto ?>" style="cursor: pointer;">
                                </td>
                                <td class="text-center">
                                        <?php if($d->status == 1){ ?>
                                            <span class="badge badge-danger">Ditolak Accounting</span>
                                        <?php } else if($d->status == 2){ ?>
                                            <span class="badge badge-warning">Menunggu Persetujuan Accounting</span>
                                        <?php } else if($d->status == 3){ ?>
                                            <span class="badge badge-success">Approved</span>
                                        
                                        <?php } ?>
                                </td>
                                <td>
                                  <?php if(isset($cicil)){
                                    $tercicil = 0;
                                    foreach($cicil  as $c){
                                      if($c->status == 2){
                                        $tercicil += $c->jumlah;
                                      }
                                    }
                                    $sisa_cicil = $d->total - $tercicil;
                                    if($sisa_cicil == 0){
                                      $lunas = 'lunas';
                                    } else {
                                      $lunas = 'Belum Lunas';
                                    }
                                    ?>

<span class="badge badge-secondary"><?= $lunas ?></span> <br>
<small class="text-success">(Terbayar : Rp. <?= number_format($tercicil) ?>)</small> <br>
<small class="text-danger">(Sisa : Rp. <?= number_format($sisa_cicil) ?>)</small>


                                  <?php } else { ?>
                                  <?php } ?>
                                </td>
                                <td><?= $show_mandor ?></td>
                                <td>
                                        <?php if($d->status == 1){ ?>
                                          <a href="<?= site_url('proyek/del_progres/') . $d->id_progres; ?>" class="btn btn-sm btn-danger btn-delete <?php access(); ?>"><i class="fa fa-trash"></i></a>
                                          <!-- <button class="btn btn-sm btn-primary btn-edit <?php access(); ?>" data-id="<?= $d->id_progres ?>"><i class="fa fa-edit"></i></button> -->
                                        <?php } ?>
                                </td>
                            </tr>
                            <?php } }?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-dark text-light">
                                <th colspan="6">Harga Kontrak</th>
                                <th colspan="2">Rp. <?= number_format($harga_kontrak) ?></th>
                            </tr>
                            <tr class="bg-dark text-light">
                                <th colspan="6">Total Di Setujui</th>
                                <th colspan="2">Rp. <?= number_format($terbayar) ?></th>
                            </tr>
                            <tr class="bg-dark text-light">
                                <th colspan="6">Total Persentase</th>
                                <th colspan="2"><?=$total_persentase?>%</th>
                            </tr>
                           
                            <tr class="bg-dark text-light">
                                <th colspan="6">Sisa</th>
                                <th colspan="2">Rp. <?= number_format($sisa) ?></th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

</div>
</div>
</div>
</section>




<!-- Modal detail -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" id="formPersentase">
      <div class="modal-body">
        
        <input type="hidden" name="id_upah" id="id_upah">
        <input type="hidden" name="id_blok" id="id_blok">
        <input type="hidden" name="id_progres" id="id_progres">

          <div class="form-group">
              <label>Pilih Mandor</label>
              <select name="select_mandor" id="select_mandor" class="form-control" required="required">
                <option value="">--Pilih--</option>
                <?php foreach($mandor as $m){ ?>
                  <option value="<?= $m->id_mandor ?>"><?= $m->nama_mandor ?></option>
                <?php } ?>
              </select>
            </div>

        <div class="form-group">
            <label>Persentase (%)</label>
            <input type="number" name="persentase" id="persentase" class="form-control">
            <small class="text-danger" id="persent_err"></small>
            <small class="text-danger" id="persent_err2"></small>
        </div>

        <div class="form-group">
            <label>Jumlah (Rp)</label>
            <input type="text" name="v_jumlah" id="v_jumlah" class="form-control" onkeyup="allowIDR()">
            <input type="text" hidden name="jumlah" id="jumlah" class="form-control">
            <small class="text-danger" id="jml_err"></small>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            <small class="text-danger" id="img_err"></small>
        </div>


        <div class="foto-progres-edit d-none">
            <img src="" alt="progres-pembangunan" id="bukti-progres" width="100%">
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
<div class="modal fade" id="modelImageProgres" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title-1" id="exampleModalLabel">Foto Progres</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <img src="" id="foto-progres" alt="foto-progres" width="100%">

      </div>
     
    </div>
  </div>
</div>

  

