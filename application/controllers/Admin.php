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
		$data['title'] = "Dashboard |Sera Bazar";
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_order_info']=$this->admin_model->view_order_list();
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
		$data['title'] = "Message/".md5($viewer_msg_id);
		//$message_id=$this->input->post('message_id',true);
		$data['all_order_info']=$this->admin_model->view_order_list();
		$data['message_info']=$this->admin_model->message_view($viewer_msg_id);
		$this->admin_model->update_message_status($viewer_msg_id);

		$data['all_message_info']=$this->admin_model->view_message();
		$data['admin_main_content']=$this->load->view('admin/view_message',$data,true);
		$this->load->view('admin/dashboard',$data);
	}
	//reply the customer message
	public function reply_message()
	{  

		$config=array(
			'protocol' => 'smtp',
			'smtp_host' => 'ss1://smtp.googlemail.com',
			'smtp_port' => 25,
			'smtp_user' => 'kousar540@gmail.com',
			'smtp_pass' => 'kousarrahman540',
			'mail_type' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$to=$this->input->post('to',true);
		$message=$this->input->post('message',true);
		$this->load->library('email',$config);

		$this->email->from('kousar540@gmail.com', 'Sera Bazar');
		$this->email->to($to);
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject('Sera Bazar');
		$this->email->message($message);

		$this->email->send();
	}
   // This function redirect the add_category page .
	public function add_category()
	{
		$data=array();
		$data['title'] = "Add Category";
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_order_info']=$this->admin_model->view_order_list();
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
		$data['title'] = "Add Subcategory";
		$data['all_order_info']=$this->admin_model->view_order_list();
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
		$data['title'] = "Add Items";
		$data['all_order_info']=$this->admin_model->view_order_list();
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
		$data['title'] = "Add Product";
		$data['all_order_info']=$this->admin_model->view_order_list();
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
		$data['title'] = "All Product Information";
		$data['all_order_info']=$this->admin_model->view_order_list();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_product_info']=$this->admin_model->all_product_info();
		$data['admin_main_content']=$this->load->view('admin/manage_product',$data,true);
		$this->load->view('admin/dashboard',$data);

	}
       //redirect the add inventory page
	public function add_inventory()
	{
		$data=array();
		$data['title'] = "Add Inventory";
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_order_info']=$this->admin_model->view_order_list();
		$data['all_category_info']=$this->admin_model->view_category();
		$data['admin_main_content']=$this->load->view('admin/add_inventory_form',$data,true);
		
		$this->load->view('admin/dashboard',$data);
	}
	//store ihe inventory information in database
	public function save_inventory()
	{  

		$data=array();
		$data['category_id']=$this->input->post('category_id',true);
		$data['subcategory_id']=$this->input->post('subcategory_id',true);
		$data['item_id']=$this->input->post('item_id',true);
		$data['product_id']=$this->input->post('product_id',true);
		$data['product_quentity']=$this->input->post('product_quentity',true);
		$data['product_b_price']=$this->input->post('product_b_price',true);
		$data['profit']=$this->input->post('profit',true);
		//calculate the profit
		$profit_percent=$data['profit'];
		$profit=($data['product_b_price']*$profit_percent)/100;
		$selling_price=$data['product_b_price']+$profit;
		$data['product_s_price']=$selling_price;
		$data['added_date']=date('y-m-d');
		$this->admin_model->store_inventory($data);
		$product_id=$data['product_id'];
		$product_price=$selling_price;
		$this->admin_model->update_product_price($product_id,$product_price);
		$this->admin_model->update_product_publication_status($product_id);
		$data['message']=$this->session->set_userdata($data);
		redirect('add-inventory',$data);
	}
	//view the inventory information and show manage inventory page
	public function manage_inventory()
	{
		$data=array();
		$data['title'] = "Inventory Information";
		$data['all_inventory_info']=$this->admin_model->manage_inventory();
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_order_info']=$this->admin_model->view_order_list();
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
	//show order
	public function view_order($order_id)
	{
		$data=array();
		$data['title'] = "Order-".$order_id;
		$data['order_info']=$this->admin_model->order_view($order_id);
		$this->admin_model->update_nitification_status($order_id);

		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_order_info']=$this->admin_model->view_order_list();
		$data['admin_main_content']=$this->load->view('admin/view_order',$data,true);
		$this->load->view('admin/dashboard',$data);
	}
	//manage order
	public function manage_order()
	{
		$data=array();
		$data['title'] = "Manage Order";
		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_order_info']=$this->admin_model->view_order_list();
		$data['all_order_information']=$this->admin_model->manage_order();
		$data['admin_main_content']=$this->load->view('admin/manage_order',$data,true);
		$this->load->view('admin/dashboard',$data);
	}
	public function deliver_order($order_id)
	{
		$data=array();
		$data['title'] = "Order-".$order_id;
		$data['order_info']=$this->admin_model->order_view($order_id);
		//$this->admin_model->update_order_status($order_id);

		$data['all_message_info']=$this->admin_model->view_message();
		$data['all_order_info']=$this->admin_model->view_order_list();
		$data['admin_main_content']=$this->load->view('admin/deliver_order',$data,true);
		$this->load->view('admin/dashboard',$data);
	}
	//print the order in pdf form
	public function print_order($order_id)
	{
		$order_info=$this->admin_model->order_view($order_id);
		$name=$order_info->user_name ;
		$phone=$order_info->user_phone ;
		$address=$order_info->user_address ;
		$data=date('d-m-y');

$this->load->library('Report');
$this->fpdf->SetFont('Arial','B',14);
$this->fpdf->Cell(130 ,5,'Sera Bazar',0,0);
$this->fpdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$this->fpdf->SetFont('Arial','',12);

$this->fpdf->Cell(130 ,5,'Mirpur,Dhaka-1216',0,0);
$this->fpdf->Cell(59 ,5,'',0,1);//end of line

$this->fpdf->Cell(130 ,5,'Email : kousar.cse2334@gmail.com',0,0);
$this->fpdf->Cell(25 ,5,'Date',0,0);
 $this->fpdf->Cell(34 ,5,"{$data}",0,1);//end of line

 $this->fpdf->Cell(130 ,5,'Phone : 01773340092',0,0);
 $this->fpdf->Cell(25 ,5,'Invoice #',0,0);
$this->fpdf->Cell(34 ,5,"[SB-{$order_info->order_id}]",0,1);//end of line

$this->fpdf->Cell(130 ,5,'www.sera-bazar.com',0,0);

$this->fpdf->Cell(189 ,10,'',0,1);//end of line

// //billing address
$this->fpdf->Cell(100 ,5,'Bill to',0,1);//end of line

// //add dummy cell at beginning of each line for indentation
$this->fpdf->Cell(10 ,5,'',0,0);
$this->fpdf->Cell(90 ,5,"Name :{$name}",0,1);

$this->fpdf->Cell(10 ,5,'',0,0);
$this->fpdf->Cell(90 ,5,"Mobile :0{$phone}",0,1);

$this->fpdf->Cell(10 ,5,'',0,0);
$this->fpdf->Cell(90 ,5,"Address :{$address}",0,1);

$this->fpdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$this->fpdf->SetFont('Arial','B',12);

$this->fpdf->Cell(80 ,5,'Description',1,0);
$this->fpdf->Cell(35 ,5,'Price',1,0);
$this->fpdf->Cell(25 ,5,'Qty',1,0);
 $this->fpdf->Cell(35 ,5,'Subtotal',1,1);//end of line

 $this->fpdf->SetFont('Arial','',12);


 $name=$order_info->product_name;
 $pro_name=explode(',',$name);
 foreach ($pro_name as $key => $value) {
 	$this->fpdf->Cell(80 ,5,"{$value}",1,0);
 	//$this->fpdf->Ln();
 }

 $name=$order_info->product_price;
 $pro_name=explode(',',$name);
 foreach ($pro_name as $key => $value) {
 	$this->fpdf->Cell(35 ,5,"{$value}",1,0);
 	//$this->fpdf->Ln();
 }
 $name=$order_info->product_qty;
 $pro_name=explode(',',$name);
 foreach ($pro_name as $key => $value) {
 	$this->fpdf->Cell(25 ,5,"{$value}",1,0);
 	//$this->fpdf->Ln();
 }
 $name=$order_info->product_subtotal;
 $pro_name=explode(',',$name);
 foreach ($pro_name as $key => $value) {
 	$this->fpdf->Cell(35 ,5,"{$value}",1,1,'R');
 	//$this->fpdf->Ln();
 }
 $total=$order_info->grand_total;
 $this->fpdf->SetFont('Arial','B',12);
 $this->fpdf->Cell(140 ,5,'Total',1,0,'R');
 $this->fpdf->SetFont('Arial','',12);
 $this->fpdf->Cell(35 ,5,"{$total}",1,1,'R');

 $this->fpdf->SetFont('Arial','B',12);
 $this->fpdf->Cell(140 ,5,'Shipping Cost',1,0,'R');
 $this->fpdf->SetFont('Arial','',12);
 $this->fpdf->Cell(35 ,5,'50',1,1,'R');

 $total=$order_info->grand_total;
 $this->fpdf->SetFont('Arial','B',12);
 $this->fpdf->Cell(140 ,5,'Grand Total',1,0,'R');
 $this->fpdf->SetFont('Arial','',12);
 $this->fpdf->Cell(35 ,5,"{$total}",1,1,'R');

 $this->fpdf->SetFont('Arial','B',12);
 $this->fpdf->Cell(140 ,5,'Paid',1,0,'R');
 $this->fpdf->SetFont('Arial','',12);
 $this->fpdf->Cell(35 ,5,'0',1,1,'R');

 $total=$order_info->grand_total;
 $this->fpdf->SetFont('Arial','B',12);
 $this->fpdf->Cell(140 ,5,'Total Due',1,0,'R');
 $this->fpdf->SetFont('Arial','',12);
 $this->fpdf->Cell(35 ,5,"{$total}",1,1,'R');


 echo $this->fpdf->output('mypdf.pdf','D');
 $this->admin_model->update_order_status($order_id);
}
}
