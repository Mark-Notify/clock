<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller 
{

	public function __construct()
	{
	parent::__construct();
	//Load Library and model.
	$this->load->database();
	$this->load->library('cart');
	$this->load->model('cart_model');
	}

	public function index()
	{
		// Load "orders".
		$this->load->view('orders');
	}

	public function save_order()
	{
		// This will store all values which inserted from user.
		$customer = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'status' => $this->input->post('status')
		);
		// var_dump($customer);
		// And store user information in database.
		$cust_id = $this->cart_model->insert_customer($customer);
		$order = array(
			// 'date' => date('Y-m-d'),
			'track_id' => 'TH'.rand(100000000,999999999),
			'customerid' => $cust_id
		);
		
		$ord_id = $this->cart_model->insert_order($order);
		if ($cart = $this->cart->contents()):
		foreach ($cart as $item):
		$order_detail = array(
			'orderid' => $ord_id,
			'productid' => $item['id'],
			'quantity' => $item['qty'],
			'price' => $item['price']
		);

		// Insert product imformation with order detail, store in cart also store in database.

		$cust_id = $this->cart_model->insert_order_detail($order_detail);
		endforeach;
		endif;

		$this->cart->destroy();

		// After storing all imformation in database load "billing_success".
		// $this->load->view('home');
		header('Location: '.base_url("/track"));
	}
}
