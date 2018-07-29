<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Voucher Pool <?php if (isset($page_title)) { echo ' | '.$page_title; } ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box col-md-4 col-md-offset-4">
      <div class="login-logo">
        <h3 class="text-center"><a href="#"><b>Voucher Pool</b></a></h3>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg text-center">Sign Up</p>
        <?php $attributes = array('class' => 'form-control'); ?>
        <?php echo form_open('login/createUser'); ?>
        <?php echo validation_errors(); if(isset($_SESSION['message'])){echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';}?>
        <div class="form-group has-feedback">
            <label>Fullname</label>
            <input type="text" class="form-control" name="name" placeholder="Fullname">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label>Email Address</label>
            <input type="text" class="form-control" name="email" placeholder="Email Address">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="conf_password" placeholder="Confirm Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        <?php echo form_close(); ?>
      </div>
      <a href="#"><?php echo anchor('signup', '<i class="fa fa-plus-circle"></i>Signup'); ?></a>
    </div>
    <script src="<?php echo base_url();?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
