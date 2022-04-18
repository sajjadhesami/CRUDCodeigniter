<?php

class Register extends CI_Controller
{
	public function index()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			redirect("posts");				
		}
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
			$code=$this->User_Model->createUser($this->input->post("user_name"),$this->input->post("user_pass"),FALSE)['code'];
			if($code===0){
				$this->load->view('templates/header');
				$data['title']="New user has been added successfully. You can Login now!";
				$this->load->view('home',$data);
				$this->load->view('templates/footer');
			}else{
				$this->load->view('templates/header');
				$data['title']="There was an error while adding your username. Please try again with another username. (Error code: ".$code.")";
				$this->load->view('home',$data);
				$this->load->view('templates/footer');
			}
		}
	}
}

?>
