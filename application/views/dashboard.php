<?php $role = $this->session->userdata('group_id');
    $group = $this->session->userdata('group_id');
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard <?= $perumahan['nama_perumahan'] ?></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?php if($role == 1){ ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h3 class="card-title">Konfirmasi Super Admin</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body ConfirmTransaksi" style="display: block;">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<!-- <div class="ConfirmTransaksi">
    
</div> -->



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        


            <?php
                $date = date_create(date('Y-m-d'));
                $tanggal = date_format($date, 'd F Y');
                $tanggal2 = date_format($date, 'F Y');
                $month = date('m');
                $year = date('Y');
                // $keuangan1 = $this->master_model->get_laporan_keuangan1();
                $kode = $this->db->where('id_kode !=', 11)->get('kode')->result();
                $id_perumahan = $this->session->userdata('id_perumahan');
                $proyek = $this->master_model->get_proyek_dashboard();
                // var_dump($proyek);
            ?>

           <?php if($role == 3 || $role == 1 || $role == 2 || $role == 13){ ?>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5><b>Laporan Keuangan</b></h5>
                        <h6>Tahun Berjalan : <?= date('Y'); ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <?php foreach($kode as $k){ 
                                $q = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                                     title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                                     sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN
                                     kode ON sub_kode.id_kode = kode.id_kode
                                     WHERE approved_history.id_perumahan = $id_perumahan AND
                                    kode.id_kode = $k->id_kode AND year(approved_history.tanggal) = '$year' 
                                 ";
                                $jml = $this->db->query($q)->row();
                            ?>
                                <div class="col-6">
                                    <h5 class="text-dark"><b><?= $k->deskripsi_kode ?></b></h5>
                                    <p>Rp. <?= number_format($jml->total) ?></p>
                                </div>
                            <?php } ?>
                            

                            <?php 
                            $data_tahunan = $this->master->get_laporan_tahunan_dashboard();
                            
                            ?>
                            <div class="col-6">
                                <h5 class="text-dark"><b>Sisa Pemasukan</b></h5>
                                <p>Rp. <?= number_format($data_tahunan['sisa_pemasukan']) ?></p>
                            </div>

                            <div class="col-6">
                                <h5 class="text-dark"><b>Sisa Pengeluaran</b></h5>
                                <p>Rp. <?= number_format($data_tahunan['sisa_pengeluaran']) ?></p>
                            </div>

                            <div class="col-6">
                                <h5 class="text-dark"><b>Saldo</b></h5>
                                <p>Rp. <?= number_format($data_tahunan['saldo']) ?></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5><b>Laporan Keuangan</b></h5>
                        <h6>Per <?= $tanggal2 ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                                <?php
                                $pemasukan_total = 0;
                                $pengeluaran_total = 0;
                                foreach($kode as $k){ 
                                    $q = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                                        title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                                        sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN 
                                        kode ON sub_kode.id_kode = kode.id_kode
                                        WHERE approved_history.id_perumahan = $id_perumahan AND
                                        kode.id_kode = $k->id_kode AND
                                        month(approved_history.tanggal) = '$month' AND 
                                        year(approved_history.tanggal) = '$year'                                
                                        ";

                                    $q_pemasukan = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                                        title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                                        sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN 
                                        kode ON sub_kode.id_kode = kode.id_kode
                                        WHERE approved_history.id_perumahan = $id_perumahan AND
                                        kode.id_kode = $k->id_kode AND
                                        month(approved_history.tanggal) = '$month' AND 
                                        year(approved_history.tanggal) = '$year' AND kode.kode = 1                             
                                        ";

                                    $q_pengeluaran = "SELECT SUM(jumlah) as total FROM approved_history JOIN 
                                        title_kode ON approved_history.id_title_kode = title_kode.id_title JOIN
                                        sub_kode ON title_kode.id_sub = sub_kode.id_sub JOIN 
                                        kode ON sub_kode.id_kode = kode.id_kode
                                        WHERE approved_history.id_perumahan = $id_perumahan AND
                                        kode.id_kode = $k->id_kode AND
                                        month(approved_history.tanggal) = '$month' AND 
                                        year(approved_history.tanggal) = '$year' AND kode.kode = 2                       
                                        ";

                                    $pemasukan_total += $this->db->query($q_pemasukan)->row()->total;
                                    $pengeluaran_total += $this->db->query($q_pengeluaran)->row()->total;
                                    $tot = $this->db->query($q)->row();
                                ?>
                                <div class="col-6">
                                    <h5 class="text-dark"><b><?= $k->deskripsi_kode ?></b></h5>
                                    <p>Rp. <?= number_format($tot->total) ?></p>
                                </div>
                            <?php } ?>

                            <?php 
                                $data_bulanan = $this->master->get_laporan_bulanan_dashboard();
                               
                            ?>

                            <div class="col-6">
                                <h5 class="text-dark"><b>Sisa Pemasukan</b></h5>
                                <p>Rp. <?= number_format($data_bulanan['sisa_pemasukan']) ?></p>
                            </div>

                            <div class="col-6">
                                <h5 class="text-dark"><b>Sisa Pengeluaran</b></h5>
                                <p>Rp. <?= number_format($data_bulanan['sisa_pengeluaran']) ?></p>
                            </div>

                            <div class="col-6">
                                <h5 class="text-dark"><b>Saldo</b></h5>
                                <p>Rp. <?= number_format($pemasukan_total - $pengeluaran_total) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
           

            <?php if($role == 4 || $role == 1 || $role == 2 || $role == 14){
            
                $id_perum = $this->session->userdata('id_perumahan');
                $jml_kav = $this->db->get_where('tbl_kavling', ['id_perum' => $id_perum])->num_rows(); 
                
                $year = date('Y');
                $month = date('m');

                $jml_konsumen_tahun = $this->master->get_jml_all_konsumen($year);
                $jml_konsumen_bulan = $this->master->get_jml_all_konsumen($year, $month);

                $kav_0 = $this->master->get_jml_kvl_stat('0')->num_rows();
                $kav_1 = $this->master->get_jml_kvl_stat('1')->num_rows();
                $kav_2 = $this->master->get_jml_kvl_stat('2')->num_rows();
            ?>
            <div class="col-lg-4">
                <div class="card bg-danger text-light">
                    <div class="card-body text-center">
                        <h5><i class="fas fa-users"></i> Jumlah Konsumen</h5>
                        <p>Tahun  <?= date('Y') ?></p>
                        <small>Jumlah Total Konsumen: <?= $jml_konsumen_tahun ?></small>

                        <ul class="list-group">
                            <li class="list-group-item text-dark text-center"><b>BI Checking</b></li>
                            <?php foreach($status as $s){ 
                                $tahun =  date('Y');
                                $bulan =  date('m');    
                                

                                $jml_tahun =  $this->master->get_data_jml_konsumen($s['id'], $tahun, null, $id_perum)->num_rows();
                            ?>
                            <li class="list-group-item text-dark d-flex justify-content-between align-items-center">
                                <?= $s['nama'] ?>
                                <span class="badge badge-success badge-pill"><?= $jml_tahun ?></span>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-success text-light">
                    <div class="card-body text-center">
                        <h5><i class="fas fa-users"></i> Jumlah Konsumen</h5>
                        
                        <p>Bulan <?= date('F Y') ?></p>
                        <small>Jumlah Total Konsumen: <?= $jml_konsumen_bulan ?></small>

                        <ul class="list-group">
                            <li class="list-group-item text-dark text-center"><b>BI Checking</b></li>
                            <?php foreach($status as $st){ 
                                $tahun =  date('Y');
                                $bulan =  date('m');    

                                $jml_bulan =  $this->master->get_data_jml_konsumen($st['id'], $tahun, $bulan, $id_perum)->num_rows();
                            ?>
                            <li class="list-group-item text-dark d-flex justify-content-between align-items-center">
                                <?= $st['nama'] ?>
                                <span class="badge badge-success badge-pill"><?= $jml_bulan ?></span>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-secondary text-light">
                    <div class="card-body text-center">
                        <h5><i class="fas fa-user-check"></i> Konsumen Realisasi</h5>

                        <?php
                            $tahun = date('Y');
                            $bulan = date('m');
                            $type = 'realisasi';

                            $realisasi_tahun = $this->master->get_jml_konsumen_dashboard($tahun, null, $type)->num_rows();
                            $realisasi_bulan = $this->master->get_jml_konsumen_dashboard($tahun, $bulan, $type)->num_rows();
                        ?>
                        <ul class="list-group list-group-flushlist-group-flushs">
                            <li class="list-group-item text-dark d-flex justify-content-between align-items-center">
                                Realisasi Tahun Berjalan
                                <span class="badge badge-danger badge-pill"><?= $realisasi_tahun ?></span>
                            </li>
                            <li class="list-group-item text-dark d-flex justify-content-between align-items-center">
                                Realisasi Bulan Berjalan
                                <span class="badge badge-danger badge-pill"><?= $realisasi_bulan ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-primary text-light">
                    <div class="card-body text-center">
                        <h5><i class="fas fa-home"></i> Jumlah Kavling</h5>
                        <p><?= $jml_kav ?> Kavling</p>
                        <div class="row">
                            <div class="col-4">
                                <p>Unit Tersedia</p>
                                <h4><?= $kav_0 ?></h4>
                            </div>
                            <div class="col-4">
                                <p>Unit Booking</p>
                                <h4><?= $kav_1 ?></h4>
                            </div>
                            <div class="col-4">
                                <p>Unit Lunas</p>
                                <h4><?= $kav_2 ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-dark text-light">
                    <div class="card-body ">
                        <h5 class="text-center"><i class="fas fa-home"></i> Penjualan Marketing</h5>
                        
                            
                            <ul class="list-group list-group-flush">
                                <?php foreach($marketing as $m){ 
                                    $tahun = date('Y');
                                    $bulan = date('m');
                                    $month = date('F');    

                                    $show_tahun = $this->master->get_data_konsumen_by_marketing($m->id, $tahun)->num_rows();
                                    $show_bulan = $this->master->get_data_konsumen_by_marketing($m->id, $tahun, $bulan)->num_rows();

                                ?>
                                <li class="list-group-item text-dark">
                                    <b><?= $m->nama; ?></b> <br>
                                    <small>- Penjualan Tahun <?= $tahun ?>: <?= $show_tahun ?></small> <br>
                                    <small>- Penjualan Bulan <?= $month ?>: <?= $show_bulan ?></small>
                                </li>
                                <?php } ?>
                            </ul>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-info text-light">
                    <div class="card-body text-center">
                        <h5><i class="fas fa-home"></i> Media Promosi</h5>
                        <ul class="list-group">
                            <?php foreach($info as $i){ 
                                    $id_perum = $this->session->userdata('id_perumahan');
                                $bank = $this->db->select('*')->from('tbl_marketing')->join('tbl_transaksi_bank','tbl_marketing.id_marketing = tbl_transaksi_bank.id_konsumen')->join('tbl_kavling','tbl_transaksi_bank.id_rumah = tbl_kavling.id_kavling')->where('tbl_kavling.id_perum', $id_perum)->where('tbl_marketing.status !=', 0)->where('tbl_marketing.dapat_info', $i)->get()->num_rows();

                                $inhouse = $this->db->select('*')->from('tbl_marketing')->join('tbl_transaksi_inhouse','tbl_marketing.id_marketing = tbl_transaksi_inhouse.id_konsumen')->join('tbl_kavling','tbl_transaksi_inhouse.id_rumah = tbl_kavling.id_kavling')->where('tbl_kavling.id_perum', $id_perum)->where('tbl_marketing.status !=', 0)->where('tbl_marketing.dapat_info', $i)->get()->num_rows();

                                $total = $bank + $inhouse;    
                            ?>
                            <li class="list-group-item d-flex text-dark justify-content-between align-items-center">
                                <?= $i ?>
                                <span class="badge badge-primary badge-pill"><?= $total ?></span>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>


            <?php $material = $this->logistik->get_rekap_material(null, null, null)->result(); ?>
            <?php if($role == 5 || $role == 1 || $role == 12){ ?>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                        <b style="font-size: 20px">Stok Material</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-info text-light">
                                    <th>Nama Material</th>
                                    <th class="text-right">Sisa Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $id_perum = $this->session->userdata('id_perumahan');
                                foreach($material as $m){ 
                                    
                                    // $q_stok = "SELECT SUM(stok) AS stock FROM logistik_stok JOIN master_logistik ON logistik_stok.logistik_id = master_logistik.id WHERE master_logistik.material_id = $m->material_id";

                                    $q_masuk = "SELECT SUM(material_masuk) AS masuk FROM master_logistik_masuk JOIN master_logistik ON master_logistik_masuk.logistik_id = master_logistik.id JOIN pengajuan_material ON master_logistik.time = pengajuan_material.time WHERE master_logistik.material_id = $m->material_id AND master_logistik.tipe = 1 AND pengajuan_material.id_perumahan = $id_perum ";

                                    $q_keluar = "SELECT SUM(jml_keluar) AS keluar FROM material_keluar JOIN master_logistik ON material_keluar.id_logistik = master_logistik.id JOIN pengajuan_material ON master_logistik.time = pengajuan_material.time WHERE master_logistik.material_id = $m->material_id AND pengajuan_material.id_perumahan = $id_perum";

                                    // $stok = $this->db->query($q_stok)->row()->stock;

                                    $masuk = $this->db->query($q_masuk)->row()->masuk;
                                    $keluar = $this->db->query($q_keluar)->row()->keluar;
                                        
                                    $stok = $masuk - $keluar;
                                    
                                ?>
                                <tr>
                                    <td><b><?= $m->nama_material ?></b><br> <small class="text-danger"><?= $m->kategori_produk ?></small></td>
                                    <td class="text-right">
                                        <?php if($stok == 0){ ?>
                                            <span class="badge badge-danger">Kosong</span>
                                        <?php } else { ?>
                                            <span class="badge badge-primary"><?= $stok .' '. $m->nama_satuan ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($group == 1 || $group == 6 || $group == 12){ ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <b style="font-size: 20px">Progres Proyek</b>
                    </div>
                    <div class="card-body">

                <?php if($proyek){ ?>
                        <?php foreach($proyek as $pr){
                            $id_proyek = $pr->id_proyek;
                            $kavling_proyek = $this->master_model->get_kavling_progres_proyek_dashboard($pr->id_proyek);   
                            $rata_rata_proyek = $this->proyek->get_rata_proyek($id_proyek); 
                        ?>
                        <table class="table table-bordered mb-3">
                            <tr class="bg-dark">
                                <th colspan="2"><?= $pr->nama_proyek ?></th>
                                <th>Rata-rata progres: <?= round($rata_rata_proyek, 1) ?>%</th>
                            </tr>
                            <tr class="bg-info">
                                <th>#</th>
                                <th>Kavling</th>
                                <th>Progres</th>
                            </tr>
                            <?php $i=1; foreach($kavling_proyek as $kp){ 
                                $id_tipe = $kp->id_tipe;
                                $id_kavling = $kp->id_kavling;

                                $jml_pengajuan = $this->proyek->get_all_jml_pembayaran_upah($id_proyek, $id_tipe)->num_rows();
                                $total_progres = $this->proyek->get_all_progres($id_proyek, $id_tipe, $id_kavling);
                                $pekerjaan = $this->proyek->get_all_jml_pembayaran_upah($id_proyek, $id_tipe)->result();
                                

                                if($jml_pengajuan != null){
                                    $pengajuan = $jml_pengajuan;
                                } else {
                                    $pengajuan = '';
                                }

                                if($total_progres != null){
                                    $progres = $total_progres->pro;

                                } else {
                                    $progres = '';
                                }

                                if($progres == 0 || $progres == ''){
                                    $rata = 0;
                                } else {
                                    $rata = $progres / $pengajuan;

                                }

                            ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $kp->blok . $kp->no_rumah ?></td>
                                <td>
                                    <!-- <?= $progres .'='. $pengajuan ?> -->
                                    
                                    <span class="small text-bold">Progress : <?= round($rata, 1) ?>%</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: <?= round($rata, 1) ?>%">
                                        </div>
                                    </div>

                                    <ul class="list-group mt-3">
                                        <?php foreach($pekerjaan as $pe){ 
                                            $jumlah_persentase = $this->db->select('SUM(progres) AS pro')->from('progres_pembangunan')->where([
                                                'progres_pembangunan.upah_id' => $pe->id,
                                                'progres_pembangunan.kavling_id' => $id_kavling,
                                                'progres_pembangunan.status' => 3
                                            ])->get()->row();

                                            if($jumlah_persentase->pro == ''){
                                                $jml_per_kav = 0;
                                            } else {
                                                $jml_per_kav = $jumlah_persentase->pro;
                                            }

                                        ?>
                                        <li class="list-group-item">
                                            <Small><b><?= $pe->ket ?></b></Small>
                                            <div class="float-right">
                                                <span class="badge badge-pill badge-success"><?= $jml_per_kav ?>%</span>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>

                                    
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                        <?php } ?>

                <?php } else { ?>
                    <p class="text-center">No data result</p>
                <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
          
        </div>
    </div>
</section>
<!-- /.content -->

<div class="confirm-msg"  value="" data-group="<?= $this->session->userdata('group_id'); ?>"></div>


   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
        <div class="listDetail">
            <div class="text-center">

            <div class="spinner-border text-danger" role="status">
                <span class="sr-only">Loading...</span>
            </div>

            </div>
        </div>

      </div>
    </div>
  </div>
</div>