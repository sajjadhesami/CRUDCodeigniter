<?php

class Logout extends CI_Controller{
    public function index(){
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata("user_id");
        $this->session->unset_userdata("logged_in");
        redirect("home");
    }
}