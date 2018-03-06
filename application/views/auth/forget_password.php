<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IMAGE HOST | Login Page</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
</head>
<body>

<?php $this->load->view('header-footer/header');?>

<br/>
<div style="height:50px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
		<form id="loginform" autocomplete="off" method="post" action="<?php echo base_url('auth/user/forget_password'); ?>">
			<legend>Forget Password</legend>
			<div class="form-group">
				<label for="name">Email-ID</label>
				<input type="text" placeholder="Email" id="email" class="form-control" name="email">
				<span class="text-danger"><?php echo form_error('email'); ?></span>
			</div>
			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-info">Send Reset Link</button>
				<button name="reset" type="reset" class="btn btn-info">Reset</button>
			</div
			<div class="alert alert-success">
		</form>
		<?php 
         if(!empty($this->session->flashdata('success')))
            {?>
				<div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <?php echo $this->session->flashdata('success'); ?>
                 </div>
            <?php } ?>
        <?php
         if(!empty($this->session->flashdata('failure')))
            {?>
                 <div class="alert alert-danger">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo $this->session->flashdata('failure'); ?>
                 </div>
           <?php 
            }
            ?>
		
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		New User? <a href="<?php echo base_url('auth/user/signup'); ?>">Sign Up Here</a>
		</div>
		<div class="col-md-4 col-md-offset-4 text-center">	
		Login? <a href="<?php echo base_url('auth/user/'); ?>">Click Here</a>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>
