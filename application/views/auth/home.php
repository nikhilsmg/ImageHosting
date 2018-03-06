<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to ImageHosting.NinjasWork.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://ImageHosting.NinjasWork.com" target="_blank">ImageHosting.NinjasWork.com</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url('auth/user/change_password'); ?>"><span class="glyphicon glyphicon-log-in"></span> Change Password</a></li>
      <li><a href="<?php echo base_url('auth/user/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Hello <?php echo $this->session->userdata('logged_in')['fname'].' '.$this->session->userdata('logged_in')['lname']; ?></h3>
  <p>Welcome to ImageHosting.NinjasWork.com</p>
</div>

</body>
</html>

