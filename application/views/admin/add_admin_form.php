

<div id="page-wrapper">
  <div class="main-page">
    <div class="row">
      <p>
        <?php
        $message=$this->session->userdata('message');
        if($message){
          echo $message;
          $this->session->unset_userdata('message');
        }

        ?>

      </p>

      <div class="card-header"><h2><b>Add Admin</b></h2></div>
      <div class="card-body">
        <form action="<?php echo base_url();?>admin-register" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input class="form-control" id="exampleInputName" name="name"type="text" aria-describedby="nameHelp" placeholder="Enter  name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="">
                <label for="exampleInputLastName">Phone</label>
                <input class="form-control" id="exampleInputLastName" name="phone"type="text" aria-describedby="nameHelp" placeholder="Enter Phone">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputName">Upload Image</label>
                <input class="input-file uniform_on" name="admin_image"  type="file" >
              </div>
            </div>
          </div>

          <button class="btn btn-primary btn-block"type="submit">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>


