<?php

class Home extends CI_Controller
{
	public function index(){
		if(isset($this->session->userdata['logged_in']))
		{
			redirect("posts");				
		}
		$this->load->view('templates/header');
		$data["title"]="Welcome to CRUD Codeigniter";
		$this->load->view('home',$data);
		$this->load->view('templates/footer');
	}
}
