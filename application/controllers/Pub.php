<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Pub extends CI_Controller {
    
    public function check_all(){
        if($this->input->is_ajax_request()){

            if(!$this->session->userdata('id_perumahan')){
                $params = [
                    'sess' => 0
                ];
            } else {
                $params = [
                    'sess' => 1
                ];
            }
            echo json_encode($params);

        } else {
            exit('No direct script access allowed');
        }
    }
}
