<?php

//Programer     : Taufik Ismail A, S.Kom
//Created Date  : 6 Apr 2015
//Projet        : E-SATKER

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller {

    var $akun = array(); 
    
    public function __construct() {
        parent::__construct();
        $this->load->model('barang_model');
        $this->load->model('listcode_model');
        $this->akun = array(
            'username' => $this->session->userdata('username'),
            'role' => $this->session->userdata('role')
        );
    }

    public function index() {        
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Barang";
        $data['page'] = 'admin/barang/list';
        $data['list_data'] = $this->barang_model->select_all()->result();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {        
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Barang";
        $data['page'] = 'admin/barang/view';
        $data['row'] = $this->barang_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function add() {
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Barang";
        $data['page'] = 'admin/barang/add';
        $data['SIList_jenisBarang'] = $this->listcode_model->select_by_field('list_name', 'Jenis Barang')->result();
        $data['SIList_satuanBarang'] = $this->listcode_model->select_by_field('list_name', 'Satuan Barang')->result();        
        $this->load->view('admin/index', $data);
    }

    public function edit($id) {        
        $data['akun'] = $this->akun;
        $data['title'] = "e-satker | Barang";
        $data['page'] = 'admin/barang/edit';
        $data['SIList_jenisBarang'] = $this->listcode_model->select_by_field('list_name', 'Jenis Barang')->result();
        $data['SIList_satuanBarang'] = $this->listcode_model->select_by_field('list_name', 'Satuan Barang')->result();
        $data['row'] = $this->barang_model->select_by_id($id)->row();
        $this->load->view('admin/index', $data);
    }

    public function process($action, $id = null) {

        $data['kode_barang'] = $this->input->post('inpKodeBarang');
        $data['nama_barang'] = $this->input->post('inpNamaBarang');
        $data['satuan'] = $this->input->post('inpSatuan');
        $data['pagu_harga'] = $this->input->post('inpPaguHarga');
        $data['kode_jenis_barang'] = $this->input->post('inpKodeJenisBarang');
        
        if ($action == 'add') {
            $this->barang_model->add($data);
        } else {
            $this->barang_model->edit($id, $data);
        }

        redirect('master/barang');
    }

    public function delete($id) {
        $this->barang_model->delete($id);
        redirect('master/barang');
    }

}

?>