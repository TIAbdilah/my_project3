<?php

//Created By    : Taufik Ismail A, S.Kom
//Updated By    : Taufik Ismail A, S.Kom
//Created Date  : 9 Apr 2015
//Updated Date  : 9 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Counter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/counter_model');
        $this->is_logged_in();
    }

    public function view() {
        $pattern = 'asdf12';
        echo $this->generateId($pattern);
    }

    public function generateId($pattern, $long = null) {
        $crt = '';
        $check = $this->counter_model->select_by_field('pattern', $pattern)->num_rows();
        if ($check == 0) {
            $data['pattern'] = $pattern;
            $data['counter'] = 1;
            $this->counter_model->add($data);
        } else {
            $counter = $this->counter_model->select_by_field('pattern', $pattern)->row();
            $id = $counter->id;
            $data['pattern'] = $pattern;
            $data['counter'] = $counter->counter + 1;
            $this->counter_model->edit($id, $data);
        }

        $counter = $this->counter_model->select_by_field('pattern', $pattern)->row();
        if ($long == 4) {
            if (strlen($counter->counter) == 1) {
                $ctr = "000" . $counter->counter;
            } else if (strlen($counter->counter) == 2) {
                $ctr = "00" . $counter->counter;
            } else if (strlen($counter->counter) == 3) {
                $ctr = "0" . $counter->counter;
            } else {
                $ctr = $counter->counter;
            }
        } else {
            if (strlen($counter->counter) == 1) {
                $ctr = "00" . $counter->counter;
            } else if (strlen($counter->counter) == 2) {
                $ctr = "0" . $counter->counter;
            } else {
                $ctr = $counter->counter;
            }
        }


        return $ctr;
    }

    public function is_logged_in() {
        if ($this->session->userdata('role') == '') {
            redirect('login');
        }
    }

}
