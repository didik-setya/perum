<?php if($this->session->userdata('group_id') == 1 || $this->session->userdata('group_id') == 3 || $this->session->userdata('group_id') == 13){ ?>
    <div class="row justify-content-end mb-2">
        <a href="<?= site_url('accounting/printArusKas?date_A='.$date_A.'&date_B='.$date_B.'&perum='.$id_perum.'/'); ?>" target="_blank" class="btn btn-success mr-2 "> <i class="fa fa-print"></i> Print</a>
    </div>
<?php } ?>
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