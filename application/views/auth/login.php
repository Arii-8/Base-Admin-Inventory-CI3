<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Base Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 --> 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/fontawesome/css/all.min.css">
    <!-- Ionicons --> 
  <!-- Theme style -->

 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/adminlte.min.css"> 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css"> 
 
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url()?>">
        <!-- <img src="<?php // echo base_url()?>assets/images/logo.png"> -->
      </a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <!-- <p class="login-box-msg">Sign in to start your session</p> -->
        <p class="login-box-msg">Base Admin Inventory</p>
        <?php if(!empty($this->session->flashdata('message_error'))){?>
          <div class="alert alert-danger">
            <?php   
               print_r($this->session->flashdata('message_error'));
            ?>
          </div>
        <?php }?>
        <form action="<?php echo base_url();?>auth/login" method="post" id="form-login">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username"  id="username" placeholder="Email" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success btn-block mb-3" id="btn-login">Sign In</button>
          <p class="mb-1 text-center">
            <a href="<?php echo base_url()?>auth/forgot_password">I forgot my password</a>
          </p>
        </form>
      </div>
    </div>
  </div>

  <script data-main="<?php echo base_url()?>assets/js/main/main-login" src="<?php echo base_url()?>assets/js/require.js"></script>
  <input type="hidden" id="base_url" value="<?php echo base_url();?>">
</body>
</html>
