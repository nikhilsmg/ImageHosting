<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IMAGE HOST | Signup Page</title>
	<link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>

<?php $this->load->view('header-footer/header');?>
<br/>
<div style="height:50px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form id="signupform" autocomplete="off" method="post" action="<?php echo base_url('auth/user/signup'); ?>">
			<legend>Signup</legend>
			
			<div class="form-group">
				<label for="name">First Name</label>
				<input class="form-control" name="fname" placeholder="Your First Name" type="fname" value="<?php echo set_value('fname'); ?>" required/>
				<span class="text-danger"><?php echo form_error('fname'); ?></span>
			</div>			
		
			<div class="form-group">
				<label for="name">Last Name</label>
				<input class="form-control" name="lname" placeholder="Last Name" type="lname" value="<?php echo set_value('lname'); ?>" required/>
				<span class="text-danger"><?php echo form_error('lname'); ?></span>
			</div>
		
			<div class="form-group">
				<label for="email">Email ID</label>
				<input class="form-control" name="email" placeholder="Email-ID" type="email" value="<?php echo set_value('email'); ?>" required/>
				<span class="text-danger"><?php echo form_error('email'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" required/>
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Confirm Password</label>
				<input class="form-control" name="conf_password" placeholder="Confirm Password" type="conf_password" required/>
				<span class="text-danger"><?php echo form_error('conf_password'); ?></span>
			</div>

			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-info">Signup</button>
				<button name="reset" type="reset" class="btn btn-info">Reset</button>
			</div>
			</form>
			<?php
               if(!empty($this->session->flashdata('success')))
                 {?>
                    <div class="alert alert-success">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <?php echo $this->session->flashdata('success'); ?>
                    </div>
             <?php }
                   ?>
             <?php
               if(!empty($this->session->flashdata('failure')))
                  {?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('failure'); ?>
                    </div>
               <?php }
                ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="<?php echo base_url('auth/user/'); ?>">Login Here</a>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>