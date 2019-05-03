<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forum_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // เรียกสินค้าทั้งหมดจากฐานข้อมูล
    public function get_all(){
        $query=$this->db->query("SELECT *
                                 FROM post p
                                 ORDER BY p.id ASC");
        return $query->result_array();
    }


    // เรียกข้อมูลการโพสต์จาก id
    public function post($id=null)
    {
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('id' , $id);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // เรียกข้อมูลการแสดงความคิดเห็นจาก id
    public function comment($id=null)
    {
        $this->db->select('*');
        $this->db->from('comment');
        $this->db->where('post_id' , $id);
        $this->db->order_by('com_id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    //เพิ่มข้อมูลรับค่าจากห้าคอนโทรเลอร์(Controller)
    public function post_insert($array=null , $database=null)
    {
        $result = $this->db->insert($database, $array);
        if ($result) {
           redirect("forum");
        }
        return $this->db->insert($database, $array);
    }

    public function com_insert($array=null , $database=null)
    {
        // var_dump($array["post_id"]);
        // exit();
        $result = $this->db->insert($database, $array);
        if ($result) {
           redirect("forum/comment/".$array["post_id"]);
        }
        return $this->db->insert($database, $array);
    }

}
