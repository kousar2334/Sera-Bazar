
<div id="page-wrapper">
  <div class="main-page">
    <div class="row">
      <div class="card-header"><h2><b>Add Inventory</b></h2></div>

      
      <div class="card-body">
        <?php
        $message=$this->session->userdata('message');
        if($message){
          echo $message;
          $this->session->unset_userdata('message');
        }
        ?>
        <form action="<?php echo base_url();?>save-inventory" method="post" enctype="multipart/form-data" >
          <div class="form-group">
            <div class="form-row">

              <div class="form-group">
                <label for="exampleInputName">Select Category </label>
                <select class="form-control" id="category" name="category_id">
                 <option value="">Select Category</option>

                 <?php
                 foreach ($all_category_info as $category_info) {


                  ?>
                  <option value="<?php echo $category_info->category_id; ?>"><?php echo $category_info->category_name; ?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="form-group">
                <label for="exampleInputName">Select Sub-Category </label>
                <select class="form-control" id="subcategory" name="subcategory_id">

                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputName">Select Item </label>
                <select class="form-control" id="item" name="item_id">

                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputName">Select Product </label>
                <select class="form-control" id="product" name="product_id">

                </select>
              </div>
              
              <div class="form-group">
                <label for="exampleInputName">Product Quantity</label>
                <input class="form-control" name="product_quentity" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter Number of Inventory here">
              </div>
              <div class="form-group">
                <label for="exampleInputName">Product Buying Price</label>
                <input class="form-control" name="product_b_price" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter Price">
              </div>
              <div class="form-group">
                <label for="exampleInputName">Product Selling income(%)</label>
                <input class="form-control" name="profit" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter net income in %">
              </div>

            </div><br>
            <button class="btn btn-primary btn-block" type="submit" name="add Item">Save Inventory
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url()."assets/";?>js/jquery-1.11.1.min.js"></script>
  <script s type="text/javascript" charset="utf-8" async defer>
//view sub category list in the select option
    $(document).ready(function(){
     $('#category').on('change',function(){
      var category_id=$(this).val();
      if(category_id==''){
        $('#subcategoty').prop('disabled',true);
      }else{
        $('#subcategoty').prop('disabled',false);
        $.ajax({
         url:"<?php echo base_url();?>view-subcategory",
         type:"POST",
         data:{'category_id':category_id},
         dataType:'json',
         success:function(data){
           $('#subcategory').html(data);
         },
         error:function(){
          alert("No subcategory found");
        }
      });
      }
    });
   });
//view item in the select option
    $(document).ready(function(){
     $('#subcategory').on('change',function(){
      var subcategory_id=$(this).val();
      if(subcategory_id==''){
        $('#item').prop('disabled',true);
      }else{
        $('#item').prop('disabled',false);
        $.ajax({
         url:"<?php echo base_url();?>view-item",
         type:"POST",
         data:{'subcategory_id':subcategory_id},
         dataType:'json',
         success:function(data){
           $('#item').html(data);
         },
         error:function(){
          alert("No item found");
        }
      });
      }
    });
   });
//product view in select option
    $(document).ready(function(){
     $('#item').on('change',function(){
      var item_id=$(this).val();
      if(item_id==''){
        $('#product').prop('disabled',true);
      }else{
        $('#product').prop('disabled',false);
        $.ajax({
         url:"<?php echo base_url();?>view-product",
         type:"POST",
         data:{'item_id':item_id},
         dataType:'json',
         success:function(data){
           $('#product').html(data);
         },
         error:function(){
          alert("No product found");
        }
      });
      }
    });
   });

 </script>