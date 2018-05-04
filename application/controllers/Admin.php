<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
    //this function redirect the admin login page
	public function backend()
	{
		$this->load->view('admin/admin_login_form');
	}

    //After login admin's dash board
	public function dashboard()
	{
		$data=array();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['admin_main_content']=$this->load->view('admin/admin_main_content',$data,true);
		$this->load->view('admin/dashboard',$data);
	}
    //Admin login verify function
	public function admin_login()
	{
		$data=array();
		$data['email']=$this->input->post('email',true);
		$data['password']=$this->input->post('password',true);
		$result=$this->admin_model->login($data);
		$admin_info=array();
		$admin_info['name']=$result->name;
		$this->session->set_userdata($admin_info);
		if($result){
			redirect('admin-panel',$admin_info);
		}else{

			$data=array();
			$data['email_password_error']="Email or password is incorrect";
			$this->session->set_userdata($data);
			redirect('backend',$data);
		}

		//$data['admin_main_content']=$this->load->view('admin/admin_main_content','',true);
		//$this->load->view('admin/dashboard',$data);
	}
//this is the admin logout function
	public function logout()
	{
		$this->session->unset_userdata('name');
		redirect('backend');
	}


	//view mageesge
	public function view_message($viewer_msg_id)
	{
		
		$data=array();
		//$message_id=$this->input->post('message_id',true);
		$data['message_info']=$this->admin_model->message_view($viewer_msg_id);
		$this->admin_model->update_message_status($viewer_msg_id);

		$data['all_message_info']=$this->admin_model->view_message();
		$data['admin_main_content']=$this->load->view('admin/view_message',$data,true);
		$this->load->view('admin/dashboard',$data);
	}
   // This function redirect the add_category page .
	public function add_category()
	{
		$data=array();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['admin_main_content']=$this->load->view('admin/add_category_form','',true);
		$this->load->view('admin/dashboard',$data);

	}
	//Store the category information in database
	public function category_save()
	{
		$data=array();
		$data['category_name']=$this->input->post('category_name',true);
		$this->admin_model->category_save($data);
		$mdata=array();
		$mdata['message']="Category added successfully";
		$this->session->set_userdata($mdata);
		redirect('add-category'); 
	}
    // This function redirect the add_subcategory page .
	public function add_subcategory()
	{
		$data=array();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['admin_main_content']=$this->load->view('admin/add_subcategory_form',$data,true);
		
		$this->load->view('admin/dashboard',$data);
	}
	//Store the sub-category information in database.
	public function save_subcategory(){
		$data=array();
		$data['sub_category_name']=$this->input->post('sub_category_name',true);
		$data['category_id']=$this->input->post('category_id',true);
		$this->admin_model->save_subcategory($data);
		$sdata=array();
		$sdata['message']="Sub category added successfully";
		$this->session->set_userdata($sdata);
		redirect('add-sub-category',$sdata);


	}
	//View the subcategory information from database and show in add item page
	public function view_subcategory()
	{

		$category_id=$this->input->post('category_id',true);
		$all_subcategory_info=$this->admin_model->view_subcategory($category_id);
		if(count($all_subcategory_info)>0){

			$subc_select_box='';
			$subc_select_box.='<option value="">Select subcategory</option>';
			foreach ($all_subcategory_info as $subcategory) {
				$subc_select_box.='<option value="'.$subcategory->subcategory_id.'">'.$subcategory->sub_category_name.'</option>';

			}
			echo json_encode($subc_select_box);
		}

	}
    //View the item's information from database and show the information in add product page
	public function view_item()
	{

		$subcategory_id=$this->input->post('subcategory_id',true);
		$all_item_info=$this->admin_model->view_item($subcategory_id);
		if(count($all_item_info)>0){

			$item_select_box='';
			$item_select_box.='<option value="">Select Item</option>';
			foreach ($all_item_info as $item) {
				$item_select_box.='<option value="'.$item->item_id.'">'.$item->item_name.'</option>';

			}
			echo json_encode($item_select_box);
		}

	}

 //This function redirect the admin to the add_item page
	public function add_item()
	{
		$data=array();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['admin_main_content']=$this->load->view('admin/add_item_form',$data,true);
		
		$this->load->view('admin/dashboard',$data);
	}
 //Store the item's information in database from add_item page
	public function save_item()
	{
		$data=array();
		$data['item_name']=$this->input->post('item_name',true);
		$data['category_id']=$this->input->post('category_id',true);
		$data['subcategory_id']=$this->input->post('subcategory_id',true);
		$this->admin_model->save_item($data);
		$data['message']="Item added successfully";
		$this->session->set_userdata($data);
		redirect('add-item',$data);


	}

	// This function redirect the admin to the add_product page 
	public function add_product()
	{
		$data=array();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['admin_main_content']=$this->load->view('admin/add_product_form',$data,true);
		
		$this->load->view('admin/dashboard',$data);
	}
	//Store the product's information in database
	public function store_product(){


		$this->admin_model->store_product();
		$data=array();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['admin_main_content']=$this->load->view('admin/add_product_form',$data,true);
		$data['message']="product added successfully";
		$this->session->set_userdata($data);
		redirect('add-product',$data);

	}
//Redirect the manage the product information page
	public function manage_product(){
		$data=array();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_product_info']=$this->admin_model->all_product_info();
		$data['admin_main_content']=$this->load->view('admin/manage_product',$data,true);
		$this->load->view('admin/dashboard',$data);

	}
       //redirect the add inventory page
	public function add_inventory()
	{
     $data=array();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['admin_main_content']=$this->load->view('admin/add_inventory_form',$data,true);
		
		$this->load->view('admin/dashboard',$data);
	}
	//view the inventory information and show manage inventory page
	public function manage_inventory()
	{
		$data=array();
		$data['all_inventory_info']=$this->admin_model->manage_inventory();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['admin_main_content']=$this->load->view('admin/manage_inventory',$data,true);
		$this->load->view('admin/dashboard',$data);

	}


	//View the product's information from database and show the information in add inventory page
	public function view_product()
	{

		$item_id=$this->input->post('item_id',true);
		$all_product_info=$this->admin_model->view_product($item_id);
		if(count($all_product_info)>0){

			$product_select_box='';
			$product_select_box.='<option value="">Select Product</option>';
			foreach ($all_product_info as $product) {
				$product_select_box.='<option value="'.$product->product_id.'">'.$product->product_name.'</option>';

			}
			echo json_encode($product_select_box);
		}

	}
 //This function redirect the admin to add a new admin page
	public function add_admin()
	{
		$data=array();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['admin_main_content']=$this->load->view('admin/add_admin_form','',true);
		$this->load->view('admin/dashboard',$data);

	}
  //Add a new admin and store the admin's information in database.
	public function admin_register()
	{

		$data=array();
		$data['name']=$this->input->post('name',true);	
		$data['email']=$this->input->post('email',true);
		$data['phone']=$this->input->post('phone',true);
		$data['password']=$this->input->post('password',true);
		$this->admin_model->store_admin($data);
		$sdata=array();
		$sdata['message']="adminn added successfully";
		$this->session->set_userdata($sdata);
		redirect('add-admin');

	}
}
