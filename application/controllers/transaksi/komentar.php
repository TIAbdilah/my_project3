<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komentar extends CI_Controller {

    var $akun = array();

    public function __construct() {
        parent::__construct();
    }

    public function process($action, $id = null) {
        $data['id_header'] = $this->input->post('inHeader');
        $data['username'] = $this->input->post('inUsername');
        $data['komentar'] = $this->input->post('inKomentar');

        if ($action == 'add') {
            $this->komentar_model->add($data);
        } else {
            $this->komentar_model->edit($id, $data);
        }

        redirect('transaksi/perjalanandinas');
    }

}

?>