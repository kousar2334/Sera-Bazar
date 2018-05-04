 <div id="page-wrapper">
  <div class="main-page">
    <div class="row">

      <?php
      $message=$this->session->userdata('message');
      if($message){
        echo $message;
        $this->session->unset_userdata('message');
      }

      ?>
      <div class="card-header"><h2><b>Add Subcategory</b></h2></div>
      <div class="card-body">
        <form action="<?php echo base_url();?>sub-category-save" method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="form-group">
                <label for="exampleInputName">Sub-Category name</label>
                <input class="form-control" name="sub_category_name" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter category Name">
              </div>
              <div class="form-group">
                <label for="exampleInputName">Select Category </label>
                <select class="form-control" id="sel1" name="category_id">
                  <?php
                  foreach ($all_category_info as $category_info) {


                    ?>
                    <option value="<?php echo $category_info->category_id; ?>"><?php echo $category_info->category_name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                
              </div><br>
              <button class="btn btn-primary btn-block" type="submit" name="add_category">Add Sub-Category
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>