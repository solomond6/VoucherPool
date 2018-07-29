<!DOCTYPE html>
<html>
    <head>
        <title>Voucher <?php if (isset($page_title)) { echo ' | '.$page_title; } ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon">
        <!-- <link rel="icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon"> -->
        <meta name="description" content="" />
        <meta http-equiv="Content-Language" content="en" />
        <meta name="keywords" content="" />
        <meta name="Uji Temidayo" content="" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url();?>ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css">

        <script src="<?php echo base_url();?>assets/js/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9">
    </head>
    <body>
    <div class="container">
    <?php $this->load->view('includes/admin_menu'); ?>