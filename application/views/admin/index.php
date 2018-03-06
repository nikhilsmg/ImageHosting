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

<?php //redirect if not login ?>
<?php if (!$this->session->userdata('login')){
				header('Location: ' . base_url());  } ?>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootbox.min.js"); ?>"></script>
</body>
</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Image Gallery</title>

	<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

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

	#container {
		margin: 40px;
		
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<script>
$(document).ready(function(){
    $("#show").click(function(){
        $("p").toggle();
    });
});
</script>
<script>
$(document).ready(function(){
load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url("admingallery/fetch"); ?>",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<script>
 $(document).ready(function(){
  
  $('.delete_product').click(function(e){
   
   e.preventDefault();
   
   var pid = $(this).attr('data-id');
      var parent = $(this).parent("td").parent("tr");

   
   bootbox.dialog({
     message: "Are you sure you want to Delete ?",
     title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
     buttons: {
    success: {
      label: "No",
      className: "btn-success",
      callback: function() {
      $('.bootbox').modal('hide');
      }
    },
    danger: {
      label: "Delete!",
      className: "btn-danger",
      callback: function() {
       
       
       $.ajax({
        
        type: 'POST',
        url: '<?php echo base_url("admingallery/deleteuser"); ?>',
        data: 'delete='+pid
        
       })
		 .done(function(response){
			top.location.href="http://imagehosting.ninjaswork.com/admingallery";
       })
       .fail(function(){
        
        bootbox.alert('Something Went Wrog ....');
                
       })
              
      }
    }
     }
   });
   
   
  });
  
 });
</script>
<div style="height:30px"></div>
<div id="container">
	<h1>Image Gallery</h1>

	<div id="body">
			
			<?php if($this->session->flashdata('message')) : ?>
				<div class="alert alert-success" role="alert" align="center">
					<?=$this->session->flashdata('message')?>
				</div>
			<?php endif; ?>
			<div class="row">
			<div class="col-xs-5 col-sm-3 col-md-9">
			<?=anchor('gallery/add','Add a new image',['class'=>'btn btn-primary'])?>
			</div>
			<div class="col-xs-7 col-sm-6 col-md-3">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" class="form-control" />
				</div>
			</div>
			</div>
			<hr />	
			<div class="row">
			<?php 
			$useremail= $this->session->userdata('uemail');
			$images = $this->db->query("SELECT * FROM images");
			?>
			
			<table style="margin-left:30px; margin-right:20px; width: 95%;" class="table table-bordered table-condensed table-hover table-striped">
        
			<tr>
				<th>#ID</th>
                <th>First Name</th>
                <th>Last Name</th>
				<th>Email</th>
				<th>Action</th>
            </tr>
                 
            <?php
			$DBhost = "db683139888.db.1and1.com";
			$DBuser = "dbo683139888";
			$DBpass = "Image@123";
			$DBname = "db683139888";
			$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
			$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$query = "SELECT id, first_name, last_name, email FROM users";
			$stmt = $DBcon->prepare( $query );
			$stmt->execute();
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
			extract($row);
			if ($email == "admin@imagehosting.com")
				continue;
			?>
                <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $first_name; ?></td>
				<td><?php echo $last_name; ?></td>
				<td><?php echo $email; ?></td>
                <td>
                <a class="delete_product" data-id="<?php echo $email; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-trash"></i>
                </a></td>
                </tr>
                <?php
			}
			?>       
        </table>
			
			
			
			</div>
			<div class="row">
				<div id="result">
				</div>
			</div>
			
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>