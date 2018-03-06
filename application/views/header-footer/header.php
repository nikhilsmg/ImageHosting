<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
$(window).scroll(function(){
    var wscroll = $(this).scrollTop();
    if(wscroll > 200){
     $(".navbar").addClass("shrink-nav");
      $(".logo").addClass("shrink-logo");
    }
    else{
      $(".navbar").removeClass("shrink-nav");
      $(".logo").removeClass("shrink-logo");
    }
  });
 </script>
 <style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500);
.navbar-brand{
  padding-top:0px !important;
  padding-bottom:0px !important;
}
.navbar{
  font-size:16px;
  font-family: 'Roboto', sans-serif;
  font-weight:500;
    padding-top: 10px;
	padding-bottom: 40px;
	transition:all ease .3s;
}
.navbar-default .navbar-nav>li>a{
   color:#573E7D !important;
}
.dropdown-menu > li > a {
   color:#573E7D !important;
}
.navbar-default .navbar-nav>li>a:hover{
   color:#3B2A54 !important;
}
.shrink-nav {
	padding-top: 2px !important; /*changeable*/
	padding-bottom: 0px !important; /*changeable*/
}
.logo img{
  margin-top:0px; 
  width:300px !important;/*changeable*/ 
  transition:width ease-in-out .3s;
}
.shrink-logo img {
  transition:width ease-in-out .3s;
	width:180px !important;/*changeable*/ 
}
@media(max-width:767px){
  .logo img{
  width:200px !important;/*changeable*/ 
}
  .shrink-logo img {
     margin-top:10px; 
	width:160px !important;/*changeable*/ 
}
}
</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top  my-nav">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url("assets/logo.png"); ?>" alt="" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
	  
	  <?php if (($this->session->userdata('logged_in')['login']) or ($this->session->userdata('login')) ){?>
	  
	        <?php if (($admincheck=($this->session->userdata('uemail')))=="admin@imagehosting.com"){?>
					 <li style="margin-top:12px;">Hello,<?php echo $this->session->userdata('uname'); ?></li>
					<li><a href="<?php echo base_url(); ?>admingallery">My Gallery</a></li>
					<li><a href="<?php echo base_url(); ?>home/logout">Logout</a></li>
				 <?php }
			else { ?>
					 <li style="margin-top:12px;">Hello,<?php echo $this->session->userdata('logged_in')['fname']; ?></li>
					<li><a href="<?php echo base_url(); ?>gallery">My Gallery</a></li>
					<li><a href="<?php echo base_url(); ?>home/logout">Logout</a></li>
		    <?php } ?>
	  <?php } else { ?>
	        <li><a href="<?php echo base_url('auth/user/'); ?>">Login</a></li>
			<li><a href="<?php echo base_url(); ?>adminlogin">Admin Login</a></li>
			<li><a href="<?php echo base_url('auth/user/signup'); ?>">Sign Up</a></li>
	  
	  <?php }?>	 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div style="height:50px"></div>
</body>
</html>