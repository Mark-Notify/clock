<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function __construct()
	{
	parent::__construct();
	//Load Library and model.
	$this->load->database();
	$this->load->library('cart');
	$this->load->model('cart_model');
	$this->load->model('Admin_model');
	}

    public function index($lang="")
    {
        $lang = $this->session->userdata("lang")==null?"english":$this->session->userdata("lang");
        $this->lang->load($lang,$lang);
        $this->load->view('index');
    }

    public function change($type)
    {
        $this->session->set_userdata('lang',$type);
        redirect("","refresh");
    }

	public function insert_contact()
    {
        $name     = $this->input->post('name');
        $email    = $this->input->post('email');
        $subject  = $this->input->post('subject');
        $message  = $this->input->post('message');

            $array = array(
                'name'        => $name,
                'email'       => $email,
                'subject'     => $subject,
                'message'     => $message
            );

            // var_dump($array);
            // exit();

            $result = $this->Admin_model->insertRecord($array, 'contact');

             echo json_encode(array('result'=>true));
        
        $this->load->view('index');
    }
}
