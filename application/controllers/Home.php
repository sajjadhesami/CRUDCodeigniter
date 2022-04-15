<?php

class Home extends CI_Controller
{
	public function index(){

		$this->load->view('templates/header');
		$data["title"]="Welcome to Simple CodeIgniter CMS";
		$this->load->view('home',$data);
		$this->load->view('templates/footer');
	}
}
