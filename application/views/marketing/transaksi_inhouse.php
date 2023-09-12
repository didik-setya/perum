<?php $user = $this->session->userdata('group_id'); 
$id_perum = $this->session->userdata('id_perumahan');
?>
<style>
    svg a {
            fill: none;
            stroke: black;
            stroke-width: 10px;
            stroke-linejoin: round;
    }

    svg a:not(.container-siteplan):hover {
        fill: black;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Management Transaksi Inhouse</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tambah Transaksi Inhouse</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">List Transaksi Inhouse</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <br>
                                <div id="load_calon_konsumen"></div>
                                
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <br>
                                    
                                    <div class="row mb-3">
                                        <?php if($this->session->userdata('group_id') == 1){ ?>
                                            
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 ms-auto">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 ms-auto">
                                                <label>Filter Marketing</label>
                                                <select name="filter_marketing" id="filter" class="form-control">
                                                    <option value="">--Semua--</option>
                                                    <?php foreach($marketing as $m){ ?>
                                
                                                        <?php if(isset($_GET['filter'])){ 
                                                            if($_GET['filter'] == $m->id){    
                                                        ?>
                                                                <option value="<?= $m->id ?>" selected><?= $m->nama ?></option>
                                                            <?php } else { ?>
                                                                <option value="<?= $m->id ?>"><?= $m->nama ?></option>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <option value="<?= $m->id ?>"><?= $m->nama ?></option>
                                                        <?php } ?>
                                                        
                                
                                                    <?php } ?>
                                                        
                                                </select>
                                            </div>
                                        <?php } ?>
                                    </div>
                                
                                <table class="table table-bordered" id="list-inhouse">
                                    <thead>
                                        <tr class="text-light bg-dark">
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>No Telp</th>
                                            <th>Jenis Kelamin</th>
                                            
                                            <th>
                                                <i class="fa fa-cogs"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach($konsumen_inhouse as $k){ ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $k->nama_konsumen ?></td>
                                            <td><?= $k->no_hp ?></td>
                                            <td><?= $k->jk ?></td>
                                            <td>
                                                <!-- <div class="<?php access(); ?>"> -->
                                                <button class="btn btn-secondary btn-xs viewdetailinhouse" data-toggle="modal" data-target="#viewTransaksiInhouse" data-konsumen="<?= $k->id_marketing ?>"><i class="fas fa-search"></i></button>
                                                

                                                <?php  
                                                if($user == 1){ ?>
                                                <button class="btn btn-warning btn-xs btn-edit-konsumen <?php access(); ?>" data-toggle="modal" data-target="#modal-edit" data-konsumen="<?= $k->id_marketing ?>"><i class="fa fa-edit"></i></button>
                                                <?php } ?>
                                                <!-- </div> -->
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
        </div>
    </div>
</section>

<?php if($id_perum != 3) { ?>
<div class="modal fade" id="sitemapModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Pilih Sitemap</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row p-1 justify-content-center">
            <?php $booking = 0; $lunas = 0; $realisasi = 0;?>
            <?php foreach($kavling as $k){ ?>
                <?php if($k->status_kavling == 0){ ?>
                    <?php $booking++ ?>
                <?php } else if($k->status_kavling == 1){ ?>
                    <?php $lunas++ ?>
                <?php } else if($k->status_kavling == 2){ ?>
                    <?php $realisasi++ ?>
                <?php } ?>
            <?php } ?>
            <div class="col-3 rounded m-1 p-1 text-center text-dark" style="background-color: #f6e05e"><?= $lunas ?> Unit Booking</div> 
            <div class="col-3 rounded m-1 p-1 text-light text-center" style="background-color: #718096"><?= $booking ?> Unit Available</div>
            <div class="col-3 rounded m-1 p-1 text-light text-center" style="background-color: #db2528"><?= $realisasi ?> Unit Lunas</div>
        </div>
        <div class="container">
                <svg color="white" style="background-color:white" id="svg1" version="1.1" viewBox="0 0 1877 2000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <a xlink:href=""   id="sitemap-1" data-id="sitemap-1" class="sitemap" >
                <polygon points="218 2939 57 3635 86 3447 121 3309 108 3305 174 2950"/>
                </a>
                <a xlink:href=""   id="sitemap-2" data-id="sitemap-2" class="sitemap">
                <polygon points="189 3537 171 3618 304 3647 319 3587 323 3566"/>
                </a>
                <a xlink:href=""   id="sitemap-3" data-id="sitemap-3" class="sitemap">
                <polygon points="208 3456 189 3537 323 3566 332 3525 341 3485"/>
                </a>
                <a xlink:href=""   id="sitemap-4" data-id="sitemap-4" class="sitemap">
                <polygon points="228 3372 208 3456 341 3485 347 3464 361 3403"/>
                </a>
                <a xlink:href=""   id="sitemap-5" data-id="sitemap-5" class="sitemap">
                <polygon points="245 3291 228 3372 361 3403 375 3340 379 3321"/>
                </a>
                <a xlink:href=""   id="sitemap-6" data-id="sitemap-6" class="sitemap">
                <polygon points="264 3209 245 3291 379 3321 389 3279 398 3241"/>
                </a>
                <a xlink:href=""   id="sitemap-7" data-id="sitemap-7" class="sitemap">
                <polygon points="284 3127 264 3209 398 3241 403 3219 417 3157"/>
                </a>
                <a xlink:href=""   id="sitemap-8" data-id="sitemap-8" class="sitemap">
                <polygon points="303 3045 284 3127 417 3157 431 3096 435 3075"/>
                </a>
                <a xlink:href=""   id="sitemap-9" data-id="sitemap-9" class="sitemap">
                <polygon points="322 2963 303 3045 435 3075 445 3034 454 2994"/>
                </a>
                <a xlink:href=""   id="sitemap-10" data-id="sitemap-10" class="sitemap">
                <polygon points="474 2912 322 2963 454 2994 460 2973"/>
                </a>
                <a xlink:href=""   id="sitemap-11" data-id="sitemap-11" class="sitemap">
                <polygon points="562 2995 576 2934 474 2912 460 2973"/>
                </a>
                <a xlink:href=""   id="sitemap-12" data-id="sitemap-12" class="sitemap">
                <polygon points="548 3057 562 2995 460 2973 445 3034"/>
                </a>
                <a xlink:href=""   id="sitemap-13" data-id="sitemap-13" class="sitemap">
                <polygon points="534 3119 548 3057 445 3034 431 3096"/>
                </a>
                <a xlink:href=""   id="sitemap-14" data-id="sitemap-14" class="sitemap">
                <polygon points="520 3180 534 3119 431 3096 417 3157"/>
                </a>
                <a xlink:href=""   id="sitemap-15" data-id="sitemap-15" class="sitemap">
                <polygon points="505 3242 520 3180 417 3157 403 3219"/>
                </a>
                <a xlink:href=""   id="sitemap-16" data-id="sitemap-16" class="sitemap">
                <polygon points="490 3303 505 3242 403 3219 389 3279"/>
                </a>
                <a xlink:href=""   id="sitemap-17" data-id="sitemap-17" class="sitemap">
                <polygon points="476 3364 490 3303 389 3279 375 3340"/>
                </a>
                <a xlink:href=""   id="sitemap-18" data-id="sitemap-18" class="sitemap">
                <polygon points="463 3426 476 3364 375 3340 361 3403"/>
                </a>
                <a xlink:href=""   id="sitemap-19" data-id="sitemap-19" class="sitemap">
                <polygon points="448 3487 463 3426 361 3403 347 3464"/>
                </a>
                <a xlink:href=""   id="sitemap-20" data-id="sitemap-20" class="sitemap">
                <polygon points="434 3548 448 3487 347 3464 332 3525"/>
                </a>
                <a xlink:href=""   id="sitemap-21" data-id="sitemap-21" class="sitemap">
                <polygon points="420 3610 434 3548 332 3525 319 3587"/>
                </a>
                <a xlink:href=""   id="sitemap-22" data-id="sitemap-22" class="sitemap">
                <polygon points="304 3647 319 3587 420 3610 406 3672 385 3668 323 3652"/>
                </a>
                <a xlink:href=""   id="sitemap-23" data-id="sitemap-23" class="sitemap">
                <polygon points="201 3625 171 3618 147 3722 178 3727"/>
                </a>
                <a xlink:href=""   id="sitemap-24" data-id="sitemap-24" class="sitemap">
                <polygon points="262 3639 201 3625 178 3727 240 3742"/>
                </a>
                <a xlink:href=""   id="sitemap-25" data-id="sitemap-25" class="sitemap">
                <polygon points="323 3652 262 3639 240 3742 300 3755"/>
                </a>
                <a xlink:href=""   id="sitemap-26" data-id="sitemap-26" class="sitemap">
                <polygon points="385 3668 323 3652 300 3755 362 3769"/>
                </a>
                <a xlink:href=""   id="sitemap-27" data-id="sitemap-27" class="sitemap">
                <polygon points="447 3681 385 3668 362 3769 424 3783"/>
                </a>
                <a xlink:href=""   id="sitemap-28" data-id="sitemap-28" class="sitemap">
                <polygon points="468 3686 447 3681 424 3783 486 3797 508 3694"/>
                </a>
                <a xlink:href=""   id="sitemap-29" data-id="sitemap-29" class="sitemap">
                <polygon points="508 3694 486 3797 546 3811 570 3710"/>
                </a>
                <a xlink:href=""   id="sitemap-30" data-id="sitemap-30" class="sitemap">
                <polygon points="482 3626 468 3686 570 3710 586 3649"/>
                </a>
                <a xlink:href=""   id="sitemap-31" data-id="sitemap-31" class="sitemap">
                <polygon points="496 3564 482 3626 586 3649 599 3587"/>
                </a>
                <a xlink:href=""   id="sitemap-32" data-id="sitemap-32" class="sitemap">
                <polygon points="510 3502 496 3564 599 3587 613 3525"/>
                </a>
                <a xlink:href=""   id="sitemap-33" data-id="sitemap-33" class="sitemap">
                <polygon points="524 3442 510 3502 613 3525 628 3465"/>
                </a>
                <a xlink:href=""   id="sitemap-34" data-id="sitemap-34" class="sitemap">
                <polygon points="539 3379 524 3442 628 3465 642 3404"/>
                </a>
                <a xlink:href=""   id="sitemap-35" data-id="sitemap-35" class="sitemap">
                <polygon points="553 3318 539 3379 642 3404 656 3344"/>
                </a>
                <a xlink:href=""   id="sitemap-36" data-id="sitemap-36" class="sitemap">
                <polygon points="567 3258 553 3318 656 3344 673 3281"/>
                </a>
                <a xlink:href=""   id="sitemap-37" data-id="sitemap-37" class="sitemap">
                <polygon points="580 3196 567 3258 673 3281 686 3220"/>
                </a>
                <a xlink:href=""   id="sitemap-38" data-id="sitemap-38" class="sitemap">
                <polygon points="595 3134 580 3196 686 3220 699 3157"/>
                </a>
                <a xlink:href=""   id="sitemap-39" data-id="sitemap-39" class="sitemap">
                <polygon points="609 3072 595 3134 699 3157 712 3095"/>
                </a>
                <a xlink:href=""   id="sitemap-40" data-id="sitemap-40" class="sitemap">
                <polygon points="623 3012 609 3072 712 3095 726 3034"/>
                </a>
                <a xlink:href=""   id="sitemap-41" data-id="sitemap-41" class="sitemap">
                <polygon points="739 2972 638 2948 623 3012 726 3034"/>
                </a>
                <a xlink:href=""   id="sitemap-42" data-id="sitemap-42" class="sitemap">
                <polygon points="1091 3171 1094 3054 739 2972 651 3389 659 3372 732 3029 752 2986 1078 3067 1088 3065"/>
                </a>
                <a xlink:href=""   id="sitemap-43" data-id="sitemap-43" class="sitemap">
                <polygon points="1148 3343 1146 3438 1220 3453 1245 3414 1251 3342"/>
                </a>
                <a xlink:href=""   id="sitemap-44" data-id="sitemap-44" class="sitemap">
                <polygon points="1252 3279 1251 3342 1148 3343 1148 3279"/>
                </a>
                <a xlink:href=""   id="sitemap-45" data-id="sitemap-45" class="sitemap">
                <polygon points="1252 3217 1252 3279 1148 3279 1147 3216"/>
                </a>
                <a xlink:href=""   id="sitemap-46" data-id="sitemap-46" class="sitemap">
                <polygon points="1252 3154 1252 3217 1147 3216 1146 3154"/>
                </a>
                <a xlink:href=""   id="sitemap-47" data-id="sitemap-47" class="sitemap">
                <polygon points="1252 3091 1252 3154 1146 3154 1147 3065"/>
                </a>
                <a xlink:href=""   id="sitemap-48" data-id="sitemap-48" class="sitemap">
                <polygon points="708 2772 680 2895 740 2910 769 2787"/>
                </a>
                <a xlink:href=""   id="sitemap-49" data-id="sitemap-49" class="sitemap">
                <polygon points="769 2787 740 2910 792 2921 820 2799"/>
                </a>
                <a xlink:href=""   id="sitemap-50" data-id="sitemap-50" class="sitemap">
                <polygon points="820 2799 792 2921 842 2932 872 2809"/>
                </a>
                <a xlink:href=""   id="sitemap-51" data-id="sitemap-51" class="sitemap">
                <polygon points="872 2809 842 2932 894 2945 922 2820"/>
                </a>
                <a xlink:href=""   id="sitemap-52" data-id="sitemap-52" class="sitemap">
                <polygon points="922 2820 894 2945 944 2956 974 2833"/>
                </a>
                <a xlink:href=""   id="sitemap-53" data-id="sitemap-53" class="sitemap">
                <polygon points="974 2833 944 2956 996 2967 1024 2846"/>
                </a>
                <a xlink:href=""   id="sitemap-54" data-id="sitemap-54" class="sitemap">
                <polygon points="1024 2846 996 2967 1047 2980 1075 2857"/>
                </a>
                <a xlink:href=""   id="sitemap-55" data-id="sitemap-55" class="sitemap">
                <polygon points="1075 2857 1047 2980 1099 2991 1127 2868"/>
                </a>
                <a xlink:href=""   id="sitemap-56" data-id="sitemap-56" class="sitemap">
                <polygon points="1127 2868 1099 2991 1149 3004 1178 2881"/>
                </a>
                <a xlink:href=""   id="sitemap-57" data-id="sitemap-57" class="sitemap">
                <polygon points="1178 2881 1149 3004 1201 3015 1230 2892"/>
                </a>
                <a xlink:href=""   id="sitemap-58" data-id="sitemap-58" class="sitemap">
                <polygon points="1251 3026 1268 3031 1279 2904"/>
                </a>
                <a xlink:href=""   id="sitemap-59" data-id="sitemap-59" class="sitemap">
                <polygon points="1279 2904 1251 3026 1201 3015 1230 2892"/>
                </a>
                <a xlink:href=""   id="sitemap-60" data-id="sitemap-60" class="sitemap">
                <polygon points="797 2663 735 2650 708 2772 769 2787"/>
                </a>
                <a xlink:href=""   id="sitemap-61" data-id="sitemap-61" class="sitemap">
                <polygon points="847 2675 797 2663 769 2787 820 2799"/>
                </a>
                <a xlink:href=""   id="sitemap-62" data-id="sitemap-62" class="sitemap">
                <polygon points="899 2687 847 2675 820 2799 872 2809"/>
                </a>
                <a xlink:href=""   id="sitemap-63" data-id="sitemap-63" class="sitemap">
                <polygon points="951 2698 899 2687 872 2809 922 2820"/>
                </a>
                <a xlink:href=""   id="sitemap-64" data-id="sitemap-64" class="sitemap">
                <polygon points="1001 2710 951 2698 922 2820 974 2833"/>
                </a>
                <a xlink:href=""   id="sitemap-65" data-id="sitemap-65" class="sitemap">
                <polygon points="1052 2723 1001 2710 974 2833 1024 2846"/>
                </a>
                <a xlink:href=""   id="sitemap-66" data-id="sitemap-66" class="sitemap">
                <polygon points="1103 2734 1052 2723 1024 2846 1075 2857"/>
                </a>
                <a xlink:href=""   id="sitemap-67" data-id="sitemap-67" class="sitemap">
                <polygon points="1154 2745 1103 2734 1075 2857 1127 2868"/>
                </a>
                <a xlink:href=""   id="sitemap-68" data-id="sitemap-68" class="sitemap">
                <polygon points="1206 2757 1154 2745 1127 2868 1178 2881"/>
                </a>
                <a xlink:href=""   id="sitemap-69" data-id="sitemap-69" class="sitemap">
                <polygon points="1258 2768 1206 2757 1178 2881 1230 2892"/>
                </a>
                <a xlink:href=""   id="sitemap-70" data-id="sitemap-70" class="sitemap">
                <polygon points="1291 2776 1258 2768 1230 2892 1279 2904"/>
                </a>
                <a xlink:href=""   id="sitemap-71" data-id="sitemap-71" class="sitemap">
                <polygon points="777 2465 751 2588 812 2602 839 2479"/>
                </a>
                <a xlink:href=""   id="sitemap-72" data-id="sitemap-72" class="sitemap">
                <polygon points="839 2479 812 2602 863 2614 890 2491"/>
                </a>
                <a xlink:href=""   id="sitemap-73" data-id="sitemap-73" class="sitemap">
                <polygon points="890 2491 863 2614 913 2626 942 2503"/>
                </a>
                <a xlink:href=""   id="sitemap-74" data-id="sitemap-74" class="sitemap">
                <polygon points="942 2503 913 2626 965 2637 992 2515"/>
                </a>
                <a xlink:href=""   id="sitemap-75" data-id="sitemap-75" class="sitemap">
                <polygon points="992 2515 965 2637 1016 2649 1044 2528"/>
                </a>
                <a xlink:href=""   id="sitemap-76" data-id="sitemap-76" class="sitemap">
                <polygon points="1044 2528 1016 2649 1067 2660 1095 2538"/>
                </a>
                <a xlink:href=""   id="sitemap-77" data-id="sitemap-77" class="sitemap">
                <polygon points="1095 2538 1067 2660 1118 2673 1146 2550"/>
                </a>
                <a xlink:href=""   id="sitemap-78" data-id="sitemap-78" class="sitemap">
                <polygon points="1146 2550 1118 2673 1169 2684 1196 2562"/>
                </a>
                <a xlink:href=""   id="sitemap-79" data-id="sitemap-79" class="sitemap">
                <polygon points="1258 2577 1231 2699 1169 2684 1196 2562"/>
                </a>
                <a xlink:href=""   id="sitemap-80" data-id="sitemap-80" class="sitemap">
                <polygon points="867 2357 805 2343 777 2465 839 2479"/>
                </a>
                <a xlink:href=""   id="sitemap-81" data-id="sitemap-81" class="sitemap">
                <polygon points="918 2368 867 2357 839 2479 890 2491"/>
                </a>
                <a xlink:href=""   id="sitemap-82" data-id="sitemap-82" class="sitemap">
                <polygon points="969 2380 918 2368 890 2491 942 2503"/>
                </a>
                <a xlink:href=""   id="sitemap-83" data-id="sitemap-83" class="sitemap">
                <polygon points="1020 2391 969 2380 942 2503 992 2515"/>
                </a>
                <a xlink:href=""   id="sitemap-84" data-id="sitemap-84" class="sitemap">
                <polygon points="1072 2403 1020 2391 992 2515 1044 2528"/>
                </a>
                <a xlink:href=""   id="sitemap-85" data-id="sitemap-85" class="sitemap">
                <polygon points="1122 2415 1072 2403 1044 2528 1095 2538"/>
                </a>
                <a xlink:href=""   id="sitemap-86" data-id="sitemap-86" class="sitemap">
                <polygon points="1174 2427 1122 2415 1095 2538 1146 2550"/>
                </a>
                <a xlink:href=""   id="sitemap-87" data-id="sitemap-87" class="sitemap">
                <polygon points="1225 2437 1174 2427 1146 2550 1196 2562"/>
                </a>
                <a xlink:href=""   id="sitemap-88" data-id="sitemap-88" class="sitemap">
                <polygon points="1286 2452 1258 2577 1196 2562 1225 2437"/>
                </a>
                <a xlink:href=""   id="sitemap-89" data-id="sitemap-89" class="sitemap">
                <polygon points="848 2158 820 2282 882 2295 910 2172"/>
                </a>
                <a xlink:href=""   id="sitemap-90" data-id="sitemap-90" class="sitemap">
                <polygon points="910 2172 882 2295 933 2308 961 2185"/>
                </a>
                <a xlink:href=""   id="sitemap-91" data-id="sitemap-91" class="sitemap">
                <polygon points="961 2185 933 2308 984 2320 1012 2197"/>
                </a>
                <a xlink:href=""   id="sitemap-92" data-id="sitemap-92" class="sitemap">
                <polygon points="1012 2197 984 2320 1034 2330 1062 2207"/>
                </a>
                <a xlink:href=""   id="sitemap-93" data-id="sitemap-93" class="sitemap">
                <polygon points="1062 2207 1034 2330 1087 2342 1114 2220"/>
                </a>
                <a xlink:href=""   id="sitemap-94" data-id="sitemap-94" class="sitemap">
                <polygon points="1114 2220 1087 2342 1137 2355 1165 2230"/>
                </a>
                <a xlink:href=""   id="sitemap-95" data-id="sitemap-95" class="sitemap">
                <polygon points="1165 2230 1137 2355 1188 2366 1218 2244"/>
                </a>
                <a xlink:href=""   id="sitemap-96" data-id="sitemap-96" class="sitemap">
                <polygon points="1218 2244 1188 2366 1239 2377 1268 2254"/>
                </a>
                <a xlink:href=""   id="sitemap-97" data-id="sitemap-97" class="sitemap">
                <polygon points="1268 2254 1239 2377 1291 2388 1319 2265"/>
                </a>
                <a xlink:href=""   id="sitemap-98" data-id="sitemap-98" class="sitemap">
                <polygon points="1319 2265 1291 2388 1342 2401 1370 2276"/>
                </a>
                <a xlink:href=""   id="sitemap-99" data-id="sitemap-99" class="sitemap">
                <polygon points="1370 2276 1342 2401 1394 2413 1421 2291"/>
                </a>
                <a xlink:href=""   id="sitemap-100" data-id="sitemap-100" class="sitemap">
                <polygon points="1421 2291 1394 2413 1436 2422 1445 2294"/>
                </a>
                <a xlink:href=""   id="sitemap-101" data-id="sitemap-101" class="sitemap">
                <polygon points="937 2049 875 2034 848 2158 910 2172"/>
                </a>
                <a xlink:href=""   id="sitemap-102" data-id="sitemap-102" class="sitemap">
                <polygon points="989 2060 937 2049 910 2172 961 2185"/>
                </a>
                <a xlink:href=""   id="sitemap-103" data-id="sitemap-103" class="sitemap">
                <polygon points="1039 2071 989 2060 961 2185 1012 2197"/>
                </a>
                <a xlink:href=""   id="sitemap-104" data-id="sitemap-104" class="sitemap">
                <polygon points="1091 2084 1039 2071 1012 2197 1062 2207"/>
                </a>
                <a xlink:href=""   id="sitemap-105" data-id="sitemap-105" class="sitemap">
                <polygon points="1142 2096 1091 2084 1062 2207 1114 2220"/>
                </a>
                <a xlink:href=""   id="sitemap-106" data-id="sitemap-106" class="sitemap">
                <polygon points="1193 2108 1142 2096 1114 2220 1165 2230"/>
                </a>
                <a xlink:href=""   id="sitemap-107" data-id="sitemap-107" class="sitemap">
                <polygon points="1245 2119 1193 2108 1165 2230 1218 2244"/>
                </a>
                <a xlink:href=""   id="sitemap-108" data-id="sitemap-108" class="sitemap">
                <polygon points="1296 2131 1245 2119 1218 2244 1268 2254"/>
                </a>
                <a xlink:href=""   id="sitemap-109" data-id="sitemap-109" class="sitemap">
                <polygon points="1348 2143 1296 2131 1268 2254 1319 2265"/>
                </a>
                <a xlink:href=""   id="sitemap-110" data-id="sitemap-110" class="sitemap">
                <polygon points="1397 2154 1348 2143 1319 2265 1370 2276"/>
                </a>
                <a xlink:href=""   id="sitemap-111" data-id="sitemap-111" class="sitemap">
                <polygon points="1449 2165 1397 2154 1370 2276 1421 2291"/>
                </a>
                <a xlink:href=""   id="sitemap-112" data-id="sitemap-112" class="sitemap">
                <polygon points="1454 2166 1449 2165 1421 2291 1445 2294"/>
                </a>
                <a xlink:href=""   id="sitemap-113" data-id="sitemap-113" class="sitemap">
                <polygon points="990 1543 961 1667 1022 1680 1051 1557"/>
                </a>
                <a xlink:href=""   id="sitemap-114" data-id="sitemap-114" class="sitemap">
                <polygon points="1051 1557 1022 1680 1074 1692 1104 1570"/>
                </a>
                <a xlink:href=""   id="sitemap-115" data-id="sitemap-115" class="sitemap">
                <polygon points="1104 1570 1074 1692 1125 1704 1154 1581"/>
                </a>
                <a xlink:href=""   id="sitemap-116" data-id="sitemap-116" class="sitemap">
                <polygon points="1154 1581 1125 1704 1176 1716 1205 1593"/>
                </a>
                <a xlink:href=""   id="sitemap-117" data-id="sitemap-117" class="sitemap">
                <polygon points="1205 1593 1176 1716 1228 1728 1255 1604"/>
                </a>
                <a xlink:href=""   id="sitemap-118" data-id="sitemap-118" class="sitemap">
                <polygon points="1255 1604 1228 1728 1279 1739 1307 1616"/>
                </a>
                <a xlink:href=""   id="sitemap-119" data-id="sitemap-119" class="sitemap">
                <polygon points="1307 1616 1279 1739 1331 1750 1357 1629"/>
                </a>
                <a xlink:href=""   id="sitemap-120" data-id="sitemap-120" class="sitemap">
                <polygon points="1357 1629 1331 1750 1381 1763 1409 1641"/>
                </a>
                <a xlink:href=""   id="sitemap-121" data-id="sitemap-121" class="sitemap">
                <polygon points="1409 1641 1381 1763 1432 1774 1459 1652"/>
                </a>
                <a xlink:href=""   id="sitemap-122" data-id="sitemap-122" class="sitemap">
                <polygon points="1459 1652 1432 1774 1483 1787 1512 1663"/>
                </a>
                <a xlink:href=""   id="sitemap-123" data-id="sitemap-123" class="sitemap">
                <polygon points="1078 1436 1018 1422 990 1543 1051 1557"/>
                </a>
                <a xlink:href=""   id="sitemap-124" data-id="sitemap-124" class="sitemap">
                <polygon points="1130 1448 1078 1436 1051 1557 1104 1570"/>
                </a>
                <a xlink:href=""   id="sitemap-125" data-id="sitemap-125" class="sitemap">
                <polygon points="1181 1459 1130 1448 1104 1570 1154 1581"/>
                </a>
                <a xlink:href=""   id="sitemap-126" data-id="sitemap-126" class="sitemap">
                <polygon points="1233 1470 1181 1459 1154 1581 1205 1593"/>
                </a>
                <a xlink:href=""   id="sitemap-127" data-id="sitemap-127" class="sitemap">
                <polygon points="1282 1482 1233 1470 1205 1593 1255 1604"/>
                </a>
                <a xlink:href=""   id="sitemap-128" data-id="sitemap-128" class="sitemap">
                <polygon points="1336 1494 1282 1482 1255 1604 1307 1616"/>
                </a>
                <a xlink:href=""   id="sitemap-129" data-id="sitemap-129" class="sitemap">
                <polygon points="1386 1506 1336 1494 1307 1616 1357 1629"/>
                </a>
                <a xlink:href=""   id="sitemap-130" data-id="sitemap-130" class="sitemap">
                <polygon points="1438 1518 1386 1506 1357 1629 1409 1641"/>
                </a>
                <a xlink:href=""   id="sitemap-131" data-id="sitemap-131" class="sitemap">
                <polygon points="1488 1529 1438 1518 1409 1641 1459 1652"/>
                </a>
                <a xlink:href=""   id="sitemap-132" data-id="sitemap-132" class="sitemap">
                <polygon points="1512 1663 1459 1652 1488 1529 1540 1542"/>
                </a>
                <a xlink:href=""   id="sitemap-133" data-id="sitemap-133" class="sitemap">
                <polygon points="1512 1663 1483 1787 1535 1798 1563 1675"/>
                </a>
                <a xlink:href=""   id="sitemap-134" data-id="sitemap-134" class="sitemap">
                <polygon points="1563 1675 1535 1798 1585 1810 1614 1688"/>
                </a>
                <a xlink:href=""   id="sitemap-135" data-id="sitemap-135" class="sitemap">
                <polygon points="1614 1688 1585 1810 1636 1822 1664 1700"/>
                </a>
                <a xlink:href=""   id="sitemap-136" data-id="sitemap-136" class="sitemap">
                <polygon points="1664 1700 1636 1822 1688 1834 1716 1712"/>
                </a>
                <a xlink:href=""   id="sitemap-137" data-id="sitemap-137" class="sitemap">
                <polygon points="1590 1553 1540 1542 1512 1663 1563 1675"/>
                </a>
                <a xlink:href=""   id="sitemap-138" data-id="sitemap-138" class="sitemap">
                <polygon points="1641 1565 1590 1553 1563 1675 1614 1688"/>
                </a>
                <a xlink:href=""   id="sitemap-139" data-id="sitemap-139" class="sitemap">
                <polygon points="1693 1576 1641 1565 1614 1688 1664 1700"/>
                </a>
                <a xlink:href=""   id="sitemap-140" data-id="sitemap-140" class="sitemap">
                <polygon points="1743 1587 1693 1576 1664 1700 1716 1712"/>
                </a>
                <a xlink:href=""   id="sitemap-141" data-id="sitemap-141" class="sitemap">
                <polygon points="1716 1712 1688 1834 1739 1845 1768 1724"/>
                </a>
                <a xlink:href=""   id="sitemap-142" data-id="sitemap-142" class="sitemap">
                <polygon points="1795 1599 1743 1587 1716 1712 1768 1724"/>
                </a>
                <a xlink:href=""   id="sitemap-143" data-id="sitemap-143" class="sitemap">
                <polygon points="1818 1735 1791 1858 1739 1845 1768 1724"/>
                </a>
                <a xlink:href=""   id="sitemap-144" data-id="sitemap-144" class="sitemap">
                <polygon points="1846 1611 1818 1735 1768 1724 1795 1599"/>
                </a>
                <a xlink:href=""   id="sitemap-145" data-id="sitemap-145" class="sitemap">
                <polygon points="919 1850 891 1973 953 1987 981 1864"/>
                </a>
                <a xlink:href=""   id="sitemap-146" data-id="sitemap-146" class="sitemap">
                <polygon points="981 1864 953 1987 1003 1999 1031 1877"/>
                </a>
                <a xlink:href=""   id="sitemap-147" data-id="sitemap-147" class="sitemap">
                <polygon points="1031 1877 1003 1999 1054 2012 1083 1891"/>
                </a>
                <a xlink:href=""   id="sitemap-148" data-id="sitemap-148" class="sitemap">
                <polygon points="1083 1891 1054 2012 1105 2025 1133 1901"/>
                </a>
                <a xlink:href=""   id="sitemap-149" data-id="sitemap-149" class="sitemap">
                <polygon points="1008 1743 947 1728 919 1850 981 1864"/>
                </a>
                <a xlink:href=""   id="sitemap-150" data-id="sitemap-150" class="sitemap">
                <polygon points="1059 1754 1008 1743 981 1864 1031 1877"/>
                </a>
                <a xlink:href=""   id="sitemap-151" data-id="sitemap-151" class="sitemap">
                <polygon points="1109 1766 1059 1754 1031 1877 1083 1891"/>
                </a>
                <a xlink:href=""   id="sitemap-152" data-id="sitemap-152" class="sitemap">
                <polygon points="1162 1779 1109 1766 1083 1891 1133 1901"/>
                </a>
                <a xlink:href=""   id="sitemap-153" data-id="sitemap-153" class="sitemap">
                <polygon points="1133 1901 1105 2025 1157 2035 1185 1911"/>
                </a>
                <a xlink:href=""   id="sitemap-154" data-id="sitemap-154" class="sitemap">
                <polygon points="1185 1911 1157 2035 1208 2046 1237 1924"/>
                </a>
                <a xlink:href=""   id="sitemap-155" data-id="sitemap-155" class="sitemap">
                <polygon points="1237 1924 1208 2046 1259 2057 1287 1937"/>
                </a>
                <a xlink:href=""   id="sitemap-156" data-id="sitemap-156" class="sitemap">
                <polygon points="1287 1937 1259 2057 1310 2069 1338 1947"/>
                </a>
                <a xlink:href=""   id="sitemap-157" data-id="sitemap-157" class="sitemap">
                <polygon points="1338 1947 1310 2069 1360 2081 1389 1959"/>
                </a>
                <a xlink:href=""   id="sitemap-158" data-id="sitemap-158" class="sitemap">
                <polygon points="1213 1790 1162 1779 1133 1901 1185 1911"/>
                </a>
                <a xlink:href=""   id="sitemap-159" data-id="sitemap-159" class="sitemap">
                <polygon points="1264 1802 1213 1790 1185 1911 1237 1924"/>
                </a>
                <a xlink:href=""   id="sitemap-160" data-id="sitemap-160" class="sitemap">
                <polygon points="1314 1813 1264 1802 1237 1924 1287 1937"/>
                </a>
                <a xlink:href=""   id="sitemap-161" data-id="sitemap-161" class="sitemap">
                <polygon points="1365 1825 1314 1813 1287 1937 1338 1947"/>
                </a>
                <a xlink:href=""   id="sitemap-162" data-id="sitemap-162" class="sitemap">
                <polygon points="1417 1836 1365 1825 1338 1947 1389 1959"/>
                </a>
                <a xlink:href=""   id="sitemap-163" data-id="sitemap-163" class="sitemap">
                <polygon points="1389 1959 1360 2081 1411 2093 1439 1970"/>
                </a>
                <a xlink:href=""   id="sitemap-164" data-id="sitemap-164" class="sitemap">
                <polygon points="1469 1848 1417 1836 1389 1959 1439 1970"/>
                </a>
                <a xlink:href=""   id="sitemap-165" data-id="sitemap-165" class="sitemap">
                <polygon points="1519 1859 1469 1848 1439 1970 1492 1983"/>
                </a>
                <a xlink:href=""   id="sitemap-166" data-id="sitemap-166" class="sitemap">
                <polygon points="1492 1983 1481 2031 1465 2029 1458 2104 1411 2093 1439 1970"/>
                </a>
                <a xlink:href=""   id="sitemap-167" data-id="sitemap-167" class="sitemap">
                <polygon points="1569 1871 1519 1859 1492 1983 1543 1994"/>
                </a>
                <a xlink:href=""   id="sitemap-168" data-id="sitemap-168" class="sitemap">
                <polygon points="1620 1883 1569 1871 1543 1994 1594 2007"/>
                </a>
                <a xlink:href=""   id="sitemap-169" data-id="sitemap-169" class="sitemap">
                <polygon points="1673 1895 1620 1883 1594 2007 1645 2018"/>
                </a>
                <a xlink:href=""   id="sitemap-170" data-id="sitemap-170" class="sitemap">
                <polygon points="1695 2030 1645 2018 1673 1895 1725 1906"/>
                </a>
                <a xlink:href=""   id="sitemap-171" data-id="sitemap-171" class="sitemap">
                <polygon points="1748 2042 1695 2030 1725 1906 1775 1918"/>
                </a>
                <a xlink:href=""   id="sitemap-172" data-id="sitemap-172" class="sitemap">
                <polygon points="1798 1922 1775 1918 1748 2042 1776 2051"/>
                </a>
                <a xlink:href=""   id="sitemap-173" data-id="sitemap-173" class="sitemap">
                <polygon points="616 1760 597 1840 720 1871 732 1820 738 1788"/>
                </a>
                <a xlink:href=""   id="sitemap-174" data-id="sitemap-174" class="sitemap">
                <polygon points="702 1951 709 1921 720 1871 597 1840 579 1921"/>
                </a>
                <a xlink:href=""   id="sitemap-175" data-id="sitemap-175" class="sitemap">
                <polygon points="683 2032 684 2023 697 1972 702 1951 579 1921 560 2004"/>
                </a>
                <a xlink:href=""   id="sitemap-176" data-id="sitemap-176" class="sitemap">
                <polygon points="663 2114 673 2073 683 2032 560 2004 541 2086"/>
                </a>
                <a xlink:href=""   id="sitemap-177" data-id="sitemap-177" class="sitemap">
                <polygon points="646 2196 650 2177 661 2125 663 2114 541 2086 523 2169"/>
                </a>
                <a xlink:href=""   id="sitemap-178" data-id="sitemap-178" class="sitemap">
                <polygon points="627 2279 639 2227 646 2196 523 2169 503 2250"/>
                </a>
                <a xlink:href=""   id="sitemap-179" data-id="sitemap-179" class="sitemap">
                <polygon points="608 2359 615 2331 627 2279 503 2250 485 2332"/>
                </a>
                <a xlink:href=""   id="sitemap-180" data-id="sitemap-180" class="sitemap">
                <polygon points="588 2442 590 2434 602 2382 608 2359 485 2332 465 2414"/>
                </a>
                <a xlink:href=""   id="sitemap-181" data-id="sitemap-181" class="sitemap">
                <polygon points="569 2524 579 2483 588 2442 465 2414 447 2496"/>
                </a>
                <a xlink:href=""   id="sitemap-182" data-id="sitemap-182" class="sitemap">
                <polygon points="555 2587 567 2535 569 2524 447 2496 429 2577 551 2605"/>
                </a>
                <a xlink:href=""   id="sitemap-183" data-id="sitemap-183" class="sitemap">
                <polygon points="551 2605 545 2637 532 2688 410 2660 429 2577"/>
                </a>
                <a xlink:href=""   id="sitemap-184" data-id="sitemap-184" class="sitemap">
                <polygon points="391 2743 372 2825 495 2851 514 2771"/>
                </a>
                <a xlink:href=""   id="sitemap-185" data-id="sitemap-185" class="sitemap">
                <polygon points="532 2688 410 2660 391 2743 514 2771"/>
                </a>
                <a xlink:href=""   id="sitemap-186" data-id="sitemap-186" class="sitemap">
                <polygon points="632 2819 618 2880 495 2851 508 2791"/>
                </a>
                <a xlink:href=""   id="sitemap-187" data-id="sitemap-187" class="sitemap">
                <polygon points="644 2769 632 2819 508 2791 521 2740"/>
                </a>
                <a xlink:href=""   id="sitemap-188" data-id="sitemap-188" class="sitemap">
                <polygon points="655 2718 644 2769 521 2740 532 2688"/>
                </a>
                <a xlink:href=""   id="sitemap-189" data-id="sitemap-189" class="sitemap">
                <polygon points="667 2666 655 2718 532 2688 545 2637"/>
                </a>
                <a xlink:href=""   id="sitemap-190" data-id="sitemap-190" class="sitemap">
                <polygon points="679 2615 667 2666 545 2637 555 2587"/>
                </a>
                <a xlink:href=""   id="sitemap-191" data-id="sitemap-191" class="sitemap">
                <polygon points="691 2562 679 2615 555 2587 567 2535"/>
                </a>
                <a xlink:href=""   id="sitemap-192" data-id="sitemap-192" class="sitemap">
                <polygon points="703 2511 691 2562 567 2535 579 2483"/>
                </a>
                <a xlink:href=""   id="sitemap-193" data-id="sitemap-193" class="sitemap">
                <polygon points="715 2462 703 2511 579 2483 590 2434"/>
                </a>
                <a xlink:href=""   id="sitemap-194" data-id="sitemap-194" class="sitemap">
                <polygon points="727 2409 715 2462 590 2434 602 2382"/>
                </a>
                <a xlink:href=""   id="sitemap-195" data-id="sitemap-195" class="sitemap">
                <polygon points="738 2358 727 2409 602 2382 615 2331"/>
                </a>
                <a xlink:href=""   id="sitemap-196" data-id="sitemap-196" class="sitemap">
                <polygon points="749 2309 738 2358 615 2331 627 2279"/>
                </a>
                <a xlink:href=""   id="sitemap-197" data-id="sitemap-197" class="sitemap">
                <polygon points="762 2257 749 2309 627 2279 639 2227"/>
                </a>
                <a xlink:href=""   id="sitemap-198" data-id="sitemap-198" class="sitemap">
                <polygon points="774 2206 762 2257 639 2227 650 2177"/>
                </a>
                <a xlink:href=""   id="sitemap-199" data-id="sitemap-199" class="sitemap">
                <polygon points="785 2155 774 2206 650 2177 661 2125"/>
                </a>
                <a xlink:href=""   id="sitemap-200" data-id="sitemap-200" class="sitemap">
                <polygon points="797 2103 785 2155 661 2125 673 2073"/>
                </a>
                <a xlink:href=""   id="sitemap-201" data-id="sitemap-201" class="sitemap">
                <polygon points="808 2054 797 2103 673 2073 684 2023"/>
                </a>
                <a xlink:href=""   id="sitemap-202" data-id="sitemap-202" class="sitemap">
                <polygon points="819 2001 808 2054 684 2023 697 1972"/>
                </a>
                <a xlink:href=""   id="sitemap-203" data-id="sitemap-203" class="sitemap">
                <polygon points="832 1951 819 2001 697 1972 709 1921"/>
                </a>
                <a xlink:href=""   id="sitemap-204" data-id="sitemap-204" class="sitemap">
                <polygon points="842 1899 832 1951 709 1921 720 1871"/>
                </a>
                <a xlink:href=""   id="sitemap-205" data-id="sitemap-205" class="sitemap">
                <polygon points="854 1847 842 1899 720 1871 732 1820"/>
                </a>
                <a xlink:href=""   id="sitemap-206" data-id="sitemap-206" class="sitemap">
                <polygon points="709 1349 957 1407 854 1847 732 1820 738 1788 616 1760"/>
                </a>
                <a xlink:href=""   id="sitemap-207" data-id="sitemap-207" class="sitemap">
                <polygon points="305 2700 296 2735 290 2742 297 2698"/>
                </a>
                <a xlink:href=""   id="sitemap-208" data-id="sitemap-208" class="sitemap">
                <polygon points="324 2618 305 2700 297 2698 303 2655 300 2634 195 2614 200 2589"/>
                </a>
                <a xlink:href=""   id="sitemap-209" data-id="sitemap-209" class="sitemap">
                <polygon points="341 2536 324 2618 200 2589 219 2507"/>
                </a>
                <a xlink:href=""   id="sitemap-210" data-id="sitemap-210" class="sitemap">
                <polygon points="360 2454 341 2536 219 2507 237 2425"/>
                </a>
                <a xlink:href=""   id="sitemap-211" data-id="sitemap-211" class="sitemap">
                <polygon points="379 2372 360 2454 237 2425 256 2343"/>
                </a>
                <a xlink:href=""   id="sitemap-212" data-id="sitemap-212" class="sitemap">
                <polygon points="398 2290 379 2372 256 2343 276 2261"/>
                </a>
                <a xlink:href=""   id="sitemap-213" data-id="sitemap-213" class="sitemap">
                <polygon points="417 2210 398 2290 276 2261 293 2180"/>
                </a>
                <a xlink:href=""   id="sitemap-214" data-id="sitemap-214" class="sitemap">
                <polygon points="435 2127 417 2210 293 2180 312 2097"/>
                </a>
                <a xlink:href=""   id="sitemap-215" data-id="sitemap-215" class="sitemap">
                <polygon points="454 2044 435 2127 312 2097 332 2017"/>
                </a>
                <a xlink:href=""   id="sitemap-216" data-id="sitemap-216" class="sitemap">
                <polygon points="350 1933 474 1963 454 2044 332 2017"/>
                </a>
                <a xlink:href=""   id="sitemap-217" data-id="sitemap-217" class="sitemap">
                <polygon points="200 2589 195 2614 69 2592 76 2560"/>
                </a>
                <a xlink:href=""   id="sitemap-218" data-id="sitemap-218" class="sitemap">
                <polygon points="216 2518 200 2589 76 2560 93 2489"/>
                </a>
                <a xlink:href=""   id="sitemap-219" data-id="sitemap-219" class="sitemap">
                <polygon points="232 2447 216 2518 93 2489 109 2417"/>
                </a>
                <a xlink:href=""   id="sitemap-220" data-id="sitemap-220" class="sitemap">
                <polygon points="249 2375 232 2447 109 2417 126 2345"/>
                </a>
                <a xlink:href=""   id="sitemap-221" data-id="sitemap-221" class="sitemap">
                <polygon points="266 2303 249 2375 126 2345 143 2274"/>
                </a>
                <a xlink:href=""   id="sitemap-222" data-id="sitemap-222" class="sitemap">
                <polygon points="282 2231 266 2303 143 2274 159 2203"/>
                </a>
                <a xlink:href=""   id="sitemap-223" data-id="sitemap-223" class="sitemap">
                <polygon points="299 2159 282 2231 159 2203 175 2130"/>
                </a>
                <a xlink:href=""   id="sitemap-224" data-id="sitemap-224" class="sitemap">
                <polygon points="315 2087 299 2159 175 2130 181 2101 185 2102 196 2061"/>
                </a>
                <a xlink:href=""   id="sitemap-225" data-id="sitemap-225" class="sitemap">
                <polygon points="332 2017 315 2087 196 2061 217 1990"/>
                </a>
                <a xlink:href=""   id="sitemap-226" data-id="sitemap-226" class="sitemap">
                <polygon points="347 1943 332 2017 217 1990 236 1917"/>
                </a>
                <a xlink:href=""   id="sitemap-227" data-id="sitemap-227" class="sitemap">
                <polygon points="350 1933 347 1943 236 1917 237 1908"/>
                </a>
                <a xlink:href=""   id="sitemap-228" data-id="sitemap-228" class="sitemap">
                <polygon points="280 1703 253 1827 275 1832 304 1709"/>
                </a>
                <a xlink:href=""   id="sitemap-229" data-id="sitemap-229" class="sitemap">
                <polygon points="348 1849 275 1832 304 1709 377 1725"/>
                </a>
                <a xlink:href=""   id="sitemap-230" data-id="sitemap-230" class="sitemap">
                <polygon points="420 1866 348 1849 377 1725 447 1742"/>
                </a>
                <a xlink:href=""   id="sitemap-231" data-id="sitemap-231" class="sitemap">
                <polygon points="520 1759 493 1881 420 1866 447 1742"/>
                </a>
                <a xlink:href=""   id="sitemap-232" data-id="sitemap-232" class="sitemap">
                <polygon points="498 1624 549 1635 520 1759 468 1747"/>
                </a>
                <a xlink:href=""   id="sitemap-233" data-id="sitemap-233" class="sitemap">
                <polygon points="446 1613 498 1624 468 1747 418 1735"/>
                </a>
                <a xlink:href=""   id="sitemap-234" data-id="sitemap-234" class="sitemap">
                <polygon points="395 1601 446 1613 418 1735 367 1722"/>
                </a>
                <a xlink:href=""   id="sitemap-235" data-id="sitemap-235" class="sitemap">
                <polygon points="344 1590 395 1601 367 1722 316 1712"/>
                </a>
                <a xlink:href=""   id="sitemap-236" data-id="sitemap-236" class="sitemap">
                <polygon points="304 1581 344 1590 316 1712 280 1703"/>
                </a>
                <a xlink:href=""   id="sitemap-237" data-id="sitemap-237" class="sitemap">
                <polygon points="358 1528 317 1519 323 1488 337 1396 386 1405"/>
                </a>
                <a xlink:href=""   id="sitemap-238" data-id="sitemap-238" class="sitemap">
                <polygon points="386 1405 358 1528 409 1539 437 1417"/>
                </a>
                <a xlink:href=""   id="sitemap-239" data-id="sitemap-239" class="sitemap">
                <polygon points="437 1417 409 1539 459 1553 488 1429"/>
                </a>
                <a xlink:href=""   id="sitemap-240" data-id="sitemap-240" class="sitemap">
                <polygon points="511 1564 459 1553 488 1429 539 1440"/>
                </a>
                <a xlink:href=""   id="sitemap-241" data-id="sitemap-241" class="sitemap">
                <polygon points="590 1453 563 1576 511 1564 539 1440"/>
                </a>
                <a xlink:href=""   id="sitemap-242" data-id="sitemap-242" class="sitemap">
                <polygon points="568 1319 618 1330 590 1453 539 1440"/>
                </a>
                <a xlink:href=""   id="sitemap-243" data-id="sitemap-243" class="sitemap">
                <polygon points="515 1307 568 1319 539 1440 488 1429"/>
                </a>
                <a xlink:href=""   id="sitemap-244" data-id="sitemap-244" class="sitemap">
                <polygon points="465 1293 515 1307 488 1429 437 1417"/>
                </a>
                <a xlink:href=""   id="sitemap-245" data-id="sitemap-245" class="sitemap">
                <polygon points="417 1281 465 1293 437 1417 386 1405"/>
                </a>
                <a xlink:href=""   id="sitemap-246" data-id="sitemap-246" class="sitemap">
                <polygon points="362 1269 417 1281 386 1405 337 1396"/>
                </a>
                <a xlink:href=""   id="sitemap-247" data-id="sitemap-247" class="sitemap">
                <polygon points="355 1266 362 1269 340 1378"/>
                </a>
                <a xlink:href=""   id="sitemap-248" data-id="sitemap-248" class="sitemap">
                <polygon points="406 1087 383 1082 364 1205 377 1208"/>
                </a>
                <a xlink:href=""   id="sitemap-249" data-id="sitemap-249" class="sitemap">
                <polygon points="406 1087 377 1208 429 1220 456 1098"/>
                </a>
                <a xlink:href=""   id="sitemap-250" data-id="sitemap-250" class="sitemap">
                <polygon points="456 1098 429 1220 480 1232 508 1110"/>
                </a>
                <a xlink:href=""   id="sitemap-251" data-id="sitemap-251" class="sitemap">
                <polygon points="508 1110 480 1232 531 1245 559 1122"/>
                </a>
                <a xlink:href=""   id="sitemap-252" data-id="sitemap-252" class="sitemap">
                <polygon points="559 1122 531 1245 583 1257 611 1133"/>
                </a>
                <a xlink:href=""   id="sitemap-253" data-id="sitemap-253" class="sitemap">
                <polygon points="662 1146 633 1269 583 1257 611 1133"/>
                </a>
                <a xlink:href=""   id="sitemap-254" data-id="sitemap-254" class="sitemap">
                <polygon points="638 1010 689 1022 662 1146 611 1133"/>
                </a>
                <a xlink:href=""   id="sitemap-255" data-id="sitemap-255" class="sitemap">
                <polygon points="587 998 638 1010 611 1133 559 1122"/>
                </a>
                <a xlink:href=""   id="sitemap-256" data-id="sitemap-256" class="sitemap">
                <polygon points="535 986 587 998 559 1122 508 1110"/>
                </a>
                <a xlink:href=""   id="sitemap-257" data-id="sitemap-257" class="sitemap">
                <polygon points="484 975 535 986 508 1110 456 1098"/>
                </a>
                <a xlink:href=""   id="sitemap-258" data-id="sitemap-258" class="sitemap">
                <polygon points="435 962 484 975 456 1098 406 1087"/>
                </a>
                <a xlink:href=""   id="sitemap-259" data-id="sitemap-259" class="sitemap">
                <polygon points="399 955 435 962 406 1087 383 1082"/>
                </a>
                <a xlink:href=""   id="sitemap-260" data-id="sitemap-260" class="sitemap">
                <polygon points="753 1165 725 1290 776 1300 803 1178"/>
                </a>
                <a xlink:href=""   id="sitemap-261" data-id="sitemap-261" class="sitemap">
                <polygon points="803 1178 776 1300 827 1313 855 1190"/>
                </a>
                <a xlink:href=""   id="sitemap-262" data-id="sitemap-262" class="sitemap">
                <polygon points="855 1190 827 1313 880 1324 907 1202"/>
                </a>
                <a xlink:href=""   id="sitemap-263" data-id="sitemap-263" class="sitemap">
                <polygon points="907 1202 880 1324 930 1337 958 1213"/>
                </a>
                <a xlink:href=""   id="sitemap-264" data-id="sitemap-264" class="sitemap">
                <polygon points="831 1054 781 1043 753 1165 803 1178"/>
                </a>
                <a xlink:href=""   id="sitemap-265" data-id="sitemap-265" class="sitemap">
                <polygon points="884 1066 831 1054 803 1178 855 1190"/>
                </a>
                <a xlink:href=""   id="sitemap-266" data-id="sitemap-266" class="sitemap">
                <polygon points="934 1079 884 1066 855 1190 907 1202"/>
                </a>
                <a xlink:href=""   id="sitemap-267" data-id="sitemap-267" class="sitemap">
                <polygon points="985 1090 934 1079 907 1202 958 1213"/>
                </a>
                <a xlink:href=""   id="sitemap-268" data-id="sitemap-268" class="sitemap">
                <polygon points="958 1213 930 1337 980 1348 1008 1226"/>
                </a>
                <a xlink:href=""   id="sitemap-269" data-id="sitemap-269" class="sitemap">
                <polygon points="1008 1226 980 1348 1032 1360 1060 1237"/>
                </a>
                <a xlink:href=""   id="sitemap-270" data-id="sitemap-270" class="sitemap">
                <polygon points="1083 1372 1032 1360 1060 1237 1111 1249"/>
                </a>
                <a xlink:href=""   id="sitemap-271" data-id="sitemap-271" class="sitemap">
                <polygon points="1036 1101 985 1090 958 1213 1008 1226"/>
                </a>
                <a xlink:href=""   id="sitemap-272" data-id="sitemap-272" class="sitemap">
                <polygon points="1088 1113 1036 1101 1008 1226 1060 1237"/>
                </a>
                <a xlink:href=""   id="sitemap-273" data-id="sitemap-273" class="sitemap">
                <polygon points="1140 1125 1088 1113 1060 1237 1111 1249"/>
                </a>
                <a xlink:href=""   id="sitemap-274" data-id="sitemap-274" class="sitemap">
                <polygon points="1190 1137 1140 1125 1111 1249 1162 1260"/>
                </a>
                <a xlink:href=""   id="sitemap-275" data-id="sitemap-275" class="sitemap">
                <polygon points="1241 1148 1190 1137 1162 1260 1214 1273"/>
                </a>
                <a xlink:href=""   id="sitemap-276" data-id="sitemap-276" class="sitemap">
                <polygon points="1162 1260 1111 1249 1083 1372 1134 1384"/>
                </a>
                <a xlink:href=""   id="sitemap-277" data-id="sitemap-277" class="sitemap">
                <polygon points="1214 1273 1162 1260 1134 1384 1185 1396"/>
                </a>
                <a xlink:href=""   id="sitemap-278" data-id="sitemap-278" class="sitemap">
                <polygon points="1214 1273 1185 1396 1237 1407 1264 1284"/>
                </a>
                <a xlink:href=""   id="sitemap-279" data-id="sitemap-279" class="sitemap">
                <polygon points="1293 1161 1241 1148 1214 1273 1264 1284"/>
                </a>
                <a xlink:href=""   id="sitemap-280" data-id="sitemap-280" class="sitemap">
                <polygon points="1264 1284 1237 1407 1288 1419 1315 1296"/>
                </a>
                <a xlink:href=""   id="sitemap-281" data-id="sitemap-281" class="sitemap">
                <polygon points="1343 1173 1293 1161 1264 1284 1315 1296"/>
                </a>
                <a xlink:href=""   id="sitemap-282" data-id="sitemap-282" class="sitemap">
                <polygon points="1315 1296 1288 1419 1340 1429 1367 1307"/>
                </a>
                <a xlink:href=""   id="sitemap-283" data-id="sitemap-283" class="sitemap">
                <polygon points="1395 1185 1343 1173 1315 1296 1367 1307"/>
                </a>
                <a xlink:href=""   id="sitemap-284" data-id="sitemap-284" class="sitemap">
                <polygon points="1367 1307 1340 1429 1391 1443 1418 1319"/>
                </a>
                <a xlink:href=""   id="sitemap-285" data-id="sitemap-285" class="sitemap">
                <polygon points="1446 1196 1395 1185 1367 1307 1418 1319"/>
                </a>
                <a xlink:href=""   id="sitemap-286" data-id="sitemap-286" class="sitemap">
                <polygon points="1418 1319 1391 1443 1442 1454 1470 1331"/>
                </a>
                <a xlink:href=""   id="sitemap-287" data-id="sitemap-287" class="sitemap">
                <polygon points="1498 1208 1446 1196 1418 1319 1470 1331"/>
                </a>
                <a xlink:href=""   id="sitemap-288" data-id="sitemap-288" class="sitemap">
                <polygon points="1470 1331 1442 1454 1493 1465 1520 1342"/>
                </a>
                <a xlink:href=""   id="sitemap-289" data-id="sitemap-289" class="sitemap">
                <polygon points="1548 1220 1498 1208 1470 1331 1520 1342"/>
                </a>
                <a xlink:href=""   id="sitemap-290" data-id="sitemap-290" class="sitemap">
                <polygon points="1520 1342 1493 1465 1543 1478 1570 1355"/>
                </a>
                <a xlink:href=""   id="sitemap-291" data-id="sitemap-291" class="sitemap">
                <polygon points="1600 1231 1548 1220 1520 1342 1570 1355"/>
                </a>
                <a xlink:href=""   id="sitemap-292" data-id="sitemap-292" class="sitemap">
                <polygon points="1624 1237 1620 1283 1596 1359 1570 1355 1600 1231"/>
                </a>
                <a xlink:href=""   id="sitemap-293" data-id="sitemap-293" class="sitemap">
                <polygon points="1626 1402 1608 1401 1594 1370 1596 1359 1570 1355 1543 1478 1605 1493"/>
                </a>
                <a xlink:href=""   id="sitemap-294" data-id="sitemap-294" class="sitemap">
                <polygon points="1688 1411 1626 1402 1605 1493 1667 1506"/>
                </a>
                <a xlink:href=""   id="sitemap-295" data-id="sitemap-295" class="sitemap">
                <polygon points="1750 1420 1743 1418 1688 1411 1667 1506 1728 1519"/>
                </a>
                <a xlink:href=""   id="sitemap-296" data-id="sitemap-296" class="sitemap">
                <polygon points="1811 1437 1750 1420 1728 1519 1789 1534"/>
                </a>
                <a xlink:href=""   id="sitemap-297" data-id="sitemap-297" class="sitemap">
                <polygon points="1851 1548 1789 1534 1811 1437 1839 1446"/>
                </a>
                <a class="container-siteplan" xlink:href=""   id="sitemap-298" data-id="sitemap-298" class="sitemap">
                <polygon points="407 895 383 1082 337 1396 323 1488 261 1788 231 1942 185 2102 129 2094 36 2586 300 2634 303 2655 271 2871 250 2916 218 2939 174 2950 108 3305 121 3309 86 3447 57 3635 25 3777 526 3898 644 3402 659 3372 732 3029 752 2986 1078 3067 1088 3065 1096 3346 1108 3407 1137 3436 1220 3453 1245 3414 1254 3304 1266 3229 1256 3215 1256 3140 1268 3027 1305 2630 1309 2520 1426 2519 1465 2029 1783 2070 1776 2051 1797 1927 1863 1656 1839 1446 1743 1418 1608 1401 1594 1370 1620 1283 1632 1175"/>
                </a>
                <a xlink:href=""   id="sitemap-299" data-id="sitemap-299" class="sitemap">
                <polygon points="835 807 813 910 873 924 897 822"/>
                </a>
                <a xlink:href=""   id="sitemap-300" data-id="sitemap-300" class="sitemap">
                <polygon points="897 822 873 924 935 939 958 837"/>
                </a>
                <a xlink:href=""   id="sitemap-301" data-id="sitemap-301" class="sitemap">
                <polygon points="919 718 859 704 835 807 897 822"/>
                </a>
                <a xlink:href=""   id="sitemap-302" data-id="sitemap-302" class="sitemap">
                <polygon points="982 733 919 718 897 822 958 837"/>
                </a>
                <a xlink:href=""   id="sitemap-303" data-id="sitemap-303" class="sitemap">
                <polygon points="958 837 935 939 996 953 1020 851"/>
                </a>
                <a xlink:href=""   id="sitemap-304" data-id="sitemap-304" class="sitemap">
                <polygon points="1043 748 982 733 958 837 1020 851"/>
                </a>
                <a xlink:href=""   id="sitemap-305" data-id="sitemap-305" class="sitemap">
                <polygon points="1020 851 996 953 1058 966 1080 866"/>
                </a>
                <a xlink:href=""   id="sitemap-306" data-id="sitemap-306" class="sitemap">
                <polygon points="1104 762 1043 748 1020 851 1080 866"/>
                </a>
                <a xlink:href=""   id="sitemap-307" data-id="sitemap-307" class="sitemap">
                <polygon points="1080 866 1058 966 1118 980 1143 880"/>
                </a>
                <a xlink:href=""   id="sitemap-308" data-id="sitemap-308" class="sitemap">
                <polygon points="1166 775 1104 762 1080 866 1143 880"/>
                </a>
                <a xlink:href=""   id="sitemap-309" data-id="sitemap-309" class="sitemap">
                <polygon points="1143 880 1118 980 1182 996 1205 894"/>
                </a>
                <a xlink:href=""   id="sitemap-310" data-id="sitemap-310" class="sitemap">
                <polygon points="1227 791 1166 775 1143 880 1205 894"/>
                </a>
                <a xlink:href=""   id="sitemap-311" data-id="sitemap-311" class="sitemap">
                <polygon points="1205 894 1182 996 1244 1010 1266 907"/>
                </a>
                <a xlink:href=""   id="sitemap-312" data-id="sitemap-312" class="sitemap">
                <polygon points="1288 803 1227 791 1205 894 1266 907"/>
                </a>
                <a xlink:href=""   id="sitemap-313" data-id="sitemap-313" class="sitemap">
                <polygon points="1266 907 1244 1010 1305 1022 1327 921"/>
                </a>
                <a xlink:href=""   id="sitemap-314" data-id="sitemap-314" class="sitemap">
                <polygon points="1351 819 1288 803 1266 907 1327 921"/>
                </a>
                <a xlink:href=""   id="sitemap-315" data-id="sitemap-315" class="sitemap">
                <polygon points="1327 921 1305 1022 1365 1036 1387 934"/>
                </a>
                <a xlink:href=""   id="sitemap-316" data-id="sitemap-316" class="sitemap">
                <polygon points="1411 831 1351 819 1327 921 1387 934"/>
                </a>
                <a xlink:href=""   id="sitemap-317" data-id="sitemap-317" class="sitemap">
                <polygon points="1472 847 1411 831 1387 934 1450 950"/>
                </a>
                <a xlink:href=""   id="sitemap-318" data-id="sitemap-318" class="sitemap">
                <polygon points="1428 1050 1365 1036 1387 934 1450 950"/>
                </a>
                <a xlink:href=""   id="sitemap-319" data-id="sitemap-319" class="sitemap">
                <polygon points="1450 950 1428 1050 1486 1064 1511 964"/>
                </a>
                <a xlink:href=""   id="sitemap-320" data-id="sitemap-320" class="sitemap">
                <polygon points="1534 859 1472 847 1450 950 1511 964"/>
                </a>
                <a xlink:href=""   id="sitemap-321" data-id="sitemap-321" class="sitemap">
                <polygon points="1548 1078 1486 1064 1511 964 1571 978"/>
                </a>
                <a xlink:href=""   id="sitemap-322" data-id="sitemap-322" class="sitemap">
                <polygon points="1595 873 1534 859 1511 964 1571 978"/>
                </a>
                <a xlink:href=""   id="sitemap-323" data-id="sitemap-323" class="sitemap">
                <polygon points="1609 1093 1548 1078 1571 978 1634 992"/>
                </a>
                <a xlink:href=""   id="sitemap-324" data-id="sitemap-324" class="sitemap">
                <polygon points="1656 888 1595 873 1571 978 1634 992"/>
                </a>
                <a xlink:href=""   id="sitemap-325" data-id="sitemap-325" class="sitemap">
                <polygon points="1690 1003 1668 1109 1609 1093 1634 992"/>
                </a>
                <a xlink:href=""   id="sitemap-326" data-id="sitemap-326" class="sitemap">
                <polygon points="1690 1003 1634 992 1656 888 1715 901"/>
                </a>
                <a xlink:href=""   id="sitemap-327" data-id="sitemap-327" class="sitemap">
                <polygon points="460 722 455 827 475 831 498 732"/>
                </a>
                <a xlink:href=""   id="sitemap-328" data-id="sitemap-328" class="sitemap">
                <polygon points="498 732 475 831 535 845 560 744"/>
                </a>
                <a xlink:href=""   id="sitemap-329" data-id="sitemap-329" class="sitemap">
                <polygon points="560 744 621 761 596 861 535 845"/>
                </a>
                <a xlink:href=""   id="sitemap-330" data-id="sitemap-330" class="sitemap">
                <polygon points="621 761 683 773 659 875 596 861"/>
                </a>
                <a xlink:href=""   id="sitemap-331" data-id="sitemap-331" class="sitemap">
                <polygon points="744 785 719 890 659 875 683 773"/>
                </a>
                <a xlink:href=""   id="sitemap-332" data-id="sitemap-332" class="sitemap">
                <polygon points="706 670 769 683 744 785 683 773"/>
                </a>
                <a xlink:href=""   id="sitemap-333" data-id="sitemap-333" class="sitemap">
                <polygon points="644 656 706 670 683 773 621 761"/>
                </a>
                <a xlink:href=""   id="sitemap-334" data-id="sitemap-334" class="sitemap">
                <polygon points="585 643 644 656 621 761 560 744"/>
                </a>
                <a xlink:href=""   id="sitemap-335" data-id="sitemap-335" class="sitemap">
                <polygon points="522 628 585 643 560 744 498 732"/>
                </a>
                <a xlink:href=""   id="sitemap-336" data-id="sitemap-336" class="sitemap">
                <polygon points="470 616 522 628 498 732 460 722"/>
                </a>
                <a xlink:href=""   id="sitemap-337" data-id="sitemap-337" class="sitemap">
                <polygon points="499 449 478 521 484 445"/>
                </a>
                <a xlink:href=""   id="sitemap-338" data-id="sitemap-338" class="sitemap">
                <polygon points="537 567 478 553 478 521 499 449 559 464"/>
                </a>
                <a xlink:href=""   id="sitemap-339" data-id="sitemap-339" class="sitemap">
                <polygon points="596 580 537 567 559 464 620 478"/>
                </a>
                <a xlink:href=""   id="sitemap-340" data-id="sitemap-340" class="sitemap">
                <polygon points="620 478 683 492 657 594 596 580"/>
                </a>
                <a xlink:href=""   id="sitemap-341" data-id="sitemap-341" class="sitemap">
                <polygon points="719 608 657 594 683 492 743 506"/>
                </a>
                <a xlink:href=""   id="sitemap-342" data-id="sitemap-342" class="sitemap">
                <polygon points="804 520 782 624 719 608 743 506"/>
                </a>
                <a xlink:href=""   id="sitemap-343" data-id="sitemap-343" class="sitemap">
                <polygon points="766 404 828 417 804 520 743 506"/>
                </a>
                <a xlink:href=""   id="sitemap-344" data-id="sitemap-344" class="sitemap">
                <polygon points="706 390 766 404 743 506 683 492"/>
                </a>
                <a xlink:href=""   id="sitemap-345" data-id="sitemap-345" class="sitemap">
                <polygon points="644 376 706 390 683 492 620 478"/>
                </a>
                <a xlink:href=""   id="sitemap-346" data-id="sitemap-346" class="sitemap">
                <polygon points="583 362 644 376 620 478 559 464"/>
                </a>
                <a xlink:href=""   id="sitemap-347" data-id="sitemap-347" class="sitemap">
                <polygon points="524 350 583 362 559 464 499 449"/>
                </a>
                <a xlink:href=""   id="sitemap-348" data-id="sitemap-348" class="sitemap">
                <polygon points="490 340 524 350 499 449 484 445"/>
                </a>
                <a xlink:href=""   id="sitemap-349" data-id="sitemap-349" class="sitemap">
                <polygon points="866 256 841 360 492 279 498 262 802 319 817 244"/>
                </a>
                <a xlink:href=""   id="sitemap-350" data-id="sitemap-350" class="sitemap">
                <polygon points="829 136 887 152 866 256 817 244"/>
                </a>
                <a xlink:href=""   id="sitemap-351" data-id="sitemap-351" class="sitemap">
                <polygon points="1182 712 1731 842 1746 761 1231 692 1234 624 1204 613"/>
                </a>
                <a xlink:href=""   id="sitemap-352" data-id="sitemap-352" class="sitemap">
                <polygon points="1204 613 1182 712 1120 699 1142 601"/>
                </a>
                <a xlink:href=""   id="sitemap-353" data-id="sitemap-353" class="sitemap">
                <polygon points="1142 601 1120 699 1058 686 1082 586"/>
                </a>
                <a xlink:href=""   id="sitemap-354" data-id="sitemap-354" class="sitemap">
                <polygon points="1082 586 1058 686 996 672 1021 570"/>
                </a>
                <a xlink:href=""   id="sitemap-355" data-id="sitemap-355" class="sitemap">
                <polygon points="1021 570 996 672 934 659 959 560"/>
                </a>
                <a xlink:href=""   id="sitemap-356" data-id="sitemap-356" class="sitemap">
                <polygon points="959 560 934 659 873 644 897 545"/>
                </a>
                <a xlink:href=""   id="sitemap-357" data-id="sitemap-357" class="sitemap">
                <polygon points="1229 510 1241 514 1234 624 1204 613"/>
                </a>
                <a xlink:href=""   id="sitemap-358" data-id="sitemap-358" class="sitemap">
                <polygon points="1168 497 1229 510 1204 613 1142 601"/>
                </a>
                <a xlink:href=""   id="sitemap-359" data-id="sitemap-359" class="sitemap">
                <polygon points="1105 483 1168 497 1142 601 1082 586"/>
                </a>
                <a xlink:href=""   id="sitemap-360" data-id="sitemap-360" class="sitemap">
                <polygon points="1043 467 1105 483 1082 586 1021 570"/>
                </a>
                <a xlink:href=""   id="sitemap-361" data-id="sitemap-361" class="sitemap">
                <polygon points="983 455 1043 467 1021 570 959 560"/>
                </a>
                <a xlink:href=""   id="sitemap-362" data-id="sitemap-362" class="sitemap">
                <polygon points="920 440 983 455 959 560 897 545"/>
                </a>
                <a xlink:href=""   id="sitemap-363" data-id="sitemap-363" class="sitemap">id="sitemap
                <polygon points="1040 191 979 171 959 279 1021 288"/>
                </a>
                <a xlink:href=""   id="sitemap-364" data-id="sitemap-364" class="sitemap">
                <polygon points="1102 204 1040 191 1021 288 1079 305"/>
                </a>
                <a xlink:href=""   id="sitemap-365" data-id="sitemap-365" class="sitemap">
                <polygon points="995 389 933 380 959 279 1021 288"/>
                </a>
                <a xlink:href=""   id="sitemap-366" data-id="sitemap-366" class="sitemap">
                <polygon points="1057 402 995 389 1021 288 1079 305"/>
                </a>
                <a xlink:href=""   id="sitemap-367" data-id="sitemap-367" class="sitemap">
                <polygon points="1119 419 1057 402 1079 305 1141 321"/>
                </a>
                <a xlink:href=""   id="sitemap-368" data-id="sitemap-368" class="sitemap">
                <polygon points="1164 214 1102 204 1079 305 1141 321"/>
                </a>
                <a xlink:href=""   id="sitemap-369" data-id="sitemap-369" class="sitemap">
                <polygon points="1184 432 1119 419 1141 321 1203 334"/>
                </a>
                <a xlink:href=""   id="sitemap-370" data-id="sitemap-370" class="sitemap">
                <polygon points="1223 230 1164 214 1141 321 1203 334"/>
                </a>
                <a xlink:href=""   id="sitemap-371" data-id="sitemap-371" class="sitemap">
                <polygon points="1245 448 1184 432 1203 334 1255 347"/>
                </a>
                <a xlink:href=""   id="sitemap-372" data-id="sitemap-372" class="sitemap">
                <polygon points="1258 233 1223 230 1203 334 1255 347"/>
                </a>
                <a xlink:href=""   id="sitemap-373" data-id="sitemap-373" class="sitemap">
                <polygon points="910 48 904 96 839 77 846 36"/>
                </a>
                <a xlink:href=""   id="sitemap-374" data-id="sitemap-374" class="sitemap">
                <polygon points="1008 67 995 109 1262 174 1264 125"/>
                </a>
                <a class="container-siteplan" xlink:href=""   id="sitemap-375" data-id="sitemap-375" class="sitemap">
                <polygon points="846 36 1264 125 1231 692 1746 761 1653 1170 409 878 414 843 452 836 498 262 802 319"/>
                </a>
                </svg>
            </div>
        </div>
    </div>
  </div>
</div>
<?php }else { ?>
<div class="modal fade bd-example-modal-lg" id="sitemapModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Pilih Sitemap</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row p-1 justify-content-center">
            <?php $booking = 0; $lunas = 0; $realisasi = 0;?>
            <?php foreach($kavling as $k){ ?>
                <?php if($k->status_kavling == 0){ ?>
                    <?php $booking++ ?>
                <?php } else if($k->status_kavling == 1){ ?>
                    <?php $lunas++ ?>
                <?php } else if($k->status_kavling == 2){ ?>
                    <?php $realisasi++ ?>
                <?php } ?>
            <?php } ?>
            <div class="col-3 rounded m-1 p-1 text-center text-dark" style="background-color: #f6e05e"><?= $lunas ?> Unit Booking</div> 
            <div class="col-3 rounded m-1 p-1 text-light text-center" style="background-color: #718096"><?= $booking ?> Unit Available</div>
            <div class="col-3 rounded m-1 p-1 text-light text-center" style="background-color: #db2528"><?= $realisasi ?> Unit Lunas</div>
        </div>
        <div class="container">
        <svg color="white" style="background-color:white" id="svg2" version="1.1" viewBox="0 0 1877 2000" xmlns="http://www.w3.org/2000/svg"  height="695" xmlns:xlink="http://www.w3.org/1999/xlink">
                <a xlink:href="" id="sitemap-376" data-id="sitemap-376" class="sitemap"><polygon points="975,267 974,285 1011,286 1012,268 975,267" /></a>
                <a xlink:href="" id="sitemap-377" data-id="sitemap-377" class="sitemap"><polygon points="1012,268 1011,286 1043,288 1045,269 1012,268" /></a>
                <a xlink:href="" id="sitemap-378" data-id="sitemap-378" class="sitemap"><polygon points="975,248 975,267 1012,268 1013,249 975,248" /></a>
                <a xlink:href="" id="sitemap-379" data-id="sitemap-379" class="sitemap"><polygon points="1013,249 1012,268 1045,269 1044,251 1013,249" /></a>
                <a xlink:href="" id="sitemap-380" data-id="sitemap-380" class="sitemap"><polygon points="975,229 975,248 1013,249 1014,232 975,229" /></a>
                <a xlink:href="" id="sitemap-381" data-id="sitemap-381" class="sitemap"><polygon points="1014,232 1013,249 1044,251 1045,232 1014,232" /></a>
                <a xlink:href="" id="sitemap-382" data-id="sitemap-382" class="sitemap"><polygon points="976,210 975,229 1014,232 1014,211 976,210" /></a>
                <a xlink:href="" id="sitemap-383" data-id="sitemap-383" class="sitemap"><polygon points="1014,211 1014,232 1045,232 1045,212 1014,211" /></a>
                <a xlink:href="" id="sitemap-384" data-id="sitemap-384" class="sitemap"><polygon points="976,188 976,210 1014,211 1014,189 976,188" /></a>
                <a xlink:href="" id="sitemap-385" data-id="sitemap-385" class="sitemap"><polygon points="1046,190 1045,212 1014,211 1014,189 1046,190" /></a>
                <a xlink:href="" id="sitemap-386" data-id="sitemap-386" class="sitemap"><polygon points="956,248 955,285 933,284 934,246 938,246 956,248" /></a>
                <a xlink:href="" id="sitemap-387" data-id="sitemap-387" class="sitemap"><polygon points="939,208 958,209 956,248 938,246 939,208" /></a>
                <a xlink:href="" id="sitemap-388" data-id="sitemap-388" class="sitemap"><polygon points="918,245 934,246 933,284 910,282 911,245 918,245" /></a>
                <a xlink:href="" id="sitemap-389" data-id="sitemap-389" class="sitemap"><polygon points="920,207 939,208 938,246 918,245 920,207" /></a>
                <a xlink:href="" id="sitemap-390" data-id="sitemap-390" class="sitemap"><polygon points="911,245 910,282 888,283 889,244 898,245 911,245" /></a>
                <a xlink:href="" id="sitemap-391" data-id="sitemap-391" class="sitemap"><polygon points="900,207 920,207 918,245 898,245 900,207" /></a>
                <a xlink:href="" id="sitemap-392" data-id="sitemap-392" class="sitemap"><polygon points="881,206 900,207 898,245 889,244 880,243 881,206" /></a>
                <a xlink:href="" id="sitemap-393" data-id="sitemap-393" class="sitemap"><polygon points="880,243 889,244 888,283 866,282 867,244 880,243" /></a>
                <a xlink:href="" id="sitemap-394" data-id="sitemap-394" class="sitemap"><polygon points="862,205 881,206 880,243 867,244 861,244 862,205" /></a>
                <a xlink:href="" id="sitemap-395" data-id="sitemap-395" class="sitemap"><polygon points="861,244 867,244 866,282 844,280 845,243 861,244" /></a>
                <a xlink:href="" id="sitemap-396" data-id="sitemap-396" class="sitemap"><polygon points="844,204 862,205 861,244 845,243 843,243 844,204" /></a>
                <a xlink:href="" id="sitemap-397" data-id="sitemap-397" class="sitemap"><polygon points="843,243 845,243 844,280 822,280 823,241 843,243" /></a>
                <a xlink:href="" id="sitemap-398" data-id="sitemap-398" class="sitemap"><polygon points="825,204 844,204 843,243 823,241 825,204" /></a>
                <a xlink:href="" id="sitemap-399" data-id="sitemap-399" class="sitemap"><polygon points="823,241 822,280 799,279 801,241 805,241 823,241" /></a>
                <a xlink:href="" id="sitemap-400" data-id="sitemap-400" class="sitemap"><polygon points="806,203 825,204 823,241 805,241 806,203" /></a>
                <a xlink:href="" id="sitemap-401" data-id="sitemap-401" class="sitemap"><polygon points="801,241 805,241 806,203 787,203 786,240 801,241" /></a>
                <a xlink:href="" id="sitemap-402" data-id="sitemap-402" class="sitemap"><polygon points="778,240 786,240 801,241 799,279 778,278 778,240" /></a>
                <a xlink:href="" id="sitemap-403" data-id="sitemap-403" class="sitemap"><polygon points="778,240 778,278 756,278 757,239 778,240" /></a>
                <a xlink:href="" id="sitemap-404" data-id="sitemap-404" class="sitemap"><polygon points="768,202 787,203 786,240 766,240 768,202" /></a>
                <a xlink:href="" id="sitemap-405" data-id="sitemap-405" class="sitemap"><polygon points="749,201 768,202 766,240 757,239 748,239 749,201" /></a>
                <a xlink:href="" id="sitemap-406" data-id="sitemap-406" class="sitemap"><polygon points="748,239 757,239 756,278 733,277 735,238 748,239" /></a>
                <a xlink:href="" id="sitemap-407" data-id="sitemap-407" class="sitemap"><polygon points="730,200 749,201 748,239 735,238 728,237 730,200" /></a>
                <a xlink:href="" id="sitemap-408" data-id="sitemap-408" class="sitemap"><polygon points="730,200 728,237 721,237 725,199 730,200" /></a>
                <a xlink:href="" id="sitemap-409" data-id="sitemap-409" class="sitemap"><polygon points="735,238 733,277 715,276 721,237 735,238" /></a>
                <a xlink:href="" id="sitemap-410" data-id="sitemap-410" class="sitemap"><polygon points="673,167 658,274 641,273 643,163 673,167" /></a>
                <a xlink:href="" id="sitemap-411" data-id="sitemap-411" class="sitemap"><polygon points="699,258 697,275 658,274 662,252 699,258" /></a>
                <a xlink:href="" id="sitemap-412" data-id="sitemap-412" class="sitemap"><polygon points="702,238 699,258 662,252 663,233 702,238" /></a>
                <a xlink:href="" id="sitemap-413" data-id="sitemap-413" class="sitemap"><polygon points="703,221 702,238 663,233 666,214 703,221" /></a>
                <a xlink:href="" id="sitemap-414" data-id="sitemap-414" class="sitemap"><polygon points="706,200 703,221 666,214 669,195 706,200" /></a>
                <a xlink:href="" id="sitemap-415" data-id="sitemap-415" class="sitemap"><polygon points="709,180 706,200 669,195 672,176 709,180" /></a>
                <a xlink:href="" id="sitemap-416" data-id="sitemap-416" class="sitemap"><polygon points="673,167 672,176 709,180 710,171 673,167" /></a>
                <a xlink:href="" id="sitemap-417" data-id="sitemap-417" class="sitemap"><polygon points="732,368 740,304 663,301 663,310 719,318 713,366 732,368" /></a>
                <a xlink:href="" id="sitemap-418" data-id="sitemap-418" class="sitemap"><polygon points="713,366 719,318 663,310 656,358 713,366" /></a>
                <a xlink:href="" id="sitemap-419" data-id="sitemap-419" class="sitemap"><polygon points="649,414 646,434 684,438 686,420 649,414" /></a>
                <a xlink:href="" id="sitemap-420" data-id="sitemap-420" class="sitemap"><polygon points="686,420 684,438 721,445 724,425 686,420" /></a>
                <a xlink:href="" id="sitemap-421" data-id="sitemap-421" class="sitemap"><polygon points="652,396 649,414 686,420 689,401 652,396" /></a>
                <a xlink:href="" id="sitemap-422" data-id="sitemap-422" class="sitemap"><polygon points="689,401 686,420 724,425 726,406 689,401" /></a>
                <a xlink:href="" id="sitemap-423" data-id="sitemap-423" class="sitemap"><polygon points="653,378 652,396 689,401 691,383 653,378" /></a>
                <a xlink:href="" id="sitemap-424" data-id="sitemap-424" class="sitemap"><polygon points="729,388 726,406 689,401 691,383 729,388" /></a>
                <a xlink:href="" id="sitemap-425" data-id="sitemap-425" class="sitemap"><polygon points="693,363 656,358 653,378 691,383 693,363" /></a>
                <a xlink:href="" id="sitemap-426" data-id="sitemap-426" class="sitemap"><polygon points="732,368 693,363 691,383 729,388 732,368" /></a>
                <a xlink:href="" id="sitemap-427" data-id="sitemap-427" class="sitemap"><polygon points="743,429 741,446 778,451 780,433 743,429" /></a>
                <a xlink:href="" id="sitemap-428" data-id="sitemap-428" class="sitemap"><polygon points="780,433 778,451 816,456 820,437 780,433" /></a>
                <a xlink:href="" id="sitemap-429" data-id="sitemap-429" class="sitemap"><polygon points="745,409 743,429 780,433 783,415 745,409" /></a>
                <a xlink:href="" id="sitemap-430" data-id="sitemap-430" class="sitemap"><polygon points="783,415 780,433 820,437 821,419 783,415" /></a>
                <a xlink:href="" id="sitemap-431" data-id="sitemap-431" class="sitemap"><polygon points="748,390 745,409 783,415 786,395 748,390" /></a>
                <a xlink:href="" id="sitemap-432" data-id="sitemap-432" class="sitemap"><polygon points="786,395 783,415 821,419 823,400 786,395" /></a>
                <a xlink:href="" id="sitemap-433" data-id="sitemap-433" class="sitemap"><polygon points="750,373 748,390 786,395 788,376 750,373" /></a>
                <a xlink:href="" id="sitemap-434" data-id="sitemap-434" class="sitemap"><polygon points="788,376 786,395 823,400 826,381 788,376" /></a>
                <a xlink:href="" id="sitemap-435" data-id="sitemap-435" class="sitemap"><polygon points="754,353 750,373 788,376 790,357 754,353" /></a>
                <a xlink:href="" id="sitemap-436" data-id="sitemap-436" class="sitemap"><polygon points="790,357 788,376 826,381 827,363 790,357" /></a>
                <a xlink:href="" id="sitemap-437" data-id="sitemap-437" class="sitemap"><polygon points="756,333 754,353 790,357 792,338 756,333" /></a>
                <a xlink:href="" id="sitemap-438" data-id="sitemap-438" class="sitemap"><polygon points="759,313 756,333 792,338 796,320 759,313" /></a>
                <a xlink:href="" id="sitemap-439" data-id="sitemap-439" class="sitemap"><polygon points="797,308 759,306 759,313 796,320 797,308" /></a>
                <a xlink:href="" id="sitemap-440" data-id="sitemap-440" class="sitemap"><polygon points="831,345 827,363 790,357 792,338 831,345" /></a>
                <a xlink:href="" id="sitemap-441" data-id="sitemap-441" class="sitemap"><polygon points="833,324 831,345 792,338 796,320 833,324" /></a>
                <a xlink:href="" id="sitemap-442" data-id="sitemap-442" class="sitemap"><polygon points="835,308 833,324 796,320 797,308 835,308" /></a>
                <a xlink:href="" id="sitemap-443" data-id="sitemap-443" class="sitemap"><polygon points="837,440 835,458 872,463 874,446 837,440" /></a>
                <a xlink:href="" id="sitemap-444" data-id="sitemap-444" class="sitemap"><polygon points="840,421 837,440 874,446 878,427 840,421" /></a>
                <a xlink:href="" id="sitemap-445" data-id="sitemap-445" class="sitemap"><polygon points="842,403 840,421 878,427 879,408 842,403" /></a>
                <a xlink:href="" id="sitemap-446" data-id="sitemap-446" class="sitemap"><polygon points="845,383 842,403 879,408 883,390 845,383" /></a>
                <a xlink:href="" id="sitemap-447" data-id="sitemap-447" class="sitemap"><polygon points="848,366 845,383 883,390 884,369 848,366" /></a>
                <a xlink:href="" id="sitemap-448" data-id="sitemap-448" class="sitemap"><polygon points="850,347 848,366 884,369 888,351 850,347" /></a>
                <a xlink:href="" id="sitemap-449" data-id="sitemap-449" class="sitemap"><polygon points="852,326 850,347 888,351 890,332 852,326" /></a>
                <a xlink:href="" id="sitemap-450" data-id="sitemap-450" class="sitemap"><polygon points="893,312 853,309 852,326 890,332 893,312" /></a>
                <a xlink:href="" id="sitemap-451" data-id="sitemap-451" class="sitemap"><polygon points="883,464 872,463 893,312 883,464" /></a>
                <a xlink:href="" id="sitemap-452" data-id="sitemap-452" class="sitemap"><polygon points="870,483 881,485 879,523 865,521 870,483" /></a>
                <a xlink:href="" id="sitemap-453" data-id="sitemap-453" class="sitemap"><polygon points="851,480 870,483 865,521 846,518 851,480" /></a>
                <a xlink:href="" id="sitemap-454" data-id="sitemap-454" class="sitemap"><polygon points="851,480 846,518 827,514 831,477 851,480" /></a>
                <a xlink:href="" id="sitemap-455" data-id="sitemap-455" class="sitemap"><polygon points="842,555 821,553 827,514 846,518 842,555" /></a>
                <a xlink:href="" id="sitemap-456" data-id="sitemap-456" class="sitemap"><polygon points="793,652 794,664 832,663 832,651 793,652" /></a>
                <a xlink:href="" id="sitemap-457" data-id="sitemap-457" class="sitemap"><polygon points="793,633 793,652 832,651 831,631 793,633" /></a>
                <a xlink:href="" id="sitemap-458" data-id="sitemap-458" class="sitemap"><polygon points="793,613 793,633 831,631 831,613 793,613" /></a>
                <a xlink:href="" id="sitemap-459" data-id="sitemap-459" class="sitemap"><polygon points="792,595 793,613 831,613 830,594 792,595" /></a>
                <a xlink:href="" id="sitemap-460" data-id="sitemap-460" class="sitemap"><polygon points="829,574 792,575 792,595 830,594 829,574" /></a>
                <a xlink:href="" id="sitemap-461" data-id="sitemap-461" class="sitemap"><polygon points="840,574 829,574 832,663 840,574" /></a>
                <a xlink:href="" id="sitemap-462" data-id="sitemap-462" class="sitemap"><polygon points="775,653 775,664 739,664 738,653 775,653" /></a>
                <a xlink:href="" id="sitemap-463" data-id="sitemap-463" class="sitemap"><polygon points="775,635 775,653 738,653 736,633 775,635" /></a>
                <a xlink:href="" id="sitemap-464" data-id="sitemap-464" class="sitemap"><polygon points="773,613 775,635 736,633 737,614 773,613" /></a>
                <a xlink:href="" id="sitemap-465" data-id="sitemap-465" class="sitemap"><polygon points="773,595 773,613 737,614 736,596 773,595" /></a>
                <a xlink:href="" id="sitemap-466" data-id="sitemap-466" class="sitemap"><polygon points="773,575 773,595 736,596 736,575 773,575" /></a>
                <a xlink:href="" id="sitemap-467" data-id="sitemap-467" class="sitemap"><polygon points="736,560 773,565 773,575 736,575 736,560" /></a>
                <a xlink:href="" id="sitemap-468" data-id="sitemap-468" class="sitemap"><polygon points="808,513 803,551 784,548 790,511 808,513" /></a>
                <a xlink:href="" id="sitemap-469" data-id="sitemap-469" class="sitemap"><polygon points="794,472 814,474 808,513 790,511 794,472" /></a>
                <a xlink:href="" id="sitemap-470" data-id="sitemap-470" class="sitemap"><polygon points="790,511 784,548 765,545 769,512 770,509 790,511" /></a>
                <a xlink:href="" id="sitemap-471" data-id="sitemap-471" class="sitemap"><polygon points="774,469 794,472 790,511 770,509 774,469" /></a>
                <a xlink:href="" id="sitemap-472" data-id="sitemap-472" class="sitemap"><polygon points="770,509 765,545 747,543 752,505 770,509" /></a>
                <a xlink:href="" id="sitemap-473" data-id="sitemap-473" class="sitemap"><polygon points="757,467 774,469 770,509 752,505 757,467" /></a>
                <a xlink:href="" id="sitemap-474" data-id="sitemap-474" class="sitemap"><polygon points="733,503 734,542 747,543 752,505 733,503" /></a>
                <a xlink:href="" id="sitemap-475" data-id="sitemap-475" class="sitemap"><polygon points="738,464 757,467 752,505 733,503 738,464" /></a>
                <a xlink:href="" id="sitemap-476" data-id="sitemap-476" class="sitemap"><polygon points="720,462 738,464 733,503 714,500 720,462" /></a>
                <a xlink:href="" id="sitemap-477" data-id="sitemap-477" class="sitemap"><polygon points="700,459 720,462 714,500 695,498 700,459" /></a>
                <a xlink:href="" id="sitemap-478" data-id="sitemap-478" class="sitemap"><polygon points="682,457 700,459 695,498 676,495 682,457" /></a>
                <a xlink:href="" id="sitemap-479" data-id="sitemap-479" class="sitemap"><polygon points="663,454 682,457 676,495 658,493 663,454" /></a>
                <a xlink:href="" id="sitemap-480" data-id="sitemap-480" class="sitemap"><polygon points="643,452 663,454 658,493 638,490 643,452" /></a>
                <a xlink:href="" id="sitemap-481" data-id="sitemap-481" class="sitemap"><polygon points="363,329 345,326 340,365 360,366 363,329" /></a>
                <a xlink:href="" id="sitemap-482" data-id="sitemap-482" class="sitemap"><polygon points="383,331 363,329 360,366 378,369 383,331" /></a>
                <a xlink:href="" id="sitemap-483" data-id="sitemap-483" class="sitemap"><polygon points="401,333 383,331 378,369 396,372 401,333" /></a>
                <a xlink:href="" id="sitemap-484" data-id="sitemap-484" class="sitemap"><polygon points="420,336 401,333 396,372 415,375 420,336" /></a>
                <a xlink:href="" id="sitemap-485" data-id="sitemap-485" class="sitemap"><polygon points="439,339 420,336 415,375 434,375 439,339" /></a>
                <a xlink:href="" id="sitemap-486" data-id="sitemap-486" class="sitemap"><polygon points="457,341 439,339 434,375 453,379 457,341" /></a>
                <a xlink:href="" id="sitemap-487" data-id="sitemap-487" class="sitemap"><polygon points="476,343 457,341 453,379 472,382 476,343" /></a>
                <a xlink:href="" id="sitemap-488" data-id="sitemap-488" class="sitemap"><polygon points="495,346 476,343 472,382 490,383 495,346" /></a>
                <a xlink:href="" id="sitemap-489" data-id="sitemap-489" class="sitemap"><polygon points="513,348 495,346 490,383 509,386 513,348" /></a>
                <a xlink:href="" id="sitemap-490" data-id="sitemap-490" class="sitemap"><polygon points="533,350 513,348 509,386 528,388 533,350" /></a>
                <a xlink:href="" id="sitemap-491" data-id="sitemap-491" class="sitemap"><polygon points="552,353 533,350 528,388 546,391 552,353" /></a>
                <a xlink:href="" id="sitemap-492" data-id="sitemap-492" class="sitemap"><polygon points="570,356 552,353 546,391 566,394 570,356" /></a>
                <a xlink:href="" id="sitemap-493" data-id="sitemap-493" class="sitemap"><polygon points="589,358 570,356 566,394 584,397 589,358" /></a>
                <a xlink:href="" id="sitemap-494" data-id="sitemap-494" class="sitemap"><polygon points="608,361 589,358 584,397 602,399 608,361" /></a>
                <a xlink:href="" id="sitemap-495" data-id="sitemap-495" class="sitemap"><polygon points="628,364 623,402 602,399 608,361 628,364" /></a>
                <a xlink:href="" id="sitemap-496" data-id="sitemap-496" class="sitemap"><polygon points="614,324 632,326 628,364 608,361 614,324" /></a>
                <a xlink:href="" id="sitemap-497" data-id="sitemap-497" class="sitemap"><polygon points="548,458 545,478 583,482 585,465 548,458" /></a>
                <a xlink:href="" id="sitemap-498" data-id="sitemap-498" class="sitemap"><polygon points="585,465 583,482 620,488 623,469 585,465" /></a>
                <a xlink:href="" id="sitemap-499" data-id="sitemap-499" class="sitemap"><polygon points="551,440 548,458 585,465 588,444 551,440" /></a>
                <a xlink:href="" id="sitemap-500" data-id="sitemap-500" class="sitemap"><polygon points="588,444 585,465 623,469 625,450 588,444" /></a>
                <a xlink:href="" id="sitemap-501" data-id="sitemap-501" class="sitemap"><polygon points="590,425 552,420 551,440 588,444 590,425" /></a>
                <a xlink:href="" id="sitemap-502" data-id="sitemap-502" class="sitemap"><polygon points="590,425 588,444 625,450 628,430 590,425" /></a>
                <a xlink:href="" id="sitemap-503" data-id="sitemap-503" class="sitemap"><polygon points="441,541 439,559 476,564 478,545 441,541" /></a>
                <a xlink:href="" id="sitemap-504" data-id="sitemap-504" class="sitemap"><polygon points="478,545 476,564 500,567 507,548 478,545" /></a>
                <a xlink:href="" id="sitemap-505" data-id="sitemap-505" class="sitemap"><polygon points="443,521 441,541 478,545 481,527 443,521" /></a>
                <a xlink:href="" id="sitemap-506" data-id="sitemap-506" class="sitemap"><polygon points="481,527 478,545 507,548 514,531 481,527" /></a>
                <a xlink:href="" id="sitemap-507" data-id="sitemap-507" class="sitemap"><polygon points="446,503 443,521 481,527 484,506 446,503" /></a>
                <a xlink:href="" id="sitemap-508" data-id="sitemap-508" class="sitemap"><polygon points="484,506 481,527 514,531 522,512 484,506" /></a>
                <a xlink:href="" id="sitemap-509" data-id="sitemap-509" class="sitemap"><polygon points="449,485 446,503 484,506 486,490 449,485" /></a>
                <a xlink:href="" id="sitemap-510" data-id="sitemap-510" class="sitemap"><polygon points="486,490 484,506 522,512 524,494 486,490" /></a>
                <a xlink:href="" id="sitemap-511" data-id="sitemap-511" class="sitemap"><polygon points="451,466 449,485 486,490 489,470 451,466" /></a>
                <a xlink:href="" id="sitemap-512" data-id="sitemap-512" class="sitemap"><polygon points="489,470 486,490 524,494 526,475 489,470" /></a>
                <a xlink:href="" id="sitemap-513" data-id="sitemap-513" class="sitemap"><polygon points="453,447 451,466 489,470 491,452 453,447" /></a>
                <a xlink:href="" id="sitemap-514" data-id="sitemap-514" class="sitemap"><polygon points="491,452 489,470 526,475 528,457 491,452" /></a>
                <a xlink:href="" id="sitemap-515" data-id="sitemap-515" class="sitemap"><polygon points="456,428 453,447 491,452 494,433 456,428" /></a>
                <a xlink:href="" id="sitemap-516" data-id="sitemap-516" class="sitemap"><polygon points="494,433 491,452 528,457 531,437 494,433" /></a>
                <a xlink:href="" id="sitemap-517" data-id="sitemap-517" class="sitemap"><polygon points="496,414 458,408 456,428 494,433 496,414" /></a>
                <a xlink:href="" id="sitemap-518" data-id="sitemap-518" class="sitemap"><polygon points="496,414 494,433 531,437 533,418 496,414" /></a>
                <a xlink:href="" id="sitemap-519" data-id="sitemap-519" class="sitemap"><polygon points="347,527 345,545 383,552 384,534 347,527" /></a>
                <a xlink:href="" id="sitemap-520" data-id="sitemap-520" class="sitemap"><polygon points="384,534 383,552 420,557 422,538 384,534" /></a>
                <a xlink:href="" id="sitemap-521" data-id="sitemap-521" class="sitemap"><polygon points="349,509 347,527 384,534 388,514 349,509" /></a>
                <a xlink:href="" id="sitemap-522" data-id="sitemap-522" class="sitemap"><polygon points="388,514 384,534 422,538 425,520 388,514" /></a>
                <a xlink:href="" id="sitemap-523" data-id="sitemap-523" class="sitemap"><polygon points="352,490 349,509 388,514 391,495 352,490" /></a>
                <a xlink:href="" id="sitemap-524" data-id="sitemap-524" class="sitemap"><polygon points="391,495 388,514 425,520 428,499 391,495" /></a>
                <a xlink:href="" id="sitemap-525" data-id="sitemap-525" class="sitemap"><polygon points="354,472 352,490 391,495 392,477 354,472" /></a>
                <a xlink:href="" id="sitemap-526" data-id="sitemap-526" class="sitemap"><polygon points="392,477 391,495 428,499 430,481 392,477" /></a>
                <a xlink:href="" id="sitemap-527" data-id="sitemap-527" class="sitemap"><polygon points="357,452 354,472 392,477 394,458 357,452" /></a>
                <a xlink:href="" id="sitemap-528" data-id="sitemap-528" class="sitemap"><polygon points="394,458 392,477 430,481 432,463 394,458" /></a>
                <a xlink:href="" id="sitemap-529" data-id="sitemap-529" class="sitemap"><polygon points="359,435 357,452 394,458 397,441 359,435" /></a>
                <a xlink:href="" id="sitemap-530" data-id="sitemap-530" class="sitemap"><polygon points="397,441 394,458 432,463 436,445 397,441" /></a>
                <a xlink:href="" id="sitemap-531" data-id="sitemap-531" class="sitemap"><polygon points="362,415 359,435 397,441 400,419 362,415" /></a>
                <a xlink:href="" id="sitemap-532" data-id="sitemap-532" class="sitemap"><polygon points="400,419 397,441 436,445 437,425 400,419" /></a>
                <a xlink:href="" id="sitemap-533" data-id="sitemap-533" class="sitemap"><polygon points="402,400 440,405 437,425 400,419 402,400" /></a>
                <a xlink:href="" id="sitemap-534" data-id="sitemap-534" class="sitemap"><polygon points="365,395 362,415 400,419 402,400 365,395" /></a>
                <a xlink:href="" id="sitemap-535" data-id="sitemap-535" class="sitemap"><polygon points="253,515 251,533 288,539 291,521 253,515" /></a>
                <a xlink:href="" id="sitemap-536" data-id="sitemap-536" class="sitemap"><polygon points="291,521 288,539 326,544 328,525 291,521" /></a>
                <a xlink:href="" id="sitemap-537" data-id="sitemap-537" class="sitemap"><polygon points="255,496 253,515 291,521 293,502 255,496" /></a>
                <a xlink:href="" id="sitemap-538" data-id="sitemap-538" class="sitemap"><polygon points="293,502 291,521 328,525 331,506 293,502" /></a>
                <a xlink:href="" id="sitemap-539" data-id="sitemap-539" class="sitemap"><polygon points="258,478 255,496 293,502 295,483 258,478" /></a>
                <a xlink:href="" id="sitemap-540" data-id="sitemap-540" class="sitemap"><polygon points="295,483 293,502 331,506 333,487 295,483" /></a>
                <a xlink:href="" id="sitemap-541" data-id="sitemap-541" class="sitemap"><polygon points="260,459 258,478 295,483 298,465 260,459" /></a>
                <a xlink:href="" id="sitemap-542" data-id="sitemap-542" class="sitemap"><polygon points="298,465 295,483 333,487 336,469 298,465" /></a>
                <a xlink:href="" id="sitemap-543" data-id="sitemap-543" class="sitemap"><polygon points="263,440 260,459 298,465 300,446 263,440" /></a>
                <a xlink:href="" id="sitemap-544" data-id="sitemap-544" class="sitemap"><polygon points="300,446 298,465 336,469 338,451 300,446" /></a>
                <a xlink:href="" id="sitemap-545" data-id="sitemap-545" class="sitemap"><polygon points="265,421 263,440 300,446 303,427 265,421" /></a>
                <a xlink:href="" id="sitemap-546" data-id="sitemap-546" class="sitemap"><polygon points="303,427 300,446 338,451 341,432 303,427" /></a>
                <a xlink:href="" id="sitemap-547" data-id="sitemap-547" class="sitemap"><polygon points="268,403 265,421 303,427 306,408 268,403" /></a>
                <a xlink:href="" id="sitemap-548" data-id="sitemap-548" class="sitemap"><polygon points="306,408 303,427 341,432 344,413 306,408" /></a>
                <a xlink:href="" id="sitemap-549" data-id="sitemap-549" class="sitemap"><polygon points="308,388 271,383 268,403 306,408 308,388" /></a>
                <a xlink:href="" id="sitemap-550" data-id="sitemap-550" class="sitemap"><polygon points="308,388 306,408 344,413 346,392 308,388" /></a>
                <a xlink:href="" id="sitemap-551" data-id="sitemap-551" class="sitemap"><polygon points="240,330 237,350 275,356 276,337 240,330" /></a>
                <a xlink:href="" id="sitemap-552" data-id="sitemap-552" class="sitemap"><polygon points="276,337 275,356 312,360 315,341 276,337" /></a>
                <a xlink:href="" id="sitemap-553" data-id="sitemap-553" class="sitemap"><polygon points="242,313 240,330 276,337 279,318 242,313" /></a>
                <a xlink:href="" id="sitemap-554" data-id="sitemap-554" class="sitemap"><polygon points="279,318 276,337 315,341 317,323 279,318" /></a>
                <a xlink:href="" id="sitemap-555" data-id="sitemap-555" class="sitemap"><polygon points="244,294 242,313 279,318 281,299 244,294" /></a>
                <a xlink:href="" id="sitemap-556" data-id="sitemap-556" class="sitemap"><polygon points="281,299 279,318 317,323 319,304 281,299" /></a>
                <a xlink:href="" id="sitemap-557" data-id="sitemap-557" class="sitemap"><polygon points="247,276 244,294 281,299 285,281 247,276" /></a>
                <a xlink:href="" id="sitemap-558" data-id="sitemap-558" class="sitemap"><polygon points="285,281 281,299 319,304 322,285 285,281" /></a>
                <a xlink:href="" id="sitemap-559" data-id="sitemap-559" class="sitemap"><polygon points="249,257 247,276 285,281 286,262 249,257" /></a>
                <a xlink:href="" id="sitemap-560" data-id="sitemap-560" class="sitemap"><polygon points="286,262 285,281 322,285 325,266 286,262" /></a>
                <a xlink:href="" id="sitemap-561" data-id="sitemap-561" class="sitemap"><polygon points="252,238 249,257 286,262 289,243 252,238" /></a>
                <a xlink:href="" id="sitemap-562" data-id="sitemap-562" class="sitemap"><polygon points="289,243 286,262 325,266 327,247 289,243" /></a>
                <a xlink:href="" id="sitemap-563" data-id="sitemap-563" class="sitemap"><polygon points="255,219 252,238 289,243 292,224 255,219" /></a>
                <a xlink:href="" id="sitemap-564" data-id="sitemap-564" class="sitemap"><polygon points="292,224 289,243 327,247 329,228 292,224" /></a>
                <a xlink:href="" id="sitemap-565" data-id="sitemap-565" class="sitemap"><polygon points="257,201 255,219 292,224 295,205 257,201" /></a>
                <a xlink:href="" id="sitemap-566" data-id="sitemap-566" class="sitemap"><polygon points="295,205 292,224 329,228 332,210 295,205" /></a>
                <a xlink:href="" id="sitemap-567" data-id="sitemap-567" class="sitemap"><polygon points="259,181 257,201 295,205 297,187 259,181" /></a>
                <a xlink:href="" id="sitemap-568" data-id="sitemap-568" class="sitemap"><polygon points="297,187 295,205 332,210 335,190 297,187" /></a>
                <a xlink:href="" id="sitemap-569" data-id="sitemap-569" class="sitemap"><polygon points="261,162 259,181 297,187 300,167 261,162" /></a>
                <a xlink:href="" id="sitemap-570" data-id="sitemap-570" class="sitemap"><polygon points="300,167 297,187 335,190 337,172 300,167" /></a>
                <a xlink:href="" id="sitemap-571" data-id="sitemap-571" class="sitemap"><polygon points="303,148 264,144 261,162 300,167 303,148" /></a>
                <a xlink:href="" id="sitemap-572" data-id="sitemap-572" class="sitemap"><polygon points="303,148 300,167 337,172 339,153 303,148" /></a>
                <a xlink:href="" id="sitemap-573" data-id="sitemap-573" class="sitemap"><polygon points="304,137 341,141 339,153 303,148 304,137" /></a>
                <a xlink:href="" id="sitemap-574" data-id="sitemap-574" class="sitemap"><polygon points="266,130 264,144 303,148 304,137 266,130" /></a>
                <a xlink:href="" id="sitemap-575" data-id="sitemap-575" class="sitemap"><polygon points="136,106 132,106 128,109 122,145 131,145 136,106" /></a>
                <a xlink:href="" id="sitemap-576" data-id="sitemap-576" class="sitemap"><polygon points="151,108 136,106 131,145 146,146 151,108" /></a>
                <a xlink:href="" id="sitemap-577" data-id="sitemap-577" class="sitemap"><polygon points="173,112 151,108 146,146 168,149 173,112" /></a>
                <a xlink:href="" id="sitemap-578" data-id="sitemap-578" class="sitemap"><polygon points="190,116 173,112 168,149 186,152 190,116" /></a>
                <a xlink:href="" id="sitemap-579" data-id="sitemap-579" class="sitemap"><polygon points="190,116 186,152 205,156 210,121 190,116" /></a>
                <a xlink:href="" id="sitemap-580" data-id="sitemap-580" class="sitemap"><polygon points="210,121 205,156 224,157 228,125 210,121" /></a>
                <a xlink:href="" id="sitemap-581" data-id="sitemap-581" class="sitemap"><polygon points="247,128 242,160 224,157 228,125 247,128" /></a>
                <a xlink:href="" id="sitemap-582" data-id="sitemap-582" class="sitemap"><polygon points="111,200 106,237 118,240 122,200 111,200" /></a>
                <a xlink:href="" id="sitemap-583" data-id="sitemap-583" class="sitemap"><polygon points="128,163 118,161 111,200 122,200 128,163" /></a>
                <a xlink:href="" id="sitemap-584" data-id="sitemap-584" class="sitemap"><polygon points="122,200 118,240 137,241 142,204 122,200" /></a>
                <a xlink:href="" id="sitemap-585" data-id="sitemap-585" class="sitemap"><polygon points="147,165 128,163 122,200 142,204 147,165" /></a>
                <a xlink:href="" id="sitemap-586" data-id="sitemap-586" class="sitemap"><polygon points="142,204 137,241 155,244 160,208 142,204" /></a>
                <a xlink:href="" id="sitemap-587" data-id="sitemap-587" class="sitemap"><polygon points="165,168 147,165 142,204 160,208 165,168" /></a>
                <a xlink:href="" id="sitemap-588" data-id="sitemap-588" class="sitemap"><polygon points="160,208 155,244 174,246 179,210 160,208" /></a>
                <a xlink:href="" id="sitemap-589" data-id="sitemap-589" class="sitemap"><polygon points="184,170 165,168 160,208 179,210 184,170" /></a>
                <a xlink:href="" id="sitemap-590" data-id="sitemap-590" class="sitemap"><polygon points="179,210 174,246 193,250 198,212 179,210" /></a>
                <a xlink:href="" id="sitemap-591" data-id="sitemap-591" class="sitemap"><polygon points="203,173 184,170 179,210 198,212 203,173" /></a>
                <a xlink:href="" id="sitemap-592" data-id="sitemap-592" class="sitemap"><polygon points="198,212 193,250 212,251 217,213 198,212" /></a>
                <a xlink:href="" id="sitemap-593" data-id="sitemap-593" class="sitemap"><polygon points="222,176 203,173 198,212 217,213 222,176" /></a>
                <a xlink:href="" id="sitemap-594" data-id="sitemap-594" class="sitemap"><polygon points="235,215 240,178 222,176 217,213 235,215" /></a>
                <a xlink:href="" id="sitemap-595" data-id="sitemap-595" class="sitemap"><polygon points="231,253 235,215 217,213 212,251 231,253" /></a>
                <a xlink:href="" id="sitemap-596" data-id="sitemap-596" class="sitemap"><polygon points="97,294 91,329 105,333 110,295 97,294" /></a>
                <a xlink:href="" id="sitemap-597" data-id="sitemap-597" class="sitemap"><polygon points="114,256 103,255 97,294 110,295 114,256" /></a>
                <a xlink:href="" id="sitemap-598" data-id="sitemap-598" class="sitemap"><polygon points="110,295 105,333 124,336 129,298 110,295" /></a>
                <a xlink:href="" id="sitemap-599" data-id="sitemap-599" class="sitemap"><polygon points="133,259 114,256 110,295 129,298 133,259" /></a>
                <a xlink:href="" id="sitemap-600" data-id="sitemap-600" class="sitemap"><polygon points="129,298 124,336 143,337 147,301 129,298" /></a>
                <a xlink:href="" id="sitemap-601" data-id="sitemap-601" class="sitemap"><polygon points="152,262 133,259 129,298 147,301 152,262" /></a>
                <a xlink:href="" id="sitemap-602" data-id="sitemap-602" class="sitemap"><polygon points="147,301 143,337 161,340 166,303 147,301" /></a>
                <a xlink:href="" id="sitemap-603" data-id="sitemap-603" class="sitemap"><polygon points="171,264 152,262 147,301 166,303 171,264" /></a>
                <a xlink:href="" id="sitemap-604" data-id="sitemap-604" class="sitemap"><polygon points="166,303 161,340 180,343 184,306 166,303" /></a>
                <a xlink:href="" id="sitemap-605" data-id="sitemap-605" class="sitemap"><polygon points="190,267 171,264 166,303 184,306 190,267" /></a>
                <a xlink:href="" id="sitemap-606" data-id="sitemap-606" class="sitemap"><polygon points="184,306 180,343 199,346 204,307 184,306" /></a>
                <a xlink:href="" id="sitemap-607" data-id="sitemap-607" class="sitemap"><polygon points="209,268 190,267 184,306 204,307 209,268" /></a>
                <a xlink:href="" id="sitemap-608" data-id="sitemap-608" class="sitemap"><polygon points="222,310 227,271 209,268 204,307 222,310" /></a>
                <a xlink:href="" id="sitemap-609" data-id="sitemap-609" class="sitemap"><polygon points="218,346 222,310 204,307 199,346 218,346" /></a>
                <a xlink:href="" id="sitemap-610" data-id="sitemap-610" class="sitemap"><polygon points="96,397 91,435 110,439 115,400 96,397" /></a>
                <a xlink:href="" id="sitemap-611" data-id="sitemap-611" class="sitemap"><polygon points="120,363 100,360 96,397 115,400 120,363" /></a>
                <a xlink:href="" id="sitemap-612" data-id="sitemap-612" class="sitemap"><polygon points="115,400 110,439 129,441 134,404 115,400" /></a>
                <a xlink:href="" id="sitemap-613" data-id="sitemap-613" class="sitemap"><polygon points="139,365 120,363 115,400 134,404 139,365" /></a>
                <a xlink:href="" id="sitemap-614" data-id="sitemap-614" class="sitemap"><polygon points="134,404 129,441 147,444 153,407 134,404" /></a>
                <a xlink:href="" id="sitemap-615" data-id="sitemap-615" class="sitemap"><polygon points="157,367 139,365 134,404 153,407 157,367" /></a>
                <a xlink:href="" id="sitemap-616" data-id="sitemap-616" class="sitemap"><polygon points="153,407 147,444 166,446 171,409 153,407" /></a>
                <a xlink:href="" id="sitemap-617" data-id="sitemap-617" class="sitemap"><polygon points="177,370 157,367 153,407 171,409 177,370" /></a>
                <a xlink:href="" id="sitemap-618" data-id="sitemap-618" class="sitemap"><polygon points="171,409 166,446 186,448 191,411 171,409" /></a>
                <a xlink:href="" id="sitemap-619" data-id="sitemap-619" class="sitemap"><polygon points="195,372 177,370 171,409 191,411 195,372" /></a>
                <a xlink:href="" id="sitemap-620" data-id="sitemap-620" class="sitemap"><polygon points="191,411 186,448 204,451 208,414 191,411" /></a>
                <a xlink:href="" id="sitemap-621" data-id="sitemap-621" class="sitemap"><polygon points="213,376 195,372 191,411 208,414 213,376" /></a>
                <a xlink:href="" id="sitemap-622" data-id="sitemap-622" class="sitemap"><polygon points="208,414 204,451 222,453 227,415 208,414" /></a>
                <a xlink:href="" id="sitemap-623" data-id="sitemap-623" class="sitemap"><polygon points="232,377 213,376 208,414 227,415 232,377" /></a>
                <a xlink:href="" id="sitemap-624" data-id="sitemap-624" class="sitemap"><polygon points="246,417 252,380 232,377 227,415 244,417 246,417" /></a>
                <a xlink:href="" id="sitemap-625" data-id="sitemap-625" class="sitemap"><polygon points="242,456 246,417 227,415 222,453 242,456" /></a>
                <a xlink:href="" id="sitemap-626" data-id="sitemap-626" class="sitemap"><polygon points="201,469 163,463 161,483 199,487 201,469" /></a>
                <a xlink:href="" id="sitemap-627" data-id="sitemap-627" class="sitemap"><polygon points="236,493 239,474 201,469 199,487 236,493" /></a>
                <a xlink:href="" id="sitemap-628" data-id="sitemap-628" class="sitemap"><polygon points="199,487 161,483 159,502 196,507 199,487" /></a>
                <a xlink:href="" id="sitemap-629" data-id="sitemap-629" class="sitemap"><polygon points="235,511 236,493 199,487 196,507 235,511" /></a>
                <a xlink:href="" id="sitemap-630" data-id="sitemap-630" class="sitemap"><polygon points="196,507 159,502 156,520 194,526 196,507" /></a>
                <a xlink:href="" id="sitemap-631" data-id="sitemap-631" class="sitemap"><polygon points="194,526 196,507 235,511 233,530 194,526" /></a>
                <a xlink:href="" id="sitemap-632" data-id="sitemap-632" class="sitemap"><polygon points="194,526 233,530 232,540 193,539 194,526" /></a>
                <a xlink:href="" id="sitemap-633" data-id="sitemap-633" class="sitemap"><polygon points="154,540 156,520 194,526 193,539 154,540" /></a>
                <a xlink:href="" id="sitemap-634" data-id="sitemap-634" class="sitemap"><polygon points="107,457 69,452 67,470 104,475 107,457" /></a>
                <a xlink:href="" id="sitemap-635" data-id="sitemap-635" class="sitemap"><polygon points="142,481 144,461 107,457 104,475 142,481" /></a>
                <a xlink:href="" id="sitemap-636" data-id="sitemap-636" class="sitemap"><polygon points="104,475 67,470 64,490 102,495 104,475" /></a>
                <a xlink:href="" id="sitemap-637" data-id="sitemap-637" class="sitemap"><polygon points="140,499 142,481 104,475 102,495 140,499" /></a>
                <a xlink:href="" id="sitemap-638" data-id="sitemap-638" class="sitemap"><polygon points="102,495 64,490 62,509 100,513 102,495" /></a>
                <a xlink:href="" id="sitemap-639" data-id="sitemap-639" class="sitemap"><polygon points="138,517 140,499 102,495 100,513 138,517" /></a>
                <a xlink:href="" id="sitemap-640" data-id="sitemap-640" class="sitemap"><polygon points="100,513 62,509 59,527 97,532 100,513" /></a>
                <a xlink:href="" id="sitemap-641" data-id="sitemap-641" class="sitemap"><polygon points="135,536 138,517 100,513 97,532 135,536" /></a>
                <a xlink:href="" id="sitemap-642" data-id="sitemap-642" class="sitemap"><polygon points="135,539 135,536 97,532 97,539 135,539" /></a>
                <a xlink:href="" id="sitemap-643" data-id="sitemap-643" class="sitemap"><polygon points="97,539 97,532 59,527 58,539 97,539" /></a>
                <a xlink:href="" class="container-siteplan"><polygon points="25,540 75,388 91,329 128,109 143,99 218,124 369,145 346,319 559,353 605,337 641,287 643,163 782,181 1064,191 1066,327 893,312 878,527 845,523 832,663 739,664 733,503 551,478 511,593 281,539 25,540" /></a>
            </svg>
        </div>
    </div>
  </div>
    </div>
</div>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Transaksi Inhouse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p><span class="text-danger">*</span> Lengkapi Data Konsumen</p>
          <input type="hidden" name="id_konsumen" id="id_konsumen">
          <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                </div>
            </div>
            
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tempat Kerja</label>
                    <input type="text" name="tempat_kerja" id="tempat_kerja" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Gaji</label>
                    <input type="text" name="v_gaji" id="v_gaji" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="gaji" id="gaji" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Status Menikah</label>
                    <select name="status_menikah" id="status_menikah" class="form-control">
                        <option value="">--pilih--</option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="formPasangan d-none">
            <span><b class="text-danger">*</b>Data Pasangan</span>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik_p" id="nik_p" class="form-control" onkeyup="allowNumber()">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama_p" id="nama_p" class="form-control">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" name="no_hp_p" id="no_hp_p" class="form-control" onkeyup="allowNumber()">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email_p" id="email_p" class="form-control">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk_p" id="jk_p" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        
                        <select name="pekerjaan_p" id="pekerjaan_p" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="PNS">PNS</option>
                            <option value="TNI">TNI</option>
                            <option value="Polri">Polri</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Tenaga Kontrak">Tenaga Kontrak</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="BUMN">BUMN</option>
                            <option value="Honorer / Sukwan">Honorer / Sukwan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Tempat Kerja</label>
                        <input type="text" name="tmp_kerja_p" id="tmp_kerja_p" class="form-control">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Gaji</label>
                        <input type="text" name="v_gaji_p" id="v_gaji_p" class="form-control" onkeyup="allowIDR()">
                        <input type="text" hidden name="gaji_p" id="gaji_p" class="form-control">
                    </div>
                </div>
            </div>
        </div>


        <p><span class="text-danger">*</span> Rumah Pilihan</p>
        <div class="row">
            <div class="col-lg-4">
                <label>Pilih Cluster</label>
                <select class="form-control" name="cluster" id="cluster" disabled

                <?php
                $status_perum = $this->db->get_where('tbl_perumahan',['id_perumahan' => $this->session->userdata('id_perumahan')])->row()->cluster;
                if($status_perum == 0){
                ?>
                    disabled
                <?php } ?>

                >
                    <option value="">--Pilih--</option>
                    <?php foreach($cluster as $c){ ?>
                        <option value="<?= $c->id_cluster ?>"><?= $c->nama_cluster ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Pilih Blok</label>
                    <select name="id_rumah" id="id_rumah" class="form-control" disabled>
                        <?php if($status_perum == 1){ ?>
                            <option value="">--pilih--</option>
                        <?php } else if($status_perum == 0){ ?>
                                <option value="">--pilih--</option>
                            <?php foreach ($rumah as $r) { ?>
                                <option value="<?= $r->id_kavling ?>"><?= $r->blok ?></option>
                            <?php } ?>
                        <?php } ?>
                        
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Tipe</label>
                    <input type="text" disabled name="tipe" id="tipe" class="form-control">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Luas Tanah (m<sup>2</sup>)</label>
                    <input type="text" name="lt" id="lt" disabled class="form-control">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Luas Bangunan (m<sup>2</sup>)</label>
                    <input type="text" name="lb" id="lb" disabled class="form-control">
                </div>
            </div>           
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="text" disabled name="v_harga" id="v_harga" class="form-control">
                    <input type="text" disabled hidden name="harga" id="harga" class="form-control">
                </div>
            </div>
        </div>

        <p><span class="text-danger">*</span> Transaksi Inhouse</p>
        <div class="row">
            <div class="col-lg-6">
                <label>Tanda Jadi</label>
                <input type="text" name="v_tanda_jadi" id="v_tanda_jadi" class="form-control" onkeyup="allowIDR()">
                <input type="text" hidden name="tanda_jadi" id="tanda_jadi" class="form-control">
            </div>
            <div class="col-lg-6">
                <label>Tanggal Tanda Jadi</label>
                <input type="date" name="tanggal_tanda_jadi" id="tanggal_tanda_jadi" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Harga kesepakatan</label>
                    <input type="text" name="v_hk" id="v_hk" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="hk" id="hk" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Diangsur</label>
                    <input type="text" name="angsur_hk" id="angsur_hk" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Cicilan Angsuran</label>
                    <input type="text" name="v_cicil_angsur_hk" disabled id="v_cicil_angsur_hk" class="form-control">
                    <input type="text" hidden name="cicil_angsur_hk" disabled id="cicil_angsur_hk" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Bayar Setiap Tanggal</label>
                    <input type="text" name="tgl_bayar_hk" id="tgl_bayar_hk" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tanda Jadi Lokasi</label>
                    <input type="text" name="v_tjl" id="v_tjl" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="tjl" id="tjl" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Diangsur</label>
                    <input type="text" name="angsur_tjl" id="angsur_tjl" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Cicilan Angsuran</label>
                    <input type="text" disabled name="v_cicil_angsur_tjl" id="v_cicil_angsur_tjl" class="form-control">
                    <input type="text" disabled hidden name="cicil_angsur_tjl" id="cicil_angsur_tjl" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Bayar Setiap Tanggal</label>
                    <input type="text" name="tgl_bayar_tjl" id="tgl_bayar_tjl" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Uang Muka</label>
                    <input type="text" name="v_um" id="v_um" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="um" id="um" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Diangsur</label>
                    <input type="text" name="angsur_um" id="angsur_um" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Cicilan Angsuran</label>
                    <input type="text" disabled name="v_cicil_angsur_um" id="v_cicil_angsur_um" class="form-control">
                    <input type="text" disabled hidden name="cicil_angsur_um" id="cicil_angsur_um" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Bayar Setiap Tanggal</label>
                    <input type="text" name="tgl_bayar_um" id="tgl_bayar_um" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Kelebihan Tanah</label>
                    <input type="text" name="v_kt" id="v_kt" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="kt" id="kt" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Diangsur</label>
                    <input type="text" name="angsur_kt" id="angsur_kt" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Cicilan Angsuran</label>
                    <input type="text" disabled name="v_cicil_angsur_kt" id="v_cicil_angsur_kt" class="form-control" >
                    <input type="text" disabled hidden name="cicil_angsur_kt" id="cicil_angsur_kt" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Bayar Setiap Tanggal</label>
                    <input type="text" name="tgl_bayar_kt" id="tgl_bayar_kt" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm" id="save-transaksi-inhouse"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="viewTransaksiInhouse" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Detail Transaksi Inhouse</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive" id="detailTransaksiInhouse">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal edit -->
<div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-light" id="staticBackdropLabel">Edit Transaksi Inhouse</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_konsumen" id="id_konsumen_edit">
        <p>Data Konsumen</p>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" id="nik_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Nama Konsumen</label>
                    <input type="text" name="nama" id="nama_edit" class="form-control">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir_edit" class="form-control">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" id="jk_edit" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" name="no_hp" id="no_hp_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <select name="pekerjaan" id="pekerjaan_edit" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI">TNI</option>
                        <option value="Polri">Polri</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Tenaga Kontrak">Tenaga Kontrak</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="BUMN">BUMN</option>
                        <option value="Honorer / Sukwan">Honorer / Sukwan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" id="email_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Status Menikah</label>
                    <select name="status_menikah" id="status_menikah_edit" class="form-control">
                    <option value="">--Pilih--</option>
                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tempat Kerja</label>
                    <input type="text" name="tempat_kerja" id="tempat_kerja_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Gaji</label>
                    <input type="text" name="v_gaji" id="v_gaji_edit" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="gaji" id="gaji_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Dapat Info Dari</label>
                    <select name="info" id="info_edit" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="Banner">Banner</option>
                        <option value="Brosur">Brosur</option>
                        <option value="Teman">Teman</option>
                        <option value="Media Sosial">Media Sosial</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>


        <div class="formPasanganEdit">
            <span>Data Pasangan</span>
            <hr>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik_p" id="nik_pe" class="form-control" onkeyup="allowNumber()">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama_p" id="nama_pe" class="form-control">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" name="no_hp_p" id="no_hp_pe" class="form-control" onkeyup="allowNumber()">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email_p" id="email_pe" class="form-control">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk_p" id="jk_pe" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        
                        <select name="pekerjaan_p" id="pekerjaan_pe" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="PNS">PNS</option>
                            <option value="TNI">TNI</option>
                            <option value="Polri">Polri</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Tenaga Kontrak">Tenaga Kontrak</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="BUMN">BUMN</option>
                            <option value="Honorer / Sukwan">Honorer / Sukwan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Tempat Kerja</label>
                        <input type="text" name="tmp_kerja_p" id="tmp_kerja_pe" class="form-control">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Gaji</label>
                        <input type="text" name="v_gaji_p" id="v_gaji_pe" class="form-control" onkeyup="allowIDR()">
                        <input type="text" hidden name="gaji_p" id="gaji_pe" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
        </div>                    



        <p>Rumah</p>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Cluster</label>
                    <input type="text" name="cluster" id="cluster_edit" class="form-control" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Blok</label>
                    <input type="text" name="blok" id="blok_edit" class="form-control" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" id="type_edit" class="form-control" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Luas Tanah (m<sup>2</sup>)</label>
                    <input type="text" name="lt" id="lt_edit" class="form-control" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Luas Bangunan (m<sup>2</sup>)</label>
                    <input type="text" name="lb" id="lb_edit" class="form-control" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="text" name="v_harga" id="v_harga_edit" class="form-control" disabled>
                    <input type="text" hidden name="harga" id="harga_edit" class="form-control" disabled>
                </div>
            </div>
        </div>
        <hr>
        <p>Pembayaran</p>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-grup">
                    <label>Tanda Jadi (Rp)</label>
                    <input type="text" name="v_tj_edit" id="v_tj_edit" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="tj_edit" id="tj_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-grup">
                    <label>Tgl Tanda Jadi</label>
                    <input type="date" name="tgl_tj_edit" id="tgl_tj_edit" class="form-control">
                </div>
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Harga kesepakatan (Rp)</label>
                    <input type="text" name="v_hk_edit" id="v_hk_edit" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="hk_edit" id="hk_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Diangsur</label>
                    <input type="text" name="angsur_hk_edit" id="angsur_hk_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Cicilan Angsuran (Rp)</label>
                    <input type="text" disabled name="v_angsuran_hk_edit" id="v_angsuran_hk_edit" class="form-control">
                    <input type="text" disabled hidden name="angsuran_hk_edit" id="angsuran_hk_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Di Bayar Setiap Tanggal</label>
                    <input type="text" name="bayar_hk_edit" id="bayar_hk_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Tanda Jadi Lokasi (Rp)</label>
                    <input type="text" name="v_tjl_edit" id="v_tjl_edit" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="tjl_edit" id="tjl_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Diangsur</label>
                    <input type="text" name="angsur_tjl_edit" id="angsur_tjl_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Cicilan Angsuran (Rp)</label>
                    <input type="text" disabled name="v_angsuran_tjl_edit" id="v_angsuran_tjl_edit" class="form-control">
                    <input type="text" hidden disabled name="angsuran_tjl_edit" id="angsuran_tjl_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Di Bayar Setiap Tanggal</label>
                    <input type="text" name="bayar_tjl_edit" id="bayar_tjl_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Uang Muka (Rp)</label>
                    <input type="text" name="v_um_edit" id="v_um_edit" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="um_edit" id="um_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Diangsur</label>
                    <input type="text" name="angsur_um_edit" id="angsur_um_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Cicilan Angsuran (Rp)</label>
                    <input type="text" disabled name="v_angsuran_um_edit" id="v_angsuran_um_edit" class="form-control">
                    <input type="text" hidden disabled name="angsuran_um_edit" id="angsuran_um_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Di Bayar Setiap Tanggal</label>
                    <input type="text" name="bayar_um_edit" id="bayar_um_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Kelebihan Tanah (Rp)</label>
                    <input type="text" name="v_kt_edit" id="v_kt_edit" class="form-control" onkeyup="allowIDR()">
                    <input type="text" hidden name="kt_edit" id="kt_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Diangsur</label>
                    <input type="text" name="angsur_kt_edit" id="angsur_kt_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Cicilan Angsuran (Rp)</label>
                    <input type="text" disabled name="v_angsuran_kt_edit" id="v_angsuran_kt_edit" class="form-control">
                    <input type="text" hidden disabled name="angsuran_kt_edit" id="angsuran_kt_edit" class="form-control">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Di Bayar Setiap Tanggal</label>
                    <input type="text" name="bayar_kt_edit" id="bayar_kt_edit" class="form-control" onkeyup="allowNumber()">
                </div>
            </div>
        </div>

       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm btn-save-edit"><i class="fa fa-save"></i> Save</button>
      </div>
    </div>
  </div>
</div>


<script src="<?= base_url('assets/adminlte3/plugins/jquery/jquery.min.js') ?>"></script>
<script>
        shape = document.getElementsByTagName("svg")[0];
        shape.setAttribute("viewBox", "-933.9775999999999 -86.35999999999997 3892.1472 4147.2"); 

        var mouseStartPosition = {x: 0, y: 0};
        var mousePosition = {x: 0, y: 0};
        var viewboxStartPosition = {x: 0, y: 0};
        var viewboxPosition = {x: 0, y: 0};
        var viewboxSize = {x: 1877, y: 2000};
        var viewboxScale = 1.0;

        var mouseDown = false;

        shape.addEventListener("mousemove", mousemove);
        shape.addEventListener("mousedown", mousedown);
        shape.addEventListener("wheel", wheel);

        function mousedown(e) {
        mouseStartPosition.x = e.pageX;
        mouseStartPosition.y = e.pageY;

        viewboxStartPosition.x = viewboxPosition.x;
        viewboxStartPosition.y = viewboxPosition.y;

        window.addEventListener("mouseup", mouseup);

        mouseDown = true;
        }

        function setviewbox()
        {
        var vp = {x: 0, y: 0};
        var vs = {x: 0, y: 0};
        
        vp.x = viewboxPosition.x;
        vp.y = viewboxPosition.y;
        
        vs.x = viewboxSize.x * viewboxScale;
        vs.y = viewboxSize.y * viewboxScale;

        shape = document.getElementsByTagName("svg")[0];
        shape.setAttribute("viewBox", vp.x + " " + vp.y + " " + vs.x + " " + vs.y);
        
        }

        function mousemove(e)
        {
        mousePosition.x = e.offsetX;
        mousePosition.y = e.offsetY;
        
        if (mouseDown)
        {
            viewboxPosition.x = viewboxStartPosition.x + (mouseStartPosition.x - e.pageX) * viewboxScale;
            viewboxPosition.y = viewboxStartPosition.y + (mouseStartPosition.y - e.pageY) * viewboxScale;

            setviewbox();
        }
        
        var mpos = {x: mousePosition.x * viewboxScale, y: mousePosition.y * viewboxScale};
        var vpos = {x: viewboxPosition.x, y: viewboxPosition.y};
        var cpos = {x: mpos.x + vpos.x, y: mpos.y + vpos.y}
        }

        function mouseup(e) {
        window.removeEventListener("mouseup", mouseup);
        
        mouseDown = false;
        }

        function wheel(e) {
        var scale = (e.deltaY < 0) ? 0.8 : 1.2;
        
            if ((viewboxScale * scale < 8.) && (viewboxScale * scale > 1./256.))
            {  
                var mpos = {x: mousePosition.x * viewboxScale, y: mousePosition.y * viewboxScale};
                var vpos = {x: viewboxPosition.x, y: viewboxPosition.y};
                var cpos = {x: mpos.x + vpos.x, y: mpos.y + vpos.y}

                viewboxPosition.x = (viewboxPosition.x - cpos.x) * scale + cpos.x;
                viewboxPosition.y = (viewboxPosition.y - cpos.y) * scale + cpos.y;
                viewboxScale *= scale;
            
                setviewbox();
        }
        }

</script>

<script>
    $(document).ready(function () {
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
        $('.sitemap').click(function(){
            var id = $(this).data('id');
            $('#sitemap-id').val(id);
        });
    });

</script>

<?php if($kavling){ ?>
    <script>
        <?php foreach($kavling as $item) {?>
            <?php if($item->sitemap_id !== null){ ?>
                $('#<?= $item->sitemap_id?>').attr("href", "#");
                $('#<?= $item->sitemap_id?>').attr("data-toggle", "popover");
                $('#<?= $item->sitemap_id?>').attr("data-trigger", "hover");
                $('#<?= $item->sitemap_id?>').attr("data-placement", "top");
                $('#<?= $item->sitemap_id?>').attr("title", "Cluster <?= $item->nama_cluster ?> Blok <?= $item->blok ?> No <?= $item->no_rumah ?>");
                $('#<?= $item->sitemap_id?>').attr("data-html", true);
                $('#<?= $item->sitemap_id?>').attr("data-content", "Tipe <?= $item->tipe ?> <br> Panjang = <?= $item->lt ?> m<sup>2</sup> <br> Lebar = <?= $item->lb ?> m<sup>2</sup> <br> Harga = Rp. <?= number_format($item->harga) ?>");
                
                <?php if($item->status_kavling == 1){ ?>
                    $('#<?= $item->sitemap_id?>').css("fill", "<?= ($item->status_kavling == 1)? "rgb(247, 202, 24)": "rgb(113, 128, 150)" ?>");
                <?php } else if($item->status_kavling == 2){ ?>
                    $('#<?= $item->sitemap_id?>').css("fill", "<?= ($item->status_kavling == 2)? "rgb(201, 24, 29)" : "rgb(113, 128, 150)" ?>");
                <?php } else if($item->status_kavling == 0){ ?>
                    $('#<?= $item->sitemap_id?>').css("fill", "rgb(113, 128, 150)");
                <?php } ?>


                $('#<?= $item->sitemap_id?>').css("white-space", "nowrap");
            <?php } ?>
            <?php if($item->status_kavling == 0){ ?>
                $('#<?= $item->sitemap_id?>').attr("data-cluster", "<?= $item->nama_cluster ?>");
                $('#<?= $item->sitemap_id?>').attr("data-blok", "<?= $item->blok ?>");
                $('#<?= $item->sitemap_id?>').attr("data-nomor", "<?= $item->no_rumah ?>");
                $('#<?= $item->sitemap_id?>').attr("class", "addModal");
            <?php } ?>
        <?php } ?>
    </script>
<?php }; ?>

<script>
    $('.addModal').click(function(){

        var cluster = $(this).data('cluster');
        var blok = $(this).data('blok');
        var no_rumah = $(this).data('nomor');

        $("#cluster option").filter(function() {
            return $(this).text() == cluster;
        }).prop('selected', true);
        
        var cluster_id = $('#cluster').val();

            $.ajax({
                url: '<?= site_url('marketing/get_kavling_by_cluster'); ?>',
                dataType: 'JSON',
                data: {cluster:cluster_id},
                type: 'POST',
                success: function(data){
                        var html = '<option value=>--Pilih--</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_kavling+'>'+data[i].blok + data[i].no_rumah+'</option>';
                        }
                        $('#id_rumah').html(html);
                        $("#id_rumah option").filter(function() {
                            return $(this).text() == blok+""+no_rumah;
                        }).prop('selected', true);


                }
            }).done(function(){
                var id_blok = $('#id_rumah').val();
                var cluster = $('#cluster').val();
                $.ajax({
                    url: '<?= site_url('marketing/get_blok_id'); ?>',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {id:id_blok},
                    success: function(d){
                        $('#tipe').val(d.tipe);
                        $('#lb').val(d.lb);
                        $('#lt').val(d.lt);
                        $('#harga').val(d.harga);
                        $('#v_harga').val(d.harga);
                        $('#harga_kesepakatan').val(d.harga);
                    }
                });
            });
 

        $('#staticBackdrop').modal('show');
    });
</script>