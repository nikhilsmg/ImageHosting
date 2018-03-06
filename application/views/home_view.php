<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>IMAGE HOST | Home Page</title>
	<!--link the bootstrap css file-->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url("assets/mybiz/"); ?>css/flexslider.css">
	<link rel="stylesheet" href="<?php echo base_url("assets/mybiz/"); ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url("assets/mybiz/"); ?>css/style.css">
</head>
<body id="top" data-spy="scroll">

<?php $this->load->view('header-footer/header');?>
<!--slider-->
	<div id="slider" class="flexslider">

        <ul class="slides">
            <li>
            	<img src="<?php echo base_url("assets/mybiz/"); ?>images/slider/slider1.jpg">

				<div class="caption">
					<h2><span>an awesome image</span></h2> 
					<h2><span>hosting site</span></h2>
					<p>All your images are kept online forever until you decide to remove them.</p>                
	            </div>

            </li>
        </ul>

    </div>



    <!--about-->
    <div id="about">

    	<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<div class="about-heading">
						<h2>about</h2> 
						<p>A free image hosting provider that you can use to store all sorts of different image formats, in addition to that. You can get a shareable link to a single photo file to share with other people.</p>
					</div>
				</div>
			</div>   	
    	</div>

    	<!--about wrapper left-->
    	<div class="container">

    		<div class="row">
    			<div class="col-xs-12 hidden-sm col-md-5">

    				<div class="about-left">
    					<img src="<?php echo base_url("assets/mybiz/"); ?>images/about/about1.jpg" alt="">
    				</div>

    			</div>

    			<!--about wrapper right-->
    			<div class="col-xs-12 col-md-7">
    				<div class="about-right">
    					<div class="about-right-heading">
    						<h1>features</h1>
    					</div>
  
    					<div class="about-right-boot">
    						<div class="about-right-wrapper">
	    						<h3>Boost your server speed</h3>
	    						<p>Want to lower the load on your server and make it fast? Upload all your images on our server and let our super-fast server handle that load for you.</p>
    						</div>
    					</div>

    					<div class="about-right-best">
    						<div class="about-right-wrapper">
	    						<h3>Save your photos online</h3>
	    						<p>Store all your photos online at "xyz.com" and manage them easily. We store your photos with us forever until you decide to remove them.</p>
    						</div>
    					</div>

    					<div class="about-right-support">
    						<div class="about-right-wrapper">
	    						<h3>Share anywhere online</h3>
	    						<p>Share your photos online with your friends from facebook, twitter and google+ with just a single click of a button.</p>
    						</div>
    					</div>

    				</div>
    			</div>
    		</div>

    	</div>
    </div>

	<!--about bg-->
		<div id="about-bg">

			<div class="container">
				<div class="row">

					<div class="about-bg-heading">
						<h1>sucessfull stats about us</h1>
						<p>what we have achieved so far</p>
					</div>

					<div class=" col-xs-12 col-md-3">
						
					</div>

					<div class="col-xs-12 col-md-3">
						<div class="about-bg-wrapper">
								<span class="count"><h1><?php echo $posts[0]; ?></h1></span>
							<p>Users</p>
						</div>
					</div>

					<div class="col-xs-12 col-md-3">
						<div class="about-bg-wrapper">
							<span class="count"><h1><?php echo $posts[1]; ?></h1></span>
							<p>Images Uploaded</p>
						</div>
					</div>

					<div class="col-xs-12 col-md-3">
					</div>

				</div>
			</div>

			<div class="cover"></div>

		</div> 


		
		<!--bottom footer-->
		<div id="bottom-footer" class="hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-left">
							&copy; All rights reserved
                            <div class="credits">
                                <!-- 
                                    All the links in the footer should remain intact. 
                                    You can delete the links only if you purchased the pro version.
                                    Licensing information: https://bootstrapmade.com/license/
                                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=MyBiz
                                -->
                                Designed by Akhil Biju, Nikhil S, Akshay SI, Mukesh M Shet</a>
                            </div>
						</div>
					</div>

					<div class="col-md-8">
						<div class="footer-right">
                            <ul class="list-unstyled list-inline pull-right">
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        

	
	<!-- jQuery -->
    <script src="<?php echo base_url("assets/mybiz/"); ?>js/jquery.flexslider.js"></script>
    <script src="<?php echo base_url("assets/mybiz/"); ?>js/jquery.inview.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo base_url("assets/mybiz/"); ?>js/script.js"></script>
    <script src="<?php echo base_url("assets/mybiz/"); ?>contactform/contactform.js"></script>

</body>
</html>

</body>
</html>
