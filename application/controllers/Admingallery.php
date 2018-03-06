<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class admingallery extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model');
		$this->load->helper(['url','html','form']);
		$this->load->database();
		$this->load->library(['form_validation','session']);
	}

	public function index()
	{
		$data = [
			'images'	=> $this->Gallery_model->all()
		];
		$this->load->view('admin/index', $data);
	}

	public function fetch(){
		
		$connect = mysqli_connect("db683139888.db.1and1.com", "dbo683139888", "Image@123", "db683139888");
		$useremail=$_SESSION['uemail'];
		$output = '';
		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query = "
			SELECT * FROM images 
			WHERE caption LIKE '%".$search."%'
			OR description LIKE '%".$search."%'
			";
		}
		else
		{
			$query = "
			SELECT * FROM images
			";
		}
		$result = mysqli_query($connect, $query);
		if(mysqli_num_rows($result) > 0)
		{
	
			while($row = mysqli_fetch_array($result))
			{
				$imgurl=$row["file"];
				$imgurl= substr($imgurl,7,-3);
				$imgurl="thumbnail".$imgurl."png";
				$output .= '
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="http://imagehosting.ninjaswork.com/'.$imgurl.'")/>
						<div class="caption">
							<h3>'.$row["caption"].'</h3>
							<p>'.substr($row["description"], 0,100).'..</p>
							<p>
								<a href="http://imagehosting.ninjaswork.com/admingallery/delete/'.$row["id"].'" class="btn btn-danger" role="button" onclick="return confirm(\'Are you sure?\')">Delete</a>
								<a href="http://imagehosting.ninjaswork.com/'.$row["file"].'" class="btn btn-info" role="button" target="_blank">Open Image</a>
								<a href="http://imagehosting.ninjaswork.com/gallery/share/'.$row["id"].'" class="btn btn-primary" role="button">Share</a>
							</p>
						</div>
					</div>
				</div>
				';
			}
		echo $output;
		}
		else
		{
			$out= "<div align='center'>No images found, go ahead and <a href='http://imagehosting.ninjaswork.com/gallery/add'>Add new one</a></div>";
			echo $out;
		}
	}
	public function deleteuser(){
	
			$DBhost = "db683139888.db.1and1.com";
			$DBuser = "dbo683139888";
			$DBpass = "Image@123";
			$DBname = "db683139888";
			$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
			$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$connect = mysqli_connect("db683139888.db.1and1.com", "dbo683139888", "Image@123", "db683139888");		
			
		if ($_REQUEST['delete']) {
			$pid = $_REQUEST['delete'];	
			
			
			
			$connect = mysqli_connect("db683139888.db.1and1.com", "dbo683139888", "Image@123", "db683139888");
			$ppid=$pid = $_REQUEST['delete'];	
			$query = "SELECT * FROM images WHERE email='{$ppid}'";
			$result = mysqli_query($connect, $query);
			while($row = mysqli_fetch_array($result)) {
				$imgurl=$row["file"];
				unlink($imgurl);
				$query = "DELETE FROM images WHERE id='{$row["id"]}'";
				$result1 = mysqli_query($connect, $query);
				//code for thumbnail deletion
				$old=$imgurl;
				$old=substr($old,7,-3);
				$old="thumbnail".$old."png";
				unlink($old);
			}
			
			
			$query = "DELETE FROM users WHERE email=:pid";
			$stmt = $DBcon->prepare( $query );
			$stmt->execute(array(':pid'=>$pid));
			
		}
	
	}
	

	public function delete($id)
	{
		if($_SESSION['uemail']=="admin@imagehosting.com"){
			$this->Gallery_model->delete($id);
			$this->session->set_flashdata('message',"Image has been deleted");
			redirect('admingallery');
		}
		else {
			redirect('login');
		}
	}
}
