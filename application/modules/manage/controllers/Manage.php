<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Library and model.
		$this->load->database();
		$this->load->library('cart');
		$this->load->model('Admin_model');
		}

	public function index()
    {
        //Get all data from database
        $data['products'] = $this->Admin_model->get_all();
        //send all product data to "shopping_view", which fetch from database.
        $this->load->view('product',$data);
    }

	public function contact()
    {
        $data['contact'] = $this->Admin_model->get_contact();
        $this->load->view('contact',$data);
    }

    public function confirm()
    {
        $data['confirm'] = $this->Admin_model->get_customer();
        $this->load->view('confirm',$data);
    }

    public function confirm_detail($id,$lang="")
    {
        $lang = $this->session->userdata("lang")==null?"english":$this->session->userdata("lang");
        $this->lang->load($lang,$lang);
        $data['detail'] = $this->Admin_model->get_product($id);
        $this->load->view('confirm_detail',$data);
    }

    public function insert()
    {
        //Get all data from database
        $data['products'] = $this->Admin_model->get_all();
        //send all product data to "shopping_view", which fetch from database.
        $this->load->view('index',$data);
    }

    public function edit($id)
    {
        //Get all data from database
        $data['products'] = $this->Admin_model->edit($id);
        //send all product data to "shopping_view", which fetch from database.
        $this->load->view('edit',$data);
    }

    public function update_item()
    {
        $id         = $this->input->post('id');
        $name_th    = $this->input->post('name_th');
        $name_en    = $this->input->post('name_en');
        $detail_th  = $this->input->post('detail_th');
        $detail_en  = $this->input->post('detail_en');
        $price      = $this->input->post('price');
        $price_full = $this->input->post('price_full');
        $sale       = $this->input->post('sale');
        $cate       = $this->input->post('cate');

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
                'name'          => $name_th,
                'name_th'       => $name_th,
                'name_en'       => $name_en,
                'detail_th'     => $detail_th,
                'detail_en'     => $detail_en,
                'categories'    => $cate,
                'price'         => $price,
                'price_full'    => $price_full,
                'sale'          => $sale,
                'image'         => $config['file_name'],
                'image_path'    => $config['upload_path']
            );

            // var_dump($array);
            // exit();

            $where = array(
                'id'  => $id
            );

            $result = $this->Admin_model->update($array,$where, 'products');

             echo json_encode(array('result'=>true));
        }
        $this->load->view('product');
    }

	public function insert_item()
    {
        $name_th    = $this->input->post('name_th');
        $name_en    = $this->input->post('name_en');
        $detail_th  = $this->input->post('detail_th');
        $detail_en  = $this->input->post('detail_en');
        $price      = $this->input->post('price');
        $price_full = $this->input->post('price_full');
        $sale       = $this->input->post('sale');
        $cate       = $this->input->post('cate');

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

				// var_dump($_FILES);

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
                'name'          => $name_th,
                'name_th'       => $name_th,
                'name_en'       => $name_en,
                'detail_th'     => $detail_th,
                'detail_en'     => $detail_en,
                'categories'    => $cate,
                'price'         => $price,
                'price_full'    => $price_full,
                'sale'          => $sale,
                'image'         => $config['file_name'],
                'image_path'    => $config['upload_path']
            );

            // var_dump($array);
            // exit();

            $result = $this->Admin_model->insertRecord($array, 'products');

             echo json_encode(array('result'=>true));
        }
        $this->load->view('index');
    }

    public function delete($id)
    {
        $this->Admin_model->delete_db($id);
    }

}
