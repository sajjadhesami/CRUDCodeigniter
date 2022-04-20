<?php
class Users_setting extends CI_Controller{
    public function index(){
        if(!$this->session->userdata['logged_in']){
            redirect("login");
        }
        if(!$this->session->userdata["user_type"]){
            redirect("home");
        }
                
        $data["users"]=$this->User_Model->getAllUsers();        
        $this->load->view('templates/header_inside');
        $this->load->view('users_setting',$data);
        $this->load->view('templates/footer_inside');        
    }
    public function makeadmin($id,$value){
        if(!$this->session->userdata['logged_in']){
            redirect("login");
        }
        if(!$this->session->userdata["user_type"]){
            redirect("home");
        }
        $code=$this->User_Model->updateUser($id,!$value);
        if($code===0){                    
            $this->session->set_flashdata('msg', 'The user has been changed successfully.');            
        }else{
             $this->session->set_flashdata('msg', 'There was an error while changing the user. Please try again. (Error code: '.$code.')');
        }                         
        redirect("users_setting");        
    }
    public function deleteuser($id){
        if(!$this->session->userdata['logged_in']){
            redirect("login");
        }
        if(!$this->session->userdata["user_type"]){
            redirect("home");
        }
        $code=$this->User_Model->deleteUser($id);
        if($code===0){                    
            $this->session->set_flashdata('msg', 'The user has been deleted successfully.');            
        }else{
            $this->session->set_flashdata('msg', 'There was an error while deleteing the user. Please try again. (Error code: '.$code.')');
        }                         
        redirect("users_setting");                            
    }
}