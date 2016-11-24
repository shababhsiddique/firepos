<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Check whether admin is logged in
        $admin_logged_in = $this->session->userdata('admin_logged_in');
        if (!isset($admin_logged_in) || $admin_logged_in == false) {
            redirect('login');
        }
    }

    public function index() {
        echo "logged in";
    }

    public function logout() {

        $this->session->sess_destroy();
        $this->session->unset_userdata('admin_user_name');
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_privilage_level');
        $this->session->unset_userdata('admin_user_id');

        $sessionData = setmessage("Logged Out", "from admin ", "info");
        $this->session->set_userdata($sessionData);

//        session_destroy();

        redirect('login', 'refresh');
    }

}
