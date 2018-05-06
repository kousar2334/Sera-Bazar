<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
  //Store the admin information in database
  public function store_admin($data)
  {

    $this->db->insert('tbl_admin',$data);
  }
   //Admin login functrion
  public function login($data){
    $email=$data['email'];
    $password=$data['password'];
    $this->db->select('*');
    $this->db->from('tbl_admin');
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $query=$this->db->get();
    $result=$query->row();
    return $result;
  }
  //Store the cataegory information in database
  public function category_save($data)
  {
    $this->db->insert('tbl_main_category',$data);
  }
 //View the category information from database
  public function view_category()
  {
    $this->db->select('*');
    $this->db->from('tbl_main_category');
    $qurey=$this->db->get();
    $all_category_info=$qurey->result();
    return $all_category_info;
  }
 //Join the category and subcategory table and view information from tow table
  public function view_category_subcategory()
  {
    $this->db->select('*');
    $this->db->from('tbl_main_category');
    $this->db->join('tbl_subcategory','tbl_main_category.category_id=tbl_subcategory.category_id');
    $query=$this->db->get();
    $all_category_info=$query->result();
    return $all_category_info;
  }
 //Store the sub category information in database
  public function save_subcategory($data)
  {
    $this->db->insert('tbl_subcategory',$data);
  }

  //View the subcategory information from databse
  public function view_subcategory($category_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_subcategory');
    $this->db->where('category_id',$category_id);
    $query=$this->db->get();
    $all_subcategory_info=$query->result();
    return $all_subcategory_info;
  }
   //Save the item's information
  public function save_item($data)
  {
    $this->db->insert('tbl_item',$data);
  }
   //View item information
  public function view_item($subcategory_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_item');
    $this->db->where('subcategory_id',$subcategory_id);
    $query=$this->db->get();
    $all_item_info=$query->result();
    return $all_item_info;
  }
  //Store the product infromation
  public function store_product()
  {

    $data=array();   	
    $data['product_name']=$this->input->post('product_name',true);
    $data['category_id']=$this->input->post('category_id',true);
    $data['subcategory_id']=$this->input->post('subcategory_id',true);
    $data['item_id']=$this->input->post('item_id',true);
    $data['product_description']=$this->input->post('product_description',true);
    $data['product_price']=$this->input->post('product_price',true);
    
    $sdata=array();
    $error="";
    $config['upload_path']='./uploads/';
    $config['allowed_types']='jpg|png';
    
    $this->load->library('upload',$config);
    if( ! $this->upload->do_upload('product_image'))
    {
      $error=$this->upload->display_errors();
      
    }else
    {
      $sdata=$this->upload->data();
      $data['product_image']=$config['upload_path'].$sdata['file_name'];
    }

    $this->db->insert('tbl_products',$data);
  }

   //view all product information
  public function all_product_info()
  {
    $this->db->select('*');
    $this->db->from('tbl_products');
    $qurey=$this->db->get();
    $all_product_info=$qurey->result();
    return $all_product_info;
  }
  //View product information for add inventory form
  public function view_product($item_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_products');
    $this->db->where('item_id',$item_id);
    $query=$this->db->get();
    $all_product_info=$query->result();
    return $all_product_info;
  }
  public function view_message()
  {
    $status=0;
    $this->db->select('*');
    $this->db->from('tbl_viewer_massage');
    $this->db->where('status',$status);
     $this->db->order_by('viewer_name', 'desc');
    $qurey=$this->db->get();
    $all_message_info=$qurey->result();
    return $all_message_info;
  }

  //return the viewer message to the admin panel
  public function message_view($viewer_msg_id)
  {
    
    $this->db->select('*');
    $this->db->from('tbl_viewer_massage');
    $this->db->where('viewer_msg_id',$viewer_msg_id);
    $qurey=$this->db->get();
    $message_info=$qurey->row();
    return $message_info;
  }

  public function update_message_status($message_id)
  {
    $value=1;
    $this->db->set('status', $value); 
    $this->db->where('viewer_msg_id',$message_id); 
    $this->db->update('tbl_viewer_massage');

  }

    //join the product and inventery table and return all inventory info
  public function manage_inventory()
  {
    $this->db->select('*');
    $this->db->from('tbl_products');
    $this->db->join('tbl_inventory','tbl_products.product_id=tbl_inventory.product_id');
    $query=$this->db->get();
    $all_inventory_info=$query->result();
    return $all_inventory_info;

  }
  //view order list
  public function view_order_list()
  {
    $status=0;
    $this->db->select('*');
    $this->db->from('tbl_order');
    $this->db->where('delivery_status',$status);
     $this->db->order_by('user_name', 'desc');
    $qurey=$this->db->get();
    $all_order_info=$qurey->result();
    return $all_order_info;
  }
  //return the order inforation to the admin panel
  public function order_view($order_id)
  {
    
    $this->db->select('*');
    $this->db->from('tbl_order');
    $this->db->where('order_id',$order_id);
    $qurey=$this->db->get();
    $order_info=$qurey->row();
    return $order_info;
  }
  //update the order delivery status
   public function update_order_status($order_id)
  {
    $value=1;
    $this->db->set('delivery_status', $value); 
    $this->db->where('order_id',$order_id); 
    $this->db->update('tbl_order');

  }

}?>