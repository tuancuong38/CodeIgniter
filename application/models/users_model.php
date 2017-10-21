<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_Model extends CI_Model {

	public function create($data)
	{
	
		$today = date('Y-m-d');
		$arrData = array(
			'email' => $data['email'],
			'password' => md5($data['pass']),
			'first_name' => $data['firstName'],
			'last_name' => $data['lastName'],
			'permission' => $data['permis'],
			'birth_day' => $data['birth'],
			'phone' => $data['phone'],
			'address' => $data['address'],
			'token' => md5(microtime()) . rand(0,26),
			'created_at' => $today,
			'updated_at' => $today
		);
		try {
			$query = $this->db->insert('user', $arrData);
				echo "success";
		} catch(Exception $e){
			var_dump($e);
		}
	}

	public function check_login($data){
	
			$arrData = array(
				'email' => $data['email'],
				'password' => md5($data['pass'])
			);
			$this->db->where('email', $data['email']);
			$this->db->where('password', md5($data['pass']));
			$query = $this->db->get('user');
			// var_dump($this->db->last_query());die;
			if($query!= NULL && $query->num_rows() > 0 ){
				// var_dump($query->row_array());exit;
				return $query->row_array();
			}
			echo('fail');
			return false;
	
	}

	public function getUser($token){
		$this->db->where('token', $token);
		$query = $this->db->get('user');
		if($query != NULL && $query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}
	
}
