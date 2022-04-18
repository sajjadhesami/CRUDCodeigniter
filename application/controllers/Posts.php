<?php
    class Posts extends CI_Controller{

        public function index(){
        if(!$this->session->user_data['logged_in']){
            redirect("login");
        }
        else{
            echo $this->session->userdata("user_name") . "/" . $this->session->userdata("user_id") .
            "/" . $this->session->userdata("logged_in");
        }
    }
    }   