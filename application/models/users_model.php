<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_Model extends CI_Model {

	public function create($data)
	{
		var_dump($data); 
		$today = date('Y-m-d');
		$token = '123456';

		$arrData = array(
			'email' => $data['email'],
			'password' => $data['pass'],
			'first_name' => $data['firstName'],
			'last_name' => $data['lastName'],
			'permission' => $data['permis'],
			'birth_day' => $data['birth'],
			'phone' => $data['phone'],
			'address' => $data['address'],
			'token' => $token,
			'created_at' => $today,
			'updated_at' => $today
		);
		try {
			$query = $this->db->insert('user',$arrData);
				echo "success";
		} catch(Exception $e){
			var_dump($e);exit;
		}
		// var_dump( $this->db->query($sql));die;
		// $query = $this->db->query('SELECT * FROM user');
		// if($query) {
		// } else {
		// 	$this->db->_error_message(); 
		// 	$this->db->_error_number(); 
		// }

		die;
	}

	
}
