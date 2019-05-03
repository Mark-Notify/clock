<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Track extends MY_Controller {

	public function __construct()
	{
	parent::__construct();
	//Load Library and model.
	$this->load->database();
	$this->load->library('cart');
	$this->load->model('cart_model');
	}

	public function index(){
	// Load "billing_view".
	$this->load->view('index');
	}
}
