<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin login</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url()."assets/";?>css/bootstrap.css" rel='stylesheet' type='text/css' />

  <!-- Custom CSS -->
  <link href="<?php echo base_url()."assets/";?>css/style1.css" rel='stylesheet' type='text/css' />

  <!-- font-awesome icons CSS-->
  <link href="<?php echo base_url()."assets/";?>css/font-awesome.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      
      <?php
      $email_password_error=$this->session->userdata('email_password_error');
      if($email_password_error)
       {?>
         <p class="alert alert-danger">

          <?php 
          echo $email_password_error;?>
        </p>
        <?php 
        $this->session->unset_userdata('email_password_error');
      }

      ?>
      
      <div id="page-wrapper">
        <div class="main-page login-page ">
          <h2 class="title1">Login</h2>
          <div class="widget-shadow">
            <div class="login-body">
              <form action="<?php base_url();?>admin-login" method="post">
               <?php
               $email_password_error=$this->session->userdata('email_password_error');
               if($email_password_error)
                 {?>
                   <p class="alert alert-danger">

                    <?php 
                    echo $email_password_error;?>
                  </p>
                  <?php 
                  $this->session->unset_userdata('email_password_error');
                }

                ?>
                <input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
                <input type="password" name="password" class="lock" placeholder="Password" required="">
               
                  <div class="clearfix"> </div>
                
                <input type="submit" name="Sign In" value="Sign In">
               
              </form>
            </div>
          </div>
          
        </div>
      </div>

    </div>
  </div>
  



  
  
</body>

</html>