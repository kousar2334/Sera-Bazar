<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	//Store the User register's information in database.
	public function user_registration($data)
	{
		$this->db->insert('tbl_user',$data);
	}
     //Store viewer message to server
	public function store_message()
	{
		$data=array();
		$data['viewer_name']=$this->input->post('viewer_name',true);
		$data['viewer_email']=$this->input->post('viewer_email',true);
		$data['sending_date']=$this->input->post('sending_date',true);
		$data['viewer_message']=$this->input->post('viewer_message',true);
		$this->db->insert('tbl_viewer_massage',$data);
	}
	//user login verify
	public function user_login_verify($user_email,$user_password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('user_email',$user_email);
		$this->db->where('user_password',$user_password);
		$query=$this->db->get();
		$user_info=$query->row();
		return $user_info;
	}
	//view store subcategory and item
	public function store_categories($category_name)
	{
		$this->db->select('*');
		$this->db->from('tbl_main_category');
		$this->db->where('category_name',$category_name);
		$this->db->join('tbl_subcategory','tbl_main_category.category_id=tbl_subcategory.category_id');
		$this->db->join('tbl_item','tbl_subcategory.subcategory_id=tbl_item.subcategory_id');
		$query=$this->db->get();
		$store_categories=$query->result();
		return $store_categories;
	}

    //view pdoduct details for men shopping category
	public function view_men_shopping()
	{   
		$category_id=2;
		$this->db->select('*');
		$this->db->from('tbl_products');
		$this->db->where('category_id',$category_id);
		$query=$this->db->get();
		$all_men_collection=$query->result();
		return $all_men_collection;
	}

	public function view_women_shopping()
	{   
		$category_id=3;
		$this->db->select('*');
		$this->db->from('tbl_products');
		$this->db->where('category_id',$category_id);
		$query=$this->db->get();
		$all_women_collection=$query->result();
		return $all_women_collection;
	}
	public function home_decor()
	{   
		$category_id=1;
		$this->db->select('*');
		$this->db->from('tbl_products');
		$this->db->where('category_id',$category_id);
		$query=$this->db->get();
		$all_home_decor=$query->result();
		return $all_home_decor;
	}
	//view all electronic product in
	public function view_electronic_product()
	{   
		$category_id=5;
		$this->db->select('*');
		$this->db->from('tbl_products');
		$this->db->where('category_id',$category_id);
		$query=$this->db->get();
		$all_electronic_product=$query->result();
		return $all_electronic_product;
	}
	//view single product information
	public function product_details($product_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_products');		
		$this->db->join('tbl_inventory','tbl_products.product_id=tbl_inventory.product_id');
		$this->db->where('tbl_products.product_id',$product_id);
		$qurey=$this->db->get();
		$product_info=$qurey->result();
		return $product_info;
	}
	//view inventory information 
	public function view_inventory_information($pro_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_inventory');
		$this->db->where_in('product_id',$pro_id);
		$qurey=$this->db->get();
		$inventory_info=$qurey->result();
		return $inventory_info;

	}
	//update product quentity after customer order
	public function update_qty_inventory($product_quentity,$pro_id)
	{
		for ($i=0; $i <count($product_quentity) ; $i++) { 
			$this->db->set('product_quentity',$product_quentity[$i]); 
			$this->db->where('product_id',$pro_id[$i]); 
			$this->db->update('tbl_inventory');
		}


	}

    //store the order information
	public function store_order($data)
	{
		$this->db->insert('tbl_order',$data);
	}

}
?>