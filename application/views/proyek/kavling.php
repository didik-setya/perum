<script text="javascript">
    $('#list_kav').dataTable();
</script>

<table class="table table-bordered table-striped" id="list_kav">
    <thead>
        <tr class="text-light bg-dark">
            <th class="text-center">Cluster</th>
            <th class="text-center">Tipe</th>
            <th class="text-center">Blok</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1; 
        foreach ($kavling as $key => $as){
        ?>
            <tr>
            <td><span class="text-bold"><?= $as->nama_cluster?></span></td>
                <td>
                <span class="text-bold"><?= $as->tipe?></span><br>
                </td>
                <td>

                    <ul class="list-group">
                        <?php 
                        foreach ($tipe as $key => $oi){ 
                            if($as->id_tipe == $oi->id_tipe){
                        ?>
                        <li class="list-group-item"><?= $oi->blok ?><?= $oi->no_rumah ?>
                            <?php if($type == 1){ ?>
                                <button class="btn btn-danger btn-xs float-right hapus-kavling" data-id="<?= $oi->id ?>"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-xs btn-primary float-right mr-1 edit-kavling" data-id="<?= $oi->id ?>"><i class="fa fa-edit"></i></button>
                            <?php } else { ?>
                            <?php } ?>
                        </li>
                        <?php
                                }else{
                                    $oi->blok;
                                    $oi->no_rumah;
                                } 
                            }
                        ?>

                    </ul>
                </td>
           

            </tr>
        <?php 
        }
        ?>
    </tbody>
</table>