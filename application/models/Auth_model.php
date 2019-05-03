<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_model{

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //เพิ่มข้อมูลรับค่าจากห้าคอนโทรเลอร์(Controller)
    public function insertRecord($array=null , $database=null)
    {
        $result = $this->db->insert($database, $array); 
        // $last_id = $this->db->insert_id();  
        if ($result) {
           echo"<script>alert('success');</script>";
           redirect(base_url('/all'));
        }
        return false;
        
        return $this->db->insert($database, $array);
    }

    //เพิ่มข้อมูลรับค่าจากห้าคอนโทรเลอร์(Controller)
    public function register($array=null , $database=null)
    {
        $result = $this->db->insert($database, $array); 
        if ($result) {
           redirect("home");
        }
        return false;
        return $this->db->insert($database, $array);
    }

    

    public function can_login($user, $pass)
    {
    	$this->db->where('user', $user);
    	$this->db->where('pass', $pass);
    	$query = $this->db->get('member');
    	// SELECT * FROM member WHERE username = '$username' AND password = '$password'
        return $query->result_array();
    }
}