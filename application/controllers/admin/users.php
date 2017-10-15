<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
        echo('index');
		// $this->load->view('welcome_message');
	}

	public function create() {
		
		$this->load->model('users_model');
		$this->load->helper(array('form', 'url'));
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$this->form_validation->set_rules('lastName', 'Last Name', 'required');
			$this->form_validation->set_rules('firstName', 'First Name', 'required');
			$this->form_validation->set_rules('birth', 'Birthday', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');			
			$this->form_validation->set_rules('permis', 'Birthday', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('address', 'address', 'required');
			if($this->form_validation->run() == FALSE){
				
				$this->form_validation->set_message('lastName', 'Last Name error');
				$this->form_validation->set_message('firstName', 'First Name error');
				$this->form_validation->set_message('birth', 'Birthday error');
				$this->form_validation->set_message('email', 'Email error');
				$this->form_validation->set_message('permis', 'Birthday error');
				$this->form_validation->set_message('phone', 'Phone error');
				$this->form_validation->set_message('address', 'address error');
			} else {
				$data = array(
					'lastName' => $this->input->post('lastName'),
					'firstName' => $this->input->post('firstName'),
					'birth' => $this->input->post('birth'),
					'email' => $this->input->post('email'),
					'pass' => $this->input->post('pass'),
					'permis' => $this->input->post('permis'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address')
				);

				$this->users_model->create($data);
				$data['message'] = 'Data inserted successfully';
			}
		}
		$this->load->view('admins/create_user');
		
	}

	public function edit() {
		echo('edit');
	}

	public function forgetPassword() {
		echo('get password');
	}
}
