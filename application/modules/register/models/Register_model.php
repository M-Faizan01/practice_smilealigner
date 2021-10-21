<?php
/**
 * model Name: Register_model
 * Description: front end Register_model
 * @author Muhammad Irfan Aslam
 * Created date: 2020-07-11
 */
class Register_model extends CI_Model {
    function __construct() 
    {
        parent :: __construct();
    }
    
    function insertUser($data)
    {
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    } 
    function getUserData($email)
    {
        $this->db->select("*");
        $this->db->from('users'); 
        $this->db->where('email', $email);
        $q = $this->db->get();
        return $q->result_array();
    } 
    function is_email_available($email) {
      $this->db->where('email', $email);  
      $query = $this->db->get("users");  
        if($query->num_rows() > 0){  
          return true;  
        }  
        else{  
          return false;  
        }  
    }  
   
}