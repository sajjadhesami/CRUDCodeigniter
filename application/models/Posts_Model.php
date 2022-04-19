<?php
class Posts_Model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function createPost($user_id,$title,$body){
        $data=array(
            'USER_ID' => $user_id,
            'POST_TITLE' => substr($title,0,50),
            'POST_BODY' => $body,
            'POST_TIME' => date('Y-m-d H:i:s')
        );
        $this->db->insert("TBL_POSTS",$data);
        $php_errormsg=$this->db->error();                
        return $php_errormsg['code'];
    }
    public function updatePost($post_id,$user_id,$title,$body){
        $data=array(
            'USER_ID' => $user_id,
            'POST_TITLE' => substr($title,0,50),
            'POST_BODY' => $body,
            'POST_TIME' => date('Y-m-d H:i:s')
        );
        $this->db->where("POST_ID",$post_id);
        $this->db->update("TBL_POSTS",$data);
        $php_errormsg=$this->db->error();
        return $php_errormsg['code'];
    }
    public function deletePost($post_id){        
        $this->db->where("POST_ID",$post_id);
        $this->db->delete("TBL_POSTS");
        $php_errormsg=$this->db->error();
        return $php_errormsg['code'];
    }
    public function readAllPosts(){
        $this->db->select("*");
        $this->db->from("TBL_POSTS");
        $this->db->order_by("POST_TIME","DESC");
        $query=$this->db->get();
        return $query->result_array();
    }
    public function checkPost($post_id){
        $this->db->select("*");
        $this->db->from("TBL_POSTS");
        $this->db->where("POST_ID",$post_id);        
        $query=$this->db->get();
        if($query->num_rows()===1){
            return $query->row(0);
        }else{
            return FALSE;
        }        
    }

}