<?php

class Register extends CI_Controller
{
	public function index()
	{

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>');
		$this->form_validation->set_rules("user_name", "User Name", "required");
		$this->form_validation->set_rules("user_pass", "User Password", "required");
		$this->form_validation->set_rules("re_pass", "Repeated Password", "required|matches[user_pass]");

		if ($this->form_validation->run() === FALSE) {

			$this->load->view('templates/header');
			$data["title"] = "Please enter your information:";
			$this->load->view('register', $data);
			$this->load->view('templates/footer');
		} else {
			$this->User_Model->createUser();
		}
	}
}

?>
