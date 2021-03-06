<?php

class Login extends CI_Controller
{
	public function index()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			redirect("posts");				
		}
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>');
		$this->form_validation->set_rules("user_name", "User Name", "required");
		$this->form_validation->set_rules("pass", "User Password", "required");

		if ($this->form_validation->run() === TRUE) {


			$res = $this->User_Model->checkUser($this->input->post()["user_name"], $this->input->post()["pass"]);
			if (!$res) {
				$this->load->view('templates/header');
				$data["title"] = "Login to Simple CodeIgniter CMS";
				$this->load->view('login', $data);
				$this->load->view('templates/footer');
			} else {
				$this->load->view('templates/header');				
				$type=$this->User_Model->checkUserType($res);
				$user_data = array(
					"user_name" => $this->input->post()["user_name"],
					"user_id" => $res,
					"logged_in" => TRUE,
					"user_type" => $type
				);
				$this->session->set_userdata($user_data);
				redirect("posts");

				$this->load->view('login', $data);
				$this->load->view('templates/footer');
			}
		} else {

			$this->load->view('templates/header');
			$data["title"] = "Login to CRUD Codeigniter";
			$this->load->view('login', $data);
			$this->load->view('templates/footer');
		}
	}
}
