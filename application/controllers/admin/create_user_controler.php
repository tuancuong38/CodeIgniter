<?php 
    if(!defined('BASEPATH')) exit('No direct script access allowed');

    class CreateUser extends CI_Controller {
        public function index() {
            $this->load->view('admins/create_user_view');
        }
    }
