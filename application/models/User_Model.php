<?php
	class User_Model extends CI_Model{

		public function __construct()
		{
			$this->load->database();
		}
		public function createUser(){
			$data=array(
				'USERNAME' => $this->input->post("user_name"),
				'USER_PASS' => $this->input->post("user_pass"),
				'USER_TYPE' => FALSE
			);
			return $this->db->insert("TBL_USERS",$data);
		}
	}
