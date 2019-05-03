<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends MY_Controller {

	public function __construct()
	{
	parent::__construct();
	//Load Library and model.
	$this->load->database();
	$this->load->library('cart');
	$this->load->model('Forum_model');
	}

	public function index($lang="")
    {
        $lang = $this->session->userdata("lang")==null?"english":$this->session->userdata("lang");
        $this->lang->load($lang,$lang);
        //Get all data from database
        $data['post'] = $this->Forum_model->get_all();
        //send all product data to "shopping_view", which fetch from database.
        $this->load->view('index',$data);
    }

    public function change($type)
    {
        $this->session->set_userdata('lang',$type);
        redirect("","refresh");
    }

    public function comment($id)
    {
        $data['post'] = $this->Forum_model->post($id);

        $data['comment'] = $this->Forum_model->comment($id);

        $this->load->view('comment',$data);
    }

    public function insert_item()
    {
        // $this->load->model('Forum_model');

        $title1         = $this->input->post('title');
        $detail         = $this->input->post('detail');
        $s_name         = $this->input->post('s_name');
        $s_user         = $this->input->post('s_user');
        $s_about        = $this->input->post('s_about');
        $s_profile      = $this->input->post('s_profile');
        $s_profile_path = $this->input->post('s_profile_path');

        // $upload_path = FCPATH . 'upload';
        // $upload_path ='C:\xampp\htdocs\clock\upload';

        // if(!file_exists($upload_path)) mkdir($upload_path);

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

            $this->upload->do_upload('file');

            $array = array(
                'title'         => $title1,
                'detail'        => $detail,
                'name'          => $s_name,
                'user'          => $s_user,
                'about'         => $s_about,
                'profile'       => $s_profile,
                'profile_path'  => $s_profile_path,
                'image'         => $config['file_name'],
                'image_path'    => $config['upload_path']
            );

            // var_dump($array);
            // exit();

            $result = $this->Forum_model->post_insert($array, 'post');

             echo json_encode(array('result'=>true));
        }
        $this->load->view('index');
    }


    public function insert_com()
    {
        $name       = $this->input->post('c_name');
        $profile    = $this->input->post('c_profile');
        $post_id    = $this->input->post('c_post_id');
        $detail     = $this->input->post('detail');

        $array = array(
                'c_name' => $name ,
                'c_profile' => $profile ,
                'post_id' => $post_id,
                'c_detail' => $detail
            );
        // var_dump($array);
        // exit($array);
        $result = $this->Forum_model->com_insert($array,'comment');
        echo json_encode(array('result'=>true));

    }

	public function post()
    {
        $title1     	= $this->input->post('title');
        $detail     	= $this->input->post('detail');
        $s_name         = $this->input->post('s_name');
        $s_user         = $this->input->post('s_user');
        $s_about     	= $this->input->post('s_about');
        $s_profile     	= $this->input->post('s_profile');
        $s_profile_path = $this->input->post('s_profile_path');


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


            $this->upload->do_upload('file');
            $array = array(
                'title'  	 	=> $title1,
                'detail'  	 	=> $detail,
                'name'          => $s_name,
                'user'          => $s_user,
                'about'  	 	=> $s_about,
                'profile'  	 	=> $s_profile,
                'profile_path'  => $s_profile_path,
                'image'      	=> $config['file_name'],
                'image_path' 	=> $config['upload_path']
            );

            // var_dump($array);
            // exit();
            $result = $this->Forum_model->post_insert($array,'post');

             echo json_encode(array('result'=>true));
        }
        $this->load->view('index');
    }

}
