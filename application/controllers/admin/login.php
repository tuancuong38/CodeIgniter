<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller {
    function index() {
        $this->load->view('admin/login_view');
    }
    function createUser() {
        
    }
}