<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HRIS</title>
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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Login</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Time: <span id="displayClock"></span></p>
    <p class="login-box-msg">Sign in to start your session</p>

    <?php echo form_open();?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="<?php echo base_url();?>assets/jquery-1.11.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- adminLTE App -->
<script src="<?php echo base_url();?>assets/adminLTE/js/adminlte.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  startTime();
});
function startTime(){
  var today = new Date();
  var h = today.getHours();
  h = h % 12;
  h = h ? h : 12;
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  var ampm = h >=12 ? 'pm' : 'am';
  document.getElementById('displayClock').innerHTML = h + ":" + m + ": " + s + ampm;
  $('#current_time').val(h + ":" + m + ":" + s);
  var t = setTimeout(startTime,500);
}
function checkTime(i){
  if(i<10){
      i = "0" + i;
  }
  return i;
}
</script>
</body>
</html>