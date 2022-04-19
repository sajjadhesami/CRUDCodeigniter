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
                $this->load->view("posts",$data);
                
                $this->load->view("templates/footer_inside");
            }
        }
        public function addpost(){

            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>');
            $this->form_validation->set_rules("title", "Post Title", "required");
            $this->form_validation->set_rules("body", "Post Body", "required");            
    
            if ($this->form_validation->run() === FALSE) {
                $this->load->view("templates/header_inside");
                $data["btn_msg"]="Add post";
                $this->load->view("posts",$data);
                $this->load->view("templates/footer_inside");
            } else {
                $code=$this->Posts_Model->createPost($this->session->userdata["user_id"],$this->input->post("title"),$this->input->post("body"));
                if($code===0){                    
                    $this->session->set_flashdata('msg', 'New post has been added successfully.');
                    redirect("posts/addpost");
                }else{
                    $this->session->set_flashdata('msg', 'There was an error while adding your post. Please try again. (Error code: '.$code.')');                    
                    redirect("posts/addpost");                    
                }
            }            
        }
        public function deletepost($post_id){
            $this->load->view("templates/header_inside");
            $row=$this->Posts_Model->checkPost($post_id);
            if($row){
                if(($row->USER_ID==$this->session->userdata("user_id")) || $this->session->userdata("user_type")){                                        
                    $code=$this->Posts_Model->deletePost($post_id);
                    if($code===0){                    
                        $this->session->set_flashdata('msg', 'The post has been deleted successfully.');                            
                        redirect("posts");
                    }else{
                        $this->session->set_flashdata('msg', 'There was an error while deleteing your post. Please try again. (Error code: '.$code.')');
                        redirect("posts");                    
                    }                         
                }else{
                    $data["title"]="You are not authorized!";                
                    $this->load->view("home",$data);
                }
            }else{
                $data["title"]="There is no such a page!";                
                $this->load->view("home",$data);
            }
            $this->load->view("templates/footer_inside");
        }
        public function editpost($post_id){
            $this->load->view("templates/header_inside");
            $row=$this->Posts_Model->checkPost($post_id);
            if($row){
                if(($row->USER_ID==$this->session->userdata("user_id")) || $this->session->userdata("user_type")){
                    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">', '</div>');
                    $this->form_validation->set_rules("title", "Post Title", "required");
                    $this->form_validation->set_rules("body", "Post Body", "required");

                    if ($this->form_validation->run() === FALSE) {                        
                        $data["btn_msg"]="Edit post";
                        $data["post_id"]=$post_id;
                        $data["title"]=$row->POST_TITLE;
                        $data["body"]=$row->POST_BODY;
                        $this->load->view("posts",$data);
                    } else {
                        $code=$this->Posts_Model->updatePost($post_id,$this->session->userdata["user_id"],$this->input->post("title"),$this->input->post("body"));
                        if($code===0){                    
                            $this->session->set_flashdata('msg', 'The post has been updated successfully.');                            
                            redirect("posts");
                        }else{
                            $this->session->set_flashdata('msg', 'There was an error while updating your post. Please try again. (Error code: '.$code.')');                    
                            redirect("posts");                    
                        }
                    }          
                }else{
                    $data["title"]="You are not authorized!";                
                    $this->load->view("home",$data);
                }
            }else{
                $data["title"]="There is no such a page!";                
                $this->load->view("home",$data);
            }
            $this->load->view("templates/footer_inside");
        }

    } 