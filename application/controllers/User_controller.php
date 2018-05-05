<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {
    //Home page of this application 
	public function index()
	{   
		$data=array();

		$data['all_men_collection']=$this->user_model->view_men_shopping();
		$data['all_electronic_product']=$this->user_model->view_electronic_product();
		$data['all_women_collection']=$this->user_model->view_women_shopping();
		$data['all_home_decor']=$this->user_model->home_decor();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['user_home_content']=$this->load->view('user_home_content',$data,true);
		$this->load->view('user_dashboard',$data);
	}
	//Redirect the user to  signup page
	public function user_signup()
	{
		$data=array();
		$data['user_home_content']=$this->load->view('user_sign_up',$data,true);
		$this->load->view('user_dashboard',$data);
	}
	//User registration function that store the user information in database
	public function user_registration()
	{
		$this->load->model('User_model');
		$data=array();
		$data['user_name']=$this->input->post('user_name',true);
		$data['user_email']=$this->input->post('user_email',true);
		$data['user_password']=$this->input->post('user_password',true);
		$this->User_model->user_registration($data);
		$data['message']="Registration Successfull";
		$this->session->set_userdata($data);
		redirect('log-in',$data);

	}
    //Redirect user to log in page
	public function user_login()
	{
		$data=array();
		$data['all_category_info']=$this->admin_model->view_category_subcategory();
		$data['user_home_content']=$this->load->view('user_log_in',$data,true);
		$this->load->view('user_dashboard',$data);
	}
  //User's login verify function
	public function user_login_verify()
	{

		$data=array();
		$user_email=$this->input->post('user_email',true);
		$user_password=$this->input->post('user_password',true);
		$user_info=$this->user_model->user_login_verify($user_email,$user_password);

		if($user_info)
		{
			$data['user_name']=$user_info->user_name;
			$this->session->set_userdata($data);

			redirect(base_url(),$data);
		}else
		{
			$data['error']="Email or password is incorrect";
			$this->session->set_userdata($data);
			redirect('log-in',$data);
		}
		
	}
	public function log_out()
	{
    $this->session->unset_userdata('user_name');
	redirect(base_url());
	}
	
//load th contact us page
	public function contact_us()
	{
		$data=array();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['user_home_content']=$this->load->view('contact_us',$data,true);
		$this->load->view('user_dashboard',$data);
	}
	//Store viewer message to server
	public function send_viewer_msg()
	{
     $data=array();
        $this->user_model->store_message(); 
        $data['message']="Message has send . Please check  your email";
        $this->session->set_userdata($data);

		$data['all_category_info']=$this->admin_model->view_category();
		$data['user_home_content']=$this->load->view('contact_us',$data,true);
		$this->load->view('user_dashboard',$data);
	}
	//function for add product to cart
	public function add_product_cart()
	{
		$this->load->library('cart');
		$id=$this->input->post('id',true);
		$name=$this->input->post('name',true);
		$price=$this->input->post('price',true);
		$data = array(
        'id'      => $id,
        'qty'     => 1,
        'price'   => $price,
        'name'    => $name,
       
);

$this->cart->insert($data);
	
		

	}
//view item list in cart page
	public function view_cart()
	{
		$this->load->library('cart');
		$data=array();
		$data['cart_data']=$this->cart->contents();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['user_home_content']=$this->load->view('cart',$data,true);
		$this->load->view('user_dashboard',$data);
	}
	//delete item from cart
	public function delete_item_cart()
	{

		$rowid=$this->input->post('rowid',true);
		$this->load->library('cart');
		$data = array(
        'rowid' => $rowid,
        'qty'   => 0
);

$this->cart->update($data);
	
	
}
//check out
public function checkout()
{
	$this->load->library('cart');
		$data=array();
		$data['cart_data']=$this->cart->contents();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['user_home_content']=$this->load->view('checkout',$data,true);
		$this->load->view('user_dashboard',$data);
}
//place order
public function place_order()
{
	echo "<pre>";
	print_r($_POST);
}
}
