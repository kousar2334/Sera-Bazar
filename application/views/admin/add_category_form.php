
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
      <div class="card-header"><h2><b>Add category</b></h2></div>
      <div class="card-body">
        <form action="<?php echo base_url();?>category-save" method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="form-group">
                <label for="exampleInputName">Category name</label>
                <input class="form-control" name="category_name" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter category Name">
              </div>
            </div><br>
            <button class="btn btn-primary btn-block" type="submit" name="add_category">Add Category
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>


  