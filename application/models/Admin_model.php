<?php

class Admin_model extends CI_Model  //ส่วนของ Class
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //เพิ่มข้อมูลรับค่าจากห้าคอนโทรเลอร์(Controller)
    public function insertRecord($array=null , $database=null) //ส่วนของ Method
    {
        $result = $this->db->insert($database, $array);
        // $last_id = $this->db->insert_id();
        if ($result)
        {
           redirect("home");
        }
        return false;

        return $this->db->insert($database, $array);
    }

    public function get_customer()
    {
        $this->db->select('*');
        $this->db->from('orders a'); 
        $this->db->join('customers b', 'b.id=a.customerid', 'left');      
        $query = $this->db->get(); 
        return $query->result_array();
    }

    public function get_product($id)
    {
        $this->db->select('*');
        $this->db->from('order_detail a'); 
        $this->db->join('products d', 'd.id=a.productid', 'left');
        $this->db->where('orderid' , (int) $id);
        // $this->db->order_by('c.track_title','asc');         
        $query = $this->db->get(); 
        return $query->result_array();
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('products');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_contact()
    {
        $this->db->select('*');
        $this->db->from('contact');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function edit($id=null)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('id' , (int) $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update($array=null, $where=false , $database=null)
    {
      $result = $this->db->update($database, $array , $where);
      if ($result)
        {
           redirect("home");
        }
        return false;

        return $this->db->update($database, $array , $where);
    }

    public function delete_db($id)
    {
        $this->db->where('id', $id);
        // $this->db->delete('products');
        $result = $this->db->delete('products');
        if ($result)
        {
           redirect("manage");
        }
    }


}
