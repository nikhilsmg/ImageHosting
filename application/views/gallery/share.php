<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>IMAGE HOST | My Profile</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
</head>
<body>

<?php $this->load->view('header-footer/header');?>
<div style="height:30px"></div>

<?php //redirect if not login ?>
<?php if ((!$this->session->userdata('logged_in')['login']) and (!$this->session->userdata('login'))){
				header('Location: ' . base_url());  } ?>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->input->post()){
	$caption 		= set_value('caption');
	$description 	= set_value('description');
} else {
	$caption 		= $image->caption;
	$description 	= $image->description;
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Update Existing Image</title>

	<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	
	#content {
	float: right ;
	width: 80% ;
	}
	#navbar {
	float: right;
	width: 20%;
		}

	body {
		background-color: #fff;
		
		font: 16px/24px normal 'Oxygen', sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	.container-fluid {
		margin-right: 250px;
		margin-bottom: 90px;
		margin-top: 90px;
		margin-left: 250px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	@media only screen and (max-width: 768px) {
		.container-fluid {
		margin-right: 10px;
		margin-bottom: 90px;
		margin-top: 90px;
		margin-left: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		}
	}
	@media only screen and (max-width: 1168px) {
		.container-fluid {
		margin-right: 10px;
		margin-bottom: 90px;
		margin-top: 90px;
		margin-left: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		}
	}
	</style>
</head>
<body>
<div class="container-fluid">
	<h1>Share Image</h1>

	<div id="body">

		  <div class="form-group">
		    <label for="userfile">Image File</label>
		    <div class="row" style="margin-bottom:5px">
				<div class="col-xs-12 col-sm-6 col-md-3">
					<?=img(['src'=>$image->file,'width'=>'100%'])?>
					<div style="height:10px"></div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div style="height:50px"></div>
					<?=anchor('https://www.facebook.com/sharer/sharer.php?u='.base_url().$image->file,'Share on FaceBook',['class'=>'btn btn-primary', 'role'=>'button'])?>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div style="height:50px"></div>
					<?=anchor('https://twitter.com/home?status='.base_url().$image->file,'Share on Twitter',['class'=>'btn btn-success', 'role'=>'button'])?>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div style="height:50px"></div>
						<?=anchor('https://plus.google.com/share?url='.base_url().$image->file,'Share on G+',['class'=>'btn btn-danger', 'role'=>'button'])?>
				</div>
			</div>
		  </div>
		  <?=anchor('gallery','Cancel',['class'=>'btn btn-warning'])?>	 
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>