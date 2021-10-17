<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MES</title>
  <!-- <link rel="icon" type="image/jpg" href="<?php echo base_url();?>assets/images/logo/favicon.png" /> -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/adminLTE/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/adminLTE/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link rel="stylesheet" href="<?php echo base_url();?>assets/custom/style.css">
   <script src="<?php echo base_url();?>assets/jquery-1.11.3.min.js"></script>
   <style type="text/css">
     @media (max-width: 767px) {
        .business-image{
          float: none;
        }
      }
      .col-lg-12 {
          clear: both;
      }
   </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="preloader"><span><img src="<?php echo base_url();?>assets/images/loader.gif" class="loader"></span></div>
<div class="wrapper">
  <header class="main-header">
    <div class="header-content">
     <!-- <div class="logo-center">
       <img src="<?php echo base_url();?>assets/images/logo/logo.png">
     </div> -->
     <div class="site-title">
       <div class="site-name">MES</div>
       <!-- <div class="site-caption">This is a sample caption</div> -->
     </div>
    </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>uploads/users/<?php echo $get_current_user_details->photo;?>" class="user-image" alt="User Image">
              <span class="hidden-xs" style="color: #fff"><?php echo $get_current_user_details->name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>uploads/users/<?php echo $get_current_user_details->photo;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $get_current_user_details->name;?>
                  <small><?php echo $get_current_user_details->position;?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>user/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>user/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="toggle-sidebar-container">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="color: #fff">
          <span class="sr-only">Toggle navigation</span>
        </a>
      </div>
  </header>