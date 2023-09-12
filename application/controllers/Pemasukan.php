<?php
defined('BASEPATH')or exit('No direct script access alllowed');
class Pemasukan extends CI_Controller {

    public function to_code(){
        $id = $this->input->post('id');
        $type = $this->input->post('type');

        if($type == 'bank_tjl'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_tjl', $id);
            $this->db->update('tanda_jadi_lokasi', $data);
        } 
        else if($type == 'bank_um'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_um', $id);
            $this->db->update('uang_muka', $data);
        } 
        else if($type == 'bank_kt'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_kt', $id);
            $this->db->update('kelebihan_tanah', $data);
        }
        else if($type == 'bank_pak'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_pak', $id);
            $this->db->update('pak', $data);
        }
        else if($type == 'bank_lain'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_lain', $id);
            $this->db->update('lain_lain', $data);
        }
        else if($type == 'bank_realisasi'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_angsur', $id);
            $this->db->update('angsuran_bank', $data);
        }
        else if($type == 'bank_piutang'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_piutang', $id);
            $this->db->update('piutang_bank', $data);
        }
        else if($type == 'inhouse_hk'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_kesepakatan', $id);
            $this->db->update('harga_kesepakatan_inhouse', $data);
        }
        else if($type == 'inhouse_tjl'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_tjl', $id);
            $this->db->update('tanda_jadi_lokasi_inhouse', $data);
        }
        else if($type == 'inhouse_um'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_um', $id);
            $this->db->update('uang_muka_inhouse', $data);
        }
        else if($type == 'inhouse_kt'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_kt', $id);
            $this->db->update('kelebihan_tanah_inhouse', $data);
        }
        else if($type == 'bank_tj'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_transaksi_bank', $id);
            $this->db->update('tbl_transaksi_bank', $data);
        }
        else if($type == 'inhouse_tj'){
            $data = [
                'status' => 1,
                'title_kode' => $this->input->post('title_kode')
            ];
            $this->db->where('id_inhouse', $id);
            $this->db->update('tbl_transaksi_inhouse', $data);
        }

        if($this->db->affected_rows() > 0){
            $params = ['Status berhasil di ubah'];
        } else {
            $params = ['Status gagal di ubah'];
        }
        echo json_encode($params);
    }
   
