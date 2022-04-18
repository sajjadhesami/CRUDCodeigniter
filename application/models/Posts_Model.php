<?php
class Posts_Model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function createPost($user_id,$title,$body){
        $data=array(
            'USER_ID' => $user_id,
            'POST_TITLE' => substr($username,0,50),
            'POST_BODY' => $body,
            'POST_TIME' => date('Y-m-d H:i:s')
        );
        $this->db->insert("TBL_POSTS",$data);
        $php_errormsg=$this->db->error();
        return $php_errormsg;
    }
    public function readAllPosts(){
        $this->db->select("*");
        $this->db->from("TBL_POSTS");
        $this->db->order_by("POST_TIME","DESC");
        $query=$this->db->get();
        return $query->result_array();
    }

}