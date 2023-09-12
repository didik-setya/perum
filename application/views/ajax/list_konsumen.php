<?php if($type == 1){ ?>
<table class="table table-bordered mt-3" id="list_add-tf_bnk">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>No Telp</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th><i class="fa fa-cogs"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-add-transaksi-bank">
                                        <?php $i = 1; foreach($calon_konsumen as $c){ ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $c->nama_konsumen ?></td>
                                                <td><?= $c->no_hp ?></td>
                                                <td><?= $c->jk ?></td>
                                                <td>Calon Konsumen</td>
                                                <td>
                                                    <div class="<?php access(); ?>">
                                                        <button class="btn btn-xs btn-info add-btn-tf-bank" data-id="<?= $c->id_marketing ?>"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
<?php } else if($type == 2) { ?>
    <table class="table table-bordered" id="transaksi_bank">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>No Telp</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th><i class="fa fa-cogs"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach($konsumen_tf_bank as $t){ ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $t->nama_konsumen ?></td>
                                            <td><?= $t->no_hp ?></td>
                                            <td><?= $t->jk ?></td>
                                            <td>Calon Konsumen</td>
                                            <td>
                                                <div class="<?php access(); ?>">
                                                    <button type="button" class="btn btn-success btn-xs modal-inhouse" data-id="<?= $t->id_marketing ?>"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
<?php } ?>


<script>
    $('#list_add-tf_bnk').dataTable();
    $('#transaksi_bank').dataTable();
</script>