    public function add_pemasukan_konsumen(){
        $tipe = $this->input->post('tipe');
        $id = $this->input->post('id_pembayaran');


        if($tipe == 'bank_tjl'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('bank_cicil_tjl', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);

        } else if($tipe == 'bank_um'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('bank_cicil_um', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        } 
        else if($tipe == 'bank_kt'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('bank_cicil_kt', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'bank_pak'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('bank_cicil_pak', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'bank_lain'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('bank_cicil_lain', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'bank_realisasi'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('bank_cicil_rb', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'bank_piutang'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('bank_cicil_pb', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'inhouse_hk'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('inhouse_cicil_hk', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'inhouse_tjl'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('inhouse_cicil_tjl', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'inhouse_um'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('inhouse_cicil_um', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'inhouse_kt'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('inhouse_cicil_kt', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'bank_tj'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('bank_cicil_tj', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }
        else if($tipe == 'inhouse_tj'){
            $jml = $this->input->post('jml_bayar');
            $max = $this->input->post('max_bayar');

            if($jml > $max){
                $params = [
                    'success' => false,
                    'msg' => 'Jumlah pemasukan melebihi maksimal'
                ];
                echo json_encode($params);
                die;
            }

            $data = [
                'id_pembayaran' => $id,
                'tanggal' => $this->input->post('tanggal_bayar'),
                'jumlah' => $jml,
                'status' => 1,
                'ket' => $this->input->post('ket')
            ];
            $this->db->insert('inhouse_cicil_tj', $data);
            $this->master->cek_pembayaran_konsumen($tipe, $id);
        }



        if($this->db->affected_rows() > 0){
            $params = [
                'success' => true,
                'msg' => 'Pembayaran berhasil di tambahkan'
            ];
        } else {
            $params = [
                'success' => false,
                'msg' => 'Pembayaran gagal di tambahkan'
            ];
        }

        echo json_encode($params);

    }

    public function load_history(){
        $id = $_POST['id'];
        $tipe = $_POST['tipe'];
        $group = $this->session->userdata('group_id');
        if($group == 1){
            $approve = '';
            $act = 'disabled';
            $mngr = 'disabled';
        } else if($group == 3 || $group == 7){
            $approve = 'disabled';
            $act = '';
            $mngr = 'disabled';
        } else if($group == 13){
            $mngr = '';
            $act = 'disabled';
            $approve = 'disabled';
        } else {
            $approve = 'disabled';
            $act = 'disabled';
            $mngr = 'disabled';
        }
        


        if($tipe == 'bank_tjl'){
            $data = $this->db->get_where('bank_cicil_tjl',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_tjl/');
        } 
        else if($tipe == 'bank_um'){
            $data = $this->db->get_where('bank_cicil_um',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_um/');
        } 
        else if($tipe == 'bank_kt'){
            $data = $this->db->get_where('bank_cicil_kt',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_kt/');
        }
        else if($tipe == 'bank_pak'){
            $data = $this->db->get_where('bank_cicil_pak',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_pak/');
        }
        else if($tipe == 'bank_lain'){
            $data = $this->db->get_where('bank_cicil_lain',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_lain/');
        }
        else if($tipe == 'bank_realisasi'){
            $data = $this->db->get_where('bank_cicil_rb',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_angsuran/');
        }
        else if($tipe == 'bank_piutang'){
            $data = $this->db->get_where('bank_cicil_pb',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_piutang/');
        }
        else if($tipe == 'inhouse_hk'){
            $data = $this->db->get_where('inhouse_cicil_hk',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_hk/');
        }
        else if($tipe == 'inhouse_tjl'){
            $data = $this->db->get_where('inhouse_cicil_tjl',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_inhouse_tjl/');
        }
        else if($tipe == 'inhouse_um'){
            $data = $this->db->get_where('inhouse_cicil_um',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_inhouse_um/');
        }
        else if($tipe == 'inhouse_kt'){
            $data = $this->db->get_where('inhouse_cicil_kt',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_inhouse_kt/');
        }
        else if($tipe == 'bank_tj'){
            $data = $this->db->get_where('bank_cicil_tj',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_b_tj/');
        }
        else if($tipe == 'inhouse_tj'){
            $data = $this->db->get_where('inhouse_cicil_tj',['id_pembayaran' => $id])->result();
            $print = site_url('accounting/gen_i_tj/');
        }






        if(empty($data)){
            $html = '
                <tr>
                    <td colspan="7" class="text-center">No data result</td>
                </tr>
            ';
        } else {

            $i = 1;
            $html = '';
            $terbayar = 0;
            foreach($data as $d){
                $date = date_create($d->tanggal);


                if($d->status == 0){
                    $txt = 'Di tolak';
                    $color = 'danger';
                    $btn = '<button '.$act.' type="button" class="btn btn-xs btn-warning editBuktiTransaksi" data-id="'.$d->id_cicil.'" data-tipe="'.$tipe.'"><i class="fa fa-edit"></i></button>';
                    $tgl_approve = '';
                    $approve_manager = '';
                    
                } else if($d->status == 1){
                    $txt = 'Belum upload bukti';
                    $color = 'secondary';
                    $btn = '<button '.$act.' class="btn btn-xs btn-primary addBukti" type="button" data-id="'.$d->id_cicil.'" data-tipe="'.$tipe.'"><i class="fa fa-plus"></i></button>';
                    $tgl_approve = '';
                    $approve_manager = '';

                } else if($d->status == 2){
                    $txt = 'Menunggu Direktur Utama';
                    $color = 'primary';

                    if($d->tgl_approve_manager == null || $d->tgl_approve_manager == '0000-00-00'){
                        $approve_manager = '';
                    } else {
                        $appr_mngr = date_create($d->tgl_approve_manager);
                        $approve_manager = 'Tanggal Approve Manager Accounting: '. date_format($appr_mngr, 'd F Y');
                    }

                    $tgl_approve = '';
                    $btn = '
                    <button '.$approve.' class="btn btn-xs btn-primary approve" type="button" data-id="'.$d->id_cicil.'" data-tipe="'.$tipe.'"><i class="fa fa-check"></i></button>
                    <button '.$approve.' class="btn btn-xs btn-danger reject" type="button" data-id="'.$d->id_cicil.'" data-tipe="'.$tipe.'"><i class="fa fa-times"></i></button>
                    ';

                } else if($d->status == 3){
                    $txt = 'Approved by Derektur Utama';
                    $color = 'success';
                    $btn = '';

                    if($d->tgl_approve != null){
                        $tgl = date_create($d->tgl_approve);
                        $tgl_approve = 'Tanggal Approve Direktur Utama: '.date_format($tgl, 'd F Y');
                    } else {
                        $tgl_approve = '';
                    }

                    if($d->tgl_approve_manager == null || $d->tgl_approve_manager == '0000-00-00'){
                        $approve_manager = '';
                    } else {
                        $appr_mngr = date_create($d->tgl_approve_manager);
                        $approve_manager = 'Tanggal Approve Manager Accounting: '.date_format($appr_mngr, 'd F Y');
                    }



                } else if($d->status == 4){
                    $txt = 'Menunggu Manager Accounting';
                    $color = 'warning';
                    $btn = '
                    <button '.$mngr.' class="btn btn-xs btn-primary approve-manager" type="button" data-id="'.$d->id_cicil.'" data-tipe="'.$tipe.'"><i class="fa fa-check"></i></button>
                    <button '.$mngr.' class="btn btn-xs btn-danger reject" type="button" data-id="'.$d->id_cicil.'" data-tipe="'.$tipe.'"><i class="fa fa-times"></i></button>
                    ';
                    $tgl_approve = '';
                    $approve_manager = '';
                }

                if($d->bukti_transfer == ''){
                    $bukti_tf = '-';
                } else {
                    $bukti_tf =  '<img src="'.base_url('assets/bukti_pembayaran/').$d->bukti_transfer.'" width="50%">';
                }
                if($d->bukti_nota == ''){
                    $bukti_nota = '-';
                } else {
                    $bukti_nota = '<img src="'.base_url('assets/bukti_pembayaran/').$d->bukti_nota.'" width="50%">';
                }


                $html .= '
                    <tr>
                        <td>'.$i++.'</td>
                        <td>'.date_format($date, 'd F Y').'</td>
                        <td>Rp. '.number_format($d->jumlah).'</td>
                        <td>'.$bukti_tf.'</td>
                        <td>'.$bukti_nota.'</td>
                        <td><span class="badge badge-'.$color.'">'.$txt.'</span> <br> '.$approve_manager.' <br> '.$tgl_approve.'</td>
                        <td>'.$d->ket.'</td>
                        <td>'.$btn.' <a target="_blank" href="'.$print.$d->id_cicil.'" class="btn btn-xs btn-success"><i class="fa fa-print"></i></a> </td>
                    </tr>
                ';
            }
        }
        echo $html;

    }

    public function add_bukti(){
        $id = $_POST['id_cicil'];
        $tipe = $_POST['tipe'];

        if($_FILES['transfer']){
            $config['upload_path']          = './assets/bukti_pembayaran/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if($this->upload->do_upload('transfer')){
                $transfer = $this->upload->data('file_name');
            } else {
                $params = [
                    'success' => false,
                    'msg' => 'Error upload Bukti Transfer'
                ];
                echo json_encode($params);
                die;
            }

        }
        if($_FILES['nota']){
            $config['upload_path']          = './assets/bukti_pembayaran/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if($this->upload->do_upload('nota')){
                $nota = $this->upload->data('file_name');
            } else {
                $params = [
                    'success' => false,
                    'msg' => 'Error upload bukti nota'
                ];
                echo json_encode($params);
                die;
            }

        }

        $data = [
            'bukti_transfer' => $transfer,
            'bukti_nota' => $nota,
            'status' => 4
        ];

        if($tipe == 'bank_tjl'){
            $this->db->where('id_cicil', $id)->update('bank_cicil_tjl', $data);
        } 
        else if($tipe == 'bank_um'){
            $this->db->where('id_cicil', $id)->update('bank_cicil_um', $data);
        } 
        else if($tipe == 'bank_kt'){
            $this->db->where('id_cicil', $id)->update('bank_cicil_kt', $data);
        }
        else if($tipe == 'bank_pak'){
            $this->db->where('id_cicil', $id)->update('bank_cicil_pak', $data);
        }
        else if($tipe == 'bank_lain'){
            $this->db->where('id_cicil', $id)->update('bank_cicil_lain', $data);
        }
        else if($tipe == 'bank_realisasi'){
            $this->db->where('id_cicil', $id)->update('bank_cicil_rb', $data);
        }
        else if($tipe == 'bank_piutang'){
            $this->db->where('id_cicil', $id)->update('bank_cicil_pb', $data);
        }
        else if($tipe == 'inhouse_hk'){
            $this->db->where('id_cicil', $id)->update('inhouse_cicil_hk', $data);
        }
        else if($tipe == 'inhouse_tjl'){
            $this->db->where('id_cicil', $id)->update('inhouse_cicil_tjl', $data);
        }
        else if($tipe == 'inhouse_um'){
            $this->db->where('id_cicil', $id)->update('inhouse_cicil_um', $data);
        }
        else if($tipe == 'inhouse_kt'){
            $this->db->where('id_cicil', $id)->update('inhouse_cicil_kt', $data);
        }
        else if($tipe == 'bank_tj'){
            $this->db->where('id_cicil', $id)->update('bank_cicil_tj', $data);
        }
        else if($tipe == 'inhouse_tj'){
            $this->db->where('id_cicil', $id)->update('inhouse_cicil_tj', $data);
        }


        if($this->db->affected_rows() > 0){
            $params = [
                'success' => true,
                'msg' => 'Bukti berhasil di tambahkan'
            ]; 
        } else {
            $params = [
                'success' => false,
                'msg' => 'Bukti gagal di tambahkan'
            ]; 
        }

        echo json_encode($params);
    }

    public function approve_pemasukan(){
        $id = $_POST['id'];
        $tipe = $_POST['tipe'];
        $id_perumahan = $this->session->userdata('id_perumahan');

        if($tipe == 'bank_tjl'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('bank_cicil_tjl')->row();

            $this->db->select('tanda_jadi_lokasi.*, bank_cicil_tjl.*')->from('tanda_jadi_lokasi')->join('bank_cicil_tjl', 'tanda_jadi_lokasi.id_tjl = bank_cicil_tjl.id_pembayaran')->where('bank_cicil_tjl.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;
            $ket = $data_cicil->ket;


            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_tjl');
        }
        else if($tipe == 'bank_um'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('bank_cicil_um')->row();

            $this->db->select('uang_muka.*, bank_cicil_um.*')->from('uang_muka')->join('bank_cicil_um', 'uang_muka.id_um = bank_cicil_um.id_pembayaran')->where('bank_cicil_um.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;
            $ket = $data_cicil->ket;


            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_um');
        }
        else if($tipe == 'bank_kt'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('bank_cicil_kt')->row();

            $this->db->select('kelebihan_tanah.*, bank_cicil_kt.*')->from('kelebihan_tanah')->join('bank_cicil_kt', 'kelebihan_tanah.id_kt = bank_cicil_kt.id_pembayaran')->where('bank_cicil_kt.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = $data_cicil->ket;

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_kt');

        }
        else if($tipe == 'bank_pak'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('bank_cicil_pak')->row();

            $this->db->select('pak.*, bank_cicil_pak.*')->from('pak')->join('bank_cicil_pak', 'pak.id_pak = bank_cicil_pak.id_pembayaran')->where('bank_cicil_pak.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = $data_cicil->ket;
            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_pak');

        }
        else if($tipe == 'bank_lain'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('bank_cicil_lain')->row();

            $this->db->select('lain_lain.*, bank_cicil_lain.*')->from('lain_lain')->join('bank_cicil_lain', 'lain_lain.id_lain = bank_cicil_lain.id_pembayaran')->where('bank_cicil_lain.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = $data_cicil->ket;
            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_lain');

        }
        else if($tipe == 'bank_realisasi'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('bank_cicil_rb')->row();

            $this->db->select('angsuran_bank.*, bank_cicil_rb.*')->from('angsuran_bank')->join('bank_cicil_rb', 'angsuran_bank.id_angsur = bank_cicil_rb.id_pembayaran')->where('bank_cicil_rb.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = $data_cicil->ket;
            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_rb');

        }
        else if($tipe == 'bank_piutang'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('bank_cicil_pb')->row();

            $this->db->select('piutang_bank.*, bank_cicil_pb.*')->from('piutang_bank')->join('bank_cicil_pb', 'piutang_bank.id_piutang = bank_cicil_pb.id_pembayaran')->where('bank_cicil_pb.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = $data_cicil->ket;
            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_pb');

        }
        else if($tipe == 'inhouse_hk'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('inhouse_cicil_hk')->row();

            $this->db->select('harga_kesepakatan_inhouse.*, inhouse_cicil_hk.*')->from('harga_kesepakatan_inhouse')->join('inhouse_cicil_hk', 'harga_kesepakatan_inhouse.id_kesepakatan = inhouse_cicil_hk.id_pembayaran')->where('inhouse_cicil_hk.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;
            $ket = $data_cicil->ket;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_hk');

        }
        else if($tipe == 'inhouse_tjl'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('inhouse_cicil_tjl')->row();

            $this->db->select('tanda_jadi_lokasi_inhouse.*, inhouse_cicil_tjl.*')->from('tanda_jadi_lokasi_inhouse')->join('inhouse_cicil_tjl', 'tanda_jadi_lokasi_inhouse.id_tjl = inhouse_cicil_tjl.id_pembayaran')->where('inhouse_cicil_tjl.id_cicil', $id);
            $data = $this->db->get()->row();
            $ket = $data_cicil->ket;

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_tjl');

        }
        else if($tipe == 'inhouse_um'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('inhouse_cicil_um')->row();

            $this->db->select('uang_muka_inhouse.*, inhouse_cicil_um.*')->from('uang_muka_inhouse')->join('inhouse_cicil_um', 'uang_muka_inhouse.id_um = inhouse_cicil_um.id_pembayaran')->where('inhouse_cicil_um.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;
            $ket = $data_cicil->ket;


            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_um');

        }
        else if($tipe == 'inhouse_kt'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('inhouse_cicil_kt')->row();

            $this->db->select('kelebihan_tanah_inhouse.*, inhouse_cicil_kt.*')->from('kelebihan_tanah_inhouse')->join('inhouse_cicil_kt', 'kelebihan_tanah_inhouse.id_kt = inhouse_cicil_kt.id_pembayaran')->where('inhouse_cicil_kt.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = $data_cicil->ket;

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_kt');

        }
        else if($tipe == 'bank_tj'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('bank_cicil_tj')->row();

            $this->db->select('tbl_transaksi_bank.*, bank_cicil_tj.*, tbl_kavling.id_perum')->from('tbl_transaksi_bank')->join('bank_cicil_tj', 'tbl_transaksi_bank.id_transaksi_bank = bank_cicil_tj.id_pembayaran') ->join('tbl_kavling','tbl_transaksi_bank.id_rumah = tbl_kavling.id_kavling')->where('bank_cicil_tj.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;
            $ket = $data_cicil->ket;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_tj');

        }
        else if($tipe == 'inhouse_tj'){
            $data_cicil = $this->db->where('id_cicil', $id)->get('inhouse_cicil_tj')->row();

            $this->db->select('tbl_transaksi_inhouse.*, inhouse_cicil_tj.*, tbl_kavling.id_perum')->from('tbl_transaksi_inhouse')->join('inhouse_cicil_tj', 'tbl_transaksi_inhouse.id_inhouse = inhouse_cicil_tj.id_pembayaran') ->join('tbl_kavling','tbl_transaksi_inhouse.id_rumah = tbl_kavling.id_kavling')->where('inhouse_cicil_tj.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $id_perumahan;
            $ket = $data_cicil->ket;

            $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 3)->set('tgl_approve', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_tj');

        }

        if($this->db->affected_rows() > 0){
            $params = ['msg' => 'Pembayaran berhasil di approve'];
        } else {
            $params = ['msg' => 'Pembayaran gagal di approve'];
        }

        echo json_encode($params);
    }

    public function reject_pemasukan(){
        $id = $_POST['id'];
        $type = $_POST['tipe'];

        if($type == 'bank_tjl'){
           $this->db->set('status', 0)->where('id_cicil', $id)->update('bank_cicil_tjl');
        } 
        else if($type == 'bank_um'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('bank_cicil_um');
        }
        else if($type == 'bank_kt'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('bank_cicil_kt');
        }
        else if($type == 'bank_pak'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('bank_cicil_pak');
        }
        else if($type == 'bank_lain'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('bank_cicil_lain');
        }
        else if($type == 'bank_realisasi'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('bank_cicil_rb');
        }
        else if($type == 'bank_piutang'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('bank_cicil_pb');
        }
        else if($type == 'inhouse_hk'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('inhouse_cicil_hk');
        }
        else if($type == 'inhouse_tjl'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('inhouse_cicil_tjl');
        }
        else if($type == 'inhouse_um'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('inhouse_cicil_um');
        }
        else if($type == 'inhouse_kt'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('inhouse_cicil_kt');
        }
        else if($type == 'bank_tj'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('bank_cicil_tj');
        }
        else if($type == 'inhouse_tj'){
            $this->db->set('status', 0)->where('id_cicil', $id)->update('inhouse_cicil_tj');
        }

        if($this->db->affected_rows() > 0){
            $params = ['msg' => 'Berhasil di reject'];
        } else {
            $params = ['msg' => 'Gagal di reject'];
        }
        echo json_encode($params);

    }

    private function to_approved_history($id_perum, $title_kode, $jumlah, $ket){
        $data = [
            'id_perumahan' => $id_perum,
            'id_title_kode' => $title_kode,
            'jumlah' => $jumlah,
            'tanggal' => date('Y-m-d'),
            'ket' => $ket
        ];
        $this->db->insert('approved_history', $data);
    }


    public function show_sisa_pembayaran(){
        $tipe = $_POST['tipe'];
        $id = $_POST['id'];
        $sisa = $_POST['sisa'];

        if($tipe == 'bank_tjl'){
            $db = 'bank_cicil_tjl';
        } 
        else if($tipe == 'bank_um'){
            $db = 'bank_cicil_um';
        } 
        else if($tipe == 'bank_kt'){
            $db = 'bank_cicil_kt';
        }
        else if($tipe == 'bank_pak'){
            $db = 'bank_cicil_pak';
        }
        else if($tipe == 'bank_lain'){
            $db = 'bank_cicil_lain';
        }
        else if($tipe == 'bank_realisasi'){
            $db = 'bank_cicil_rb';
        }
        else if($tipe == 'bank_piutang'){
            $db = 'bank_cicil_pb';
        }
        else if($tipe == 'inhouse_hk'){
            $db = 'inhouse_cicil_hk';
        }
        else if($tipe == 'inhouse_tjl'){
            $db = 'inhouse_cicil_tjl';
        }
        else if($tipe == 'inhouse_um'){
            $db = 'inhouse_cicil_um';
        }
        else if($tipe == 'inhouse_kt'){
            $db = 'inhouse_cicil_kt';
        }
        else if($tipe == 'bank_tj'){
            $db = 'bank_cicil_tj';
        }
        else if($tipe == 'inhouse_tj'){
            $db = 'inhouse_cicil_tj';;
        }

        $q = "SELECT SUM(jumlah) as total FROM $db WHERE id_pembayaran = $id";
        $terbayar = $this->db->query($q)->row()->total;
    

        $output = '<tr>
                    <th colspan="5">Total terbayar</th>
                    <th colspan="2">Rp. '.number_format($terbayar).'</th>
                  </tr>
                  <tr>
                    <th colspan="5">Sisa pembayaran</th>
                    <th colspan="2">Rp. '.number_format($sisa).'</th>
                  </tr>';

        echo $output;

    }


    public function edit_dokumen(){
        $type = $this->input->post('type_edit');
        $id = $this->input->post('id_edit');

        if($type == 'bank_tjl'){
            $db = 'bank_cicil_tjl';
            $id_db = 'id_cicil';
        } 
        else if($type == 'bank_um'){
            $db = 'bank_cicil_um';
            $id_db = 'id_cicil';
        }
        else if($type == 'bank_kt'){
            $db = 'bank_cicil_kt';
            $id_db = 'id_cicil';
        }
        else if($type == 'bank_pak'){
            $db = 'bank_cicil_pak';
            $id_db = 'id_cicil';
        }
        else if($type == 'bank_lain'){
            $db = 'bank_cicil_lain';
            $id_db = 'id_cicil';
        }
        else if($type == 'bank_realisasi'){
            $db = 'bank_cicil_rb';
            $id_db = 'id_cicil';
        }
        else if($type == 'bank_piutang'){
            $db = 'bank_cicil_pb';
            $id_db = 'id_cicil';
        }
        else if($type == 'bank_tj'){
            $db = 'bank_cicil_tj';
            $id_db = 'id_cicil';
        }
        
        else if($type == 'inhouse_tj'){
            $db = 'inhouse_cicil_tj';
            $id_db = 'id_cicil';
        }
        else if($type == 'inhouse_hk'){
            $db = 'inhouse_cicil_hk';
            $id_db = 'id_cicil';
        }
        else if($type == 'inhouse_tjl'){
            $db = 'inhouse_cicil_tjl';
            $id_db = 'id_cicil';
        }
        else if($type == 'inhouse_um'){
            $db = 'inhouse_cicil_um';
            $id_db = 'id_cicil';
        }
        else if($type == 'inhouse_kt'){
            $db = 'inhouse_cicil_kt';
            $id_db = 'id_cicil';
        }






        $data = $this->db->get_where($db, [$id_db => $id])->row();

        if($_FILES['nota_edit']){
            $config['upload_path']          = './assets/bukti_pembayaran/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if($this->upload->do_upload('nota_edit')){
                $nota = $this->upload->data('file_name');
                unlink(FCPATH .'assets/bukti_pembayaran/'. $data->bukti_nota);
            } else {
                $nota = $data->bukti_nota;
            }
        }

        if($_FILES['transfer_edit']){
            $config['upload_path']          = './assets/bukti_pembayaran/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);

            if($this->upload->do_upload('transfer_edit')){
                $transfer = $this->upload->data('file_name');
                unlink(FCPATH .'assets/bukti_pembayaran/'. $data->bukti_transfer);
            } else {
                $transfer = $data->bukti_transfer;
            }
        }



        $update = [
            'bukti_transfer' => $transfer,
            'bukti_nota' => $nota,
            'status' => 2
        ];

        $this->db->where($id_db, $id)->update($db, $update);

        if($this->db->affected_rows() > 0){
            $params = [
                'success' => true,
                'msg' => 'Bukti berhasil di update'
            ];
        } else {
            $params = [
                'success' => false,
                'msg' => 'Bukti gagal di update'
            ];
        }

        echo json_encode($params);
    }


    public function approve_manager(){
        $id = $_POST['id'];
        $tipe = $_POST['tipe'];

        if($tipe == 'bank_tjl'){
            $this->db->select('tanda_jadi_lokasi.*, bank_cicil_tjl.*')->from('tanda_jadi_lokasi')->join('bank_cicil_tjl', 'tanda_jadi_lokasi.id_tjl = bank_cicil_tjl.id_pembayaran')->where('bank_cicil_tjl.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;
            $ket = 'Pembayaran tanda jadi lokasi transaksi bank';


            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_tjl');
        }
        else if($tipe == 'bank_um'){

            $this->db->select('uang_muka.*, bank_cicil_um.*')->from('uang_muka')->join('bank_cicil_um', 'uang_muka.id_um = bank_cicil_um.id_pembayaran')->where('bank_cicil_um.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;
            $ket = 'Pembayaran uang muka transaksi bank';


            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_um');
        }
        else if($tipe == 'bank_kt'){

            $this->db->select('kelebihan_tanah.*, bank_cicil_kt.*')->from('kelebihan_tanah')->join('bank_cicil_kt', 'kelebihan_tanah.id_kt = bank_cicil_kt.id_pembayaran')->where('bank_cicil_kt.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = 'Pembayaran kelebihan tanah transaksi bank';

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_kt');

        }
        else if($tipe == 'bank_pak'){

            $this->db->select('pak.*, bank_cicil_pak.*')->from('pak')->join('bank_cicil_pak', 'pak.id_pak = bank_cicil_pak.id_pembayaran')->where('bank_cicil_pak.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = 'Pembayaran PAK transaksi bank';
            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_pak');

        }
        else if($tipe == 'bank_lain'){

            $this->db->select('lain_lain.*, bank_cicil_lain.*')->from('lain_lain')->join('bank_cicil_lain', 'lain_lain.id_lain = bank_cicil_lain.id_pembayaran')->where('bank_cicil_lain.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = 'Pembayaran lain-lain transaksi bank';
            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_lain');

        }
        else if($tipe == 'bank_realisasi'){

            $this->db->select('angsuran_bank.*, bank_cicil_rb.*')->from('angsuran_bank')->join('bank_cicil_rb', 'angsuran_bank.id_angsur = bank_cicil_rb.id_pembayaran')->where('bank_cicil_rb.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = 'Pembayaran realisasi bank';
            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_rb');

        }
        else if($tipe == 'bank_piutang'){

            $this->db->select('piutang_bank.*, bank_cicil_pb.*')->from('piutang_bank')->join('bank_cicil_pb', 'piutang_bank.id_piutang = bank_cicil_pb.id_pembayaran')->where('bank_cicil_pb.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = 'Pembayaran piutang bank';
            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_pb');

        }
        else if($tipe == 'inhouse_hk'){

            $this->db->select('harga_kesepakatan_inhouse.*, inhouse_cicil_hk.*')->from('harga_kesepakatan_inhouse')->join('inhouse_cicil_hk', 'harga_kesepakatan_inhouse.id_kesepakatan = inhouse_cicil_hk.id_pembayaran')->where('inhouse_cicil_hk.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;
            $ket = 'Pembayaran harga kesepakatan transaksi inhouse';

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_hk');

        }
        else if($tipe == 'inhouse_tjl'){

            $this->db->select('tanda_jadi_lokasi_inhouse.*, inhouse_cicil_tjl.*')->from('tanda_jadi_lokasi_inhouse')->join('inhouse_cicil_tjl', 'tanda_jadi_lokasi_inhouse.id_tjl = inhouse_cicil_tjl.id_pembayaran')->where('inhouse_cicil_tjl.id_cicil', $id);
            $data = $this->db->get()->row();
            $ket = 'Pembayaran tanda jadi lokasi transaksi inhouse';

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_tjl');

        }
        else if($tipe == 'inhouse_um'){

            $this->db->select('uang_muka_inhouse.*, inhouse_cicil_um.*')->from('uang_muka_inhouse')->join('inhouse_cicil_um', 'uang_muka_inhouse.id_um = inhouse_cicil_um.id_pembayaran')->where('inhouse_cicil_um.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;
            $ket = 'Pembayaran uang muka transaksi inhouse';


            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_um');

        }
        else if($tipe == 'inhouse_kt'){

            $this->db->select('kelebihan_tanah_inhouse.*, inhouse_cicil_kt.*')->from('kelebihan_tanah_inhouse')->join('inhouse_cicil_kt', 'kelebihan_tanah_inhouse.id_kt = inhouse_cicil_kt.id_pembayaran')->where('inhouse_cicil_kt.id_cicil', $id);
            $data = $this->db->get()->row();

            $ket = 'Pembayaran kelebihan tanah transaksi inhouse';

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perumahan;

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_kt');

        }
        else if($tipe == 'bank_tj'){

            $this->db->select('tbl_transaksi_bank.*, bank_cicil_tj.*, tbl_kavling.id_perum')->from('tbl_transaksi_bank')->join('bank_cicil_tj', 'tbl_transaksi_bank.id_transaksi_bank = bank_cicil_tj.id_pembayaran') ->join('tbl_kavling','tbl_transaksi_bank.id_rumah = tbl_kavling.id_kavling')->where('bank_cicil_tj.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perum;
            $ket = 'Pembayaran tanda jadi transaksi bank';

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('bank_cicil_tj');

        }
        else if($tipe == 'inhouse_tj'){

            $this->db->select('tbl_transaksi_inhouse.*, inhouse_cicil_tj.*, tbl_kavling.id_perum')->from('tbl_transaksi_inhouse')->join('inhouse_cicil_tj', 'tbl_transaksi_inhouse.id_inhouse = inhouse_cicil_tj.id_pembayaran') ->join('tbl_kavling','tbl_transaksi_inhouse.id_rumah = tbl_kavling.id_kavling')->where('inhouse_cicil_tj.id_cicil', $id);
            $data = $this->db->get()->row();

            $jumlah = $data->jumlah;
            $title_kode = $data->title_kode;
            $id_perum = $data->id_perum;
            $ket = 'Pembayaran tanda jadi transaksi inhouse';

            // $this->to_approved_history($id_perum, $title_kode, $jumlah, $ket);

            $this->db->set('status', 2)->set('tgl_approve_manager', date('Y-m-d'))->where('id_cicil', $id)->update('inhouse_cicil_tj');

        }

        if($this->db->affected_rows() > 0){
            $params = ['msg' => 'Pembayaran berhasil di approve'];
        } else {
            $params = ['msg' => 'Pembayaran gagal di approve'];
        }

        echo json_encode($params);
    }
}