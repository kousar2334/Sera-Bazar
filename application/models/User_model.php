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



}
?>