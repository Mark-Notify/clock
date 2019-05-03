<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Library and model.
		$this->load->database();
		$this->load->library('cart');
		$this->load->model('cart_model');
	}

	public function slide($lang="")
	{
		$lang = $this->session->userdata("lang")==null?"english":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		$this->load->view('slide');
	}

	public function index($lang="")
	{
		$lang = $this->session->userdata("lang")==null?"english":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		//Get all data from database
		$data['products'] = $this->cart_model->get_all();
		//send all product data to "shopping_view", which fetch from database.
		$this->load->view('index',$data);
	}

	public function detail($id, $lang="")
	{
		$lang = $this->session->userdata("lang")==null?"english":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		$data['detail'] = $this->cart_model->get_detail($id);

		$data['products'] = $this->cart_model->get_pro_detail();

        $this->load->view('detail',$data);
	}

	public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		redirect("./","refresh");
	}

	function add()
	{
		// Set array for send data.
		$insert_data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'image' => $this->input->post('image'),
				'qty' => 1
				);
		// This function add items into cart.
		$this->cart->insert($insert_data);
		echo $fefe = count($this->cart->contents());
		// This will show insert data in cart.
	}

	public function opencart()
    {
        $data['cart']  = $this->cart->contents();
        $this->load->view("cart_model", $data);
    }

    function remove() 
    {
		$rowid = $this->input->post('rowid');
		// Check rowid value.
		if ($rowid==="all"){
			// Destroy data which store in session.
				$this->cart->destroy();
				// redirect("refresh");
			}
			else
			{
				// Destroy selected rowid in session.
				$data = array(
						'rowid' => $rowid,
						'qty' => 0
						);
				// Update cart data, after cancel.
				$this->cart->update($data);
			}
				echo $fefe = count($this->cart->contents());
				// This will show cancel data in cart.
		// redirect("refresh");
	}



	function update_cart()
	{
		// Recieve post values,calcute them and update
		$rowid = $_POST['rowid'];
		$price = $_POST['price'];
		$amount = $price * $_POST['qty'];
		$qty = $_POST['qty'];

		// alert($price);

		$data = array(
			'rowid' 	=> $rowid,
			'price' 	=> $price,
			'amount' 	=> $amount,
			'qty' 		=> $qty
			);
		// var_dump($data);
		$this->cart->update($data);
		echo $data['amount'];
	}

	function orders()
	{
		// Load "billing_view".
		$this->load->view('orders');
	}

	public function save_order()
	{
		// This will store all values which inserted from user.
		$customer = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone')
		);
		// And store user information in database.
		$cust_id = $this->cart_model->insert_customer($customer);
		$order = array(
			'date' => date('Y-m-d'),
			'customerid' => $cust_id
		);
		
		$ord_id = $this->cart_model->insert_order($order);
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
			$order_detail = array(
				'orderid' 	=> $ord_id,
				'productid' => $item['id'],
				'quantity' 	=> $item['qty'],
				'price' 	=> $item['price']
			);

			// Insert product imformation with order detail, store in cart also store in database.

			$cust_id = $this->cart_model->insert_order_detail($order_detail);
		endforeach;
		endif;

		$this->cart->destroy();

		// After storing all imformation in database load "billing_success".
		$this->load->view('index');
	}
}
