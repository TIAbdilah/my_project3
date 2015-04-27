<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// ***
// Author		: TI Abdilah
// Create		: 14/01/14 (TI Abdilah)
// Update		: 14/01/14 (TI Abdilah)
// ***

class Counter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transaksi/counter_model');
    }

    public function view() {
        $pattern = 'asdf12';
        echo $this->generateId($pattern);
    }

    public function generateId($pattern) {
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
            $this->counter_model->edit($id,$data);
        }

        $counter = $this->counter_model->select_by_field('pattern', $pattern)->row();
        if (strlen($counter->counter) == 1) {
            $ctr = "00" . $counter->counter;
        } else if (strlen($counter->counter) == 2) {
            $ctr = "0" . $counter->counter;
        } else {
            $ctr = $counter->counter;
        }

        return $ctr;
    }

}
