<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once(APPPATH . 'controllers/common/array_custom.php');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('master/users_model');
        $this->load->model('master/role_model');
        $this->load->model('master/pegawai_model');
    }

    public function index() {
        if ($this->session->userdata('is_login')) {
            redirect('admin/home');
        } else {
            $data['title'] = "Login | e-satker";            
            $this->load->view('public/login', $data);
        }
    }

    public function signup() {
        $data['title'] = "e-satker | User";
        $data['SIList_role'] = $this->role_model->select_all()->result();
        $data['SIList_pegawai'] = $this->pegawai_model->select_all()->result();
        $sessionData['is_login'] = TRUE;
        $this->session->set_userdata($sessionData);
        $this->load->view('public/signup', $data);
        // redirect('master/users/add');
        
    }

    public function process_signup() {
        $data['id_jenis_pengguna'] = $this->input->post('inpIdJenisPengguna');
        $data['id_pegawai'] = $this->input->post('inpIdPegawai');
        $data['alamat'] = $this->input->post('inpAlamat');
        $data['email'] = $this->input->post('inpEmail');
        $data['username'] = $this->input->post('inpUsername');
        $data['password'] = $this->input->post('inpPassword');
        $data['password2'] = $this->input->post('inpPassword2');
        $data['telp'] = $this->input->post('inpTelp');

        $this->form_validation->set_rules('inpUsername', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inpPassword', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inpPassword2', 'Password 2', 'trim|required|xss_clean');

        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
                $this->users_model->add($data);
                $this->session->set_flashdata('berhasil', '<div class="alert alert-danger" role="alert">Pendaftaran Berhasil, tunggu konfirmasi admin untuk dapat melakukan proses login.</div>');
                $data['title'] = "Login | e-satker";
                $this->load->view('public/login',$data);

        }else{
            $this->session->set_flashdata('passwordsalah', '<div class="alert alert-danger" role="alert">Password atau Username Belum Diisi Dengan Benar</div>');
            redirect($_SERVER['HTTP_REFERER']);
            }
        }

    public function process_login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $row_count = $this->users_model->checkUser($username, $password)->num_rows(); 
            $row_activated = $this->users_model->checkActivatedUser($username, $password)->num_rows();        
            
            if ($row_activated == 1) {
                $row = $this->users_model->select_by_field('username', $username)->row();        
                $sessionData['username'] = $row->username;
                $sessionData['role'] = $row->nama_role;
                $array_custom = new Array_custom();
                $sessionData['kode_role'] = $array_custom->kode_role[$row->id_jenis_pengguna];
                $sessionData['kode_unit'] = $row->kode_unit;
                $sessionData['is_login'] = TRUE;

                $this->session->set_userdata($sessionData);
                redirect('admin/home');
            } else {
                if ($row_count){
                    $this->session->set_flashdata('message', 'Akun anda belum aktif, silahkan hubungi administrator' . $this->session->userdata('id_jenis_pengguna'));
                    $data['title'] = "Login | e-satker";
                    $this->load->view('public/login', $data);
                } else {
                    $this->session->set_flashdata('message', 'Login Gagal!, username atau password salah ' . $this->session->userdata('id_jenis_pengguna'));

                    $data['title'] = "Login | e-satker";
                    $this->load->view('public/login', $data);
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Login Gagal!, username atau password salah ');
            $data['title'] = "Login | e-satker";
            $this->load->view('public/login', $data);
        }
    }

    public function process_logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
