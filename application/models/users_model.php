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
			'token' => md5($data['pass']),
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

	
}
