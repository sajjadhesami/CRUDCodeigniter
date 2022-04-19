<?php
	class User_Model extends CI_Model{

		public function __construct()
		{
			$this->load->database();
		}

		public function checkUserType($user_id){
			$this->db->select("*");
			$this->db->from("TBL_USERS");
			$this->db->where('USER_ID', $user_id);			
			$query=$this->db->get();
			if($query->num_rows()===1){
				return $query->row(0)->USER_TYPE;
			}else{
				return FALSE;
			}
			
		}

		public function createUser($username,$password,$isAdmin){
			$data=array(
				'USERNAME' => strtolower($username),
				'USER_PASS' => hash ("sha256", $password),
				'USER_TYPE' => $isAdmin
			);
			$this->db->insert("TBL_USERS",$data);
			$php_errormsg=$this->db->error();
			return $php_errormsg;
		}
		public function checkUser($username,$password){
			$this->db->select("*");
			$this->db->from("TBL_USERS");
			$this->db->where('USERNAME', $username);
			$this->db->where('USER_PASS', hash("sha256",$password));
			$query=$this->db->get();
			if($query->num_rows()===1){
				return $query->row(0)->USER_ID;
			}else{
				return FALSE;
			}
		}
		public function getUserName($user_id){
			$this->db->select("*");
			$this->db->from("TBL_USERS");
			$this->db->where('USER_ID', $user_id);			
			$query=$this->db->get();
			if($query->num_rows()===1){
				return $query->row(0)->USERNAME;
			}else{
				return FALSE;
			}
		}
	}
