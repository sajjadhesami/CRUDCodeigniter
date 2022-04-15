<?php
	class Login extends CI_Controller{
		public function index(){
			$this->load->view('templates/header');
			$data["title"]="Login to Simple CodeIgniter CMS";
			$this->load->view('login',$data);
			$this->load->view('templates/footer');
		}
	}
