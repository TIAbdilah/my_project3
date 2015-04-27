<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login {

    var $akun = array();
    
    public function __construct() {
        $this->CI =& get_instance();
    }
    
    public function set_login_data($param) {
        $this->akun = $param;
    }
    
    public function get_login_data() {
        return $akun;
    }

}
