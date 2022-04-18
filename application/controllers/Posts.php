<?php
    class Posts extends CI_Controller{

        public function index(){
            if(!$this->session->userdata['logged_in']){
                redirect("login");
            }
            else{
                $this->load->view("templates/header_inside");

                $result=$this->Posts_Model->readAllPosts();
                $data["posts"]=$result;
                $data["title"]="hello";
                $this->load->view("posts",$data);
                
                $this->load->view("templates/footer_inside");
            }
        }
        public function addpost(){
            $this->load->view("templates/header_inside");
                $this->load->view("posts");
                
                $this->load->view("templates/footer_inside");
        }

    } 