
<div id="page-wrapper">
  <div class="main-page">
    <div class="row">
      <div class="card-header"><h2><b>Add Product</b></h2></div>

      <?php
      $message=$this->session->userdata('message');
      if($message){
        echo $message;
        $this->session->unset_userdata('message');
      }
      ?>
      <div class="card-body">
        <form action="<?php echo base_url();?>save-product" method="post" enctype="multipart/form-data" >
          <div class="form-group">
            <div class="form-row">
              <div class="form-group">
                <label for="exampleInputName">Product Name</label>
                <input class="form-control" name="product_name" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter product Name">
              </div>
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
                <label for="exampleInputName">Product Description</label>
                
                <textarea class="form-control" placeholder="Enter Product Description" id="exampleInputName" name="product_description" rows="" required=""></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputName">Product Price</label>
                <input class="form-control" name="product_price" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter product price here in tk">
              </div>
              <div class="form-group">
                <label for="exampleInputName">Upload Image</label>
                <input class="input-file uniform_on" name="product_image"  type="file" >
              </div>
            </div><br>
            <button class="btn btn-primary btn-block" type="submit" name="add Item">Add Product
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url()."assets/";?>js/jquery-1.11.1.min.js"></script>
  <script s type="text/javascript" charset="utf-8" async defer>

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
          alert("error ase");
        }
      });
      }
    });
   });

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
          alert("error ase");
        }
      });
      }
    });
   });

 </script>