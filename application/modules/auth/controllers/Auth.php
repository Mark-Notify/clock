<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Library and model.
		$this->load->database();
		$this->load->library('cart');
		$this->load->model('cart_model');
        $this->load->model('auth_model');
	}

	public function index()
	{
		// Load "index".
		$this->load->helper('url');
		$this->load->view('index');
	}

	public function insert_item()
    {
        $user     = $this->input->post('user');
        $pass     = $this->input->post('pass');
        $name     = $this->input->post('name');
        $profile  = $this->input->post('profile');
        $about 	  = $this->input->post('about');

        //$upload_path = FCPATH . 'upload';
        // $upload_path = base_url().'upload';
        // $upload_path ='C:\xampp\htdocs\clock\upload';
        // if(!file_exists($upload_path));

        // var_dump($_FILES);

        if(!$_FILES) redirect(base_url('index'));


        list($title, $ext)  = explode('.', $_FILES['file']['name'][0]);
        $fileName = date('Y-m-d').'-'.time();

        // $config = [];

        $config['upload_path']          = './upload/';
        $config['file_name']            = $fileName . '.' . $ext;
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $config['max_size']             = 10000;
        $config['max_width']            = 3000;
        $config['max_height']           = 2000;


        $this->load->library('upload', $config);

        // $uploads = [];
        $files = $_FILES;
        $count = count($_FILES['file']['name']);
        // วนลูปหาแต่ล่ะไฟล์ อัพโหลด
        for($i = 0; $i < $count; $i++)
        {
            $_FILES['file']['name'] = $files['file']['name'][$i];
            $_FILES['file']['type'] = $files['file']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
            $_FILES['file']['size'] = $files['file']['size'][$i];
            $_FILES['file']['error'] = $files['file']['error'][$i];


            if($this->upload->do_upload('file')) 
            {
                // ถ้าไม่มีข้อผิดพลาด
                // $uploads = [
                //     'error' => false,
                //     'file_name' => $this->upload->data()['file_name'],
                //     'message' => null
                // ];
            }
            else 
            {
                // echo $this->upload->display_errors();
                // echo $config['upload_path'];
                // ถ้าเกิดข้อผิดพลาด
                // $uploads[] = [
                //     'error' => true,
                //     'file_name' => $_FILES['file']['name'],
                //     'message' => $this->upload->display_errors()
                // ];
            }
            $array = array(
                'user'  => $user,
                'pass'  => $pass,
                'pass_hash'  => md5($pass),
                'name'		=> $name,
                'profile'      => $config['file_name'],
                'profile_path' => $config['upload_path'],
                'about'  => $about
            );

            // var_dump($array);
            // exit();
            $result = $this->auth_model->register($array,'member');

             echo json_encode(array('result'=>true));
        }
        $this->load->view('index');
    }

    public function login()
    {
    	$user 			= $this->input->post('user');  
        $pass 			= $this->input->post('pass');

        if (!empty($user) && !empty($pass))   
        {  
            if ($a = $this->auth_model->can_login($user, $pass)) 
            {
            	$session_data = array(
                			'user' 			=> $user,
                			'name' 			=> $a[0]['name'],
                			'profile' 		=> $a[0]['profile'],
                            'profile_path'  => $a[0]['profile_path'],
                			'about' 		=> $a[0]['about'],
                			'status' 		=> $a[0]['status']
            			);
            	$this->session->set_userdata($session_data);
            	redirect("forum");
            }
            else
            {
            	$this->session->set_flashdata('error', 'ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง');
            	redirect("home");
            }
        }  
        else
        {  
        	//false
        	// redirect("home");
            // $data['error'] = 'Your Account is Invalid';  
            // $this->load->view('home', $data);  
        } 
    }

    function logout()
    {
        $newdata = array(
                    'user'  =>'',
                    'name'  =>'',
                    'profile'  =>'',
                    'profile_path' => '',
                    'about'  =>'',
                    'profile'  =>'',
                    'status' => '',
                   );

         $this->session->unset_userdata($newdata);
         $this->session->sess_destroy();
         // redirect('default_controller','refresh');
    }

}
