<?php
$this->db->select('
    master_material.nama_material,
    master_produk_kategori.kategori_produk,
    master_produk_unit.nama_satuan,
    tbl_proyek_material.harga,
    list_pengajuan_material.jumlah,
    list_pengajuan_material.id_list,
    list_pengajuan_material.type
')
->from('list_pengajuan_material')
->join('master_material', 'list_pengajuan_material.id_material = master_material.id')
->join('master_produk_kategori', 'master_material.kategori_id = master_produk_kategori.id')
->join('master_produk_unit', 'master_material.unit_id = master_produk_unit.id')
->join('tbl_proyek_material', 'list_pengajuan_material.rab_material = tbl_proyek_material.id')
->where('list_pengajuan_material.id_proyek', $proyek)
->where('list_pengajuan_material.id_tipe', $tipe);
$data = $this->db->get()->result();


 $i=1; foreach($data as $item){ 
    // $proyek_id = $item['options']['proyek_id'];
    // $list = $this->logistik->get_material_with_cart($item['id']);   
    // $harga = $this->db->where('id', $proyek_id)->get('tbl_proyek_material')->row()->harga; 
    // $proyek = $this->db->get_where('master_proyek',['id' => $proyek_id])->row();

    // $rab_material = $this->db->get_where('tbl_proyek_material',['id' => $proyek_id])->row();
    // $proyek = $this->db->get_where('master_proyek',['id' => $rab_material->proyek_id])->row();

    // if($item['options']['type'] == 1){
    //     //material ambil dari RAB

    //     $row_harga = 'Rp. '.number_format($harga * $item['qty']).' <br>
    //                     <small class="text-primary">Rp. '. number_format($harga) .'</small>';
    //     $source = 'RAB';

    // } else if($item['options']['type'] == 2){
    //     //material ambil dari stok logistik/gudang
    //     $row_harga = '-';
    //     $source = 'Stok Gudang';
        
    // }


?>
<tr>
    <td><?= $i++; ?></td>
    <td><b><?= $item->nama_material ?></b> <br>
        <small class="text-danger"><?= $item->kategori_produk ?></small>
    </td>
    <td class="text-center"><?= $item->jumlah .' '. $item->nama_satuan ?></td>

    <td class="text-center">
        <b>Rp. <?= number_format($item->harga * $item->jumlah) ?></b> <br>
        <small class="text-danger">(Rp. <?= number_format($item->harga) ?> / item)</small>
    </td>



    <!-- <td  class="text-center"><b><?= $source ?></b> <br> <small class="text-success">Proyek <?= $proyek->nama_proyek ?></small></td> -->
        <?php if($item->type == 1){ ?>
            <td>RAB</td>
        <?php } else if($item->type == 2){ ?>
            <td>Stok Material Gudang</td>
        <?php } ?>
    <td>
        <button class="btn btn-sm btn-danger trashItem" data-id="<?= $item->id_list ?>" type="button"><i class="fa fa-times"></i></button>
    </td>
</tr>
<?php } ?>