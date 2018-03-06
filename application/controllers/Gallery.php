<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Gallery extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model');
		$this->load->model('thumbnail_model');
		$this->load->helper(['url','html','form']);
		$this->load->database();
		$this->load->library(['form_validation','session']);
	}

	public function index()
	{
		if($this->session->userdata('uemail')=="admin@imagehosting.com"){
			redirect('admingallery');
		}
		
		$data = [
			'images'	=> $this->Gallery_model->all()
		];
		$this->load->view('gallery/index', $data);
	}

	public function add(){
		$rules = 	[
				        [
				                'field' => 'caption',
				                'label' => 'Caption',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'description',
				                'label' => 'Description'
				                
				        ]
					];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('gallery/add_image');
		}
		else
		{

			/* Start Uploading File */
			$config =	[
							'upload_path'	=> './uploads/',
	            			'allowed_types' => 'gif|jpg|png',
	            			'max_size'      => 10000,
	            			'max_width'     => 10024,
	            			'max_height'    => 7068
            			];

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('gallery/add_image', $error);
            }
            else
            {
                    $file = $this->upload->data();
					if(($useremail= $this->session->userdata('logged_in')['email']) == NULL)
					{
						$useremail= $this->session->userdata('uemail');
					}
                    //print_r($file);
                    $data = [
								'email'			=> $useremail,
                    			'file' 			=> 'uploads/' . $file['file_name'],
                    			'caption'		=> set_value('caption'),
                    			'description'	=> set_value('description')
                    		];
                    $this->Gallery_model->create($data);
					
					//data for thumbnail image
					$sourcepath= $data['file'];
					$destpath= substr($sourcepath,7,-3);
					$destpath="thumbnail".$destpath."png";
					$this->thumbnail_model->generate_image_thumbnail($sourcepath,$destpath);				
					$this->session->set_flashdata('message','New image has been added..');
					if(($useremail= $this->session->userdata('logged_in')['email']) == NULL)
					{
						redirect('admingallery');
					}
					redirect('gallery');
				
            }
		}
	}

	public function edit($id){
		$rules = 	[
				        [
				                'field' => 'caption',
				                'label' => 'Caption',
				                'rules' => 'required'
				        ],
				        [
				                'field' => 'description',
				                'label' => 'Description'
				                
				        ]
					];

		$this->form_validation->set_rules($rules);
		$image = $this->Gallery_model->find($id)->row();

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('gallery/edit_image',['image'=>$image]);
		}
		else
		{
			if(isset($_FILES["userfile"]["name"]))
			{
				/* Start Uploading File */
				$config =	[
								'upload_path'	=> './uploads/',
		            			'allowed_types' => 'gif|jpg|png',
		            			'max_size'      => 10000,
		            			'max_width'     => 10024,
		            			'max_height'    => 7068
	            			];

	            $this->load->library('upload', $config);

	            if ( ! $this->upload->do_upload())
	            {
	                    $error = array('error' => $this->upload->display_errors());
						$this->load->view('gallery/edit_image',['image'=>$image,'error'=>$error]);
	            }
	            else
	            {
	                    $file = $this->upload->data();
	                    $data['file'] = 'uploads/' . $file['file_name'];
						unlink($image->file);
						
						//code for thumbnail deletion
						$sourcepath= $data['file'];
						$destpath= substr($sourcepath,7,-3);
						$destpath="thumbnail".$destpath."png";
						$this->thumbnail_model->generate_image_thumbnail($sourcepath,$destpath);	
						$old=$image->file;
						$old=substr($old,7,-3);
						$old="thumbnail".$old."png";
						unlink($old);
	            }
			}

			$data['caption']		= set_value('caption');
			$data['description']	= set_value('description');
			
			
			$this->Gallery_model->update($id,$data);
			$this->session->set_flashdata('message','New image has been updated..');
			redirect('gallery');
		}
	}
	public function share($id){
		
		$image = $this->Gallery_model->find($id)->row();
		$this->load->view('gallery/share',['image'=>$image]);
	
	}
	public function fetch(){
		
		$connect = mysqli_connect("db683139888.db.1and1.com", "dbo683139888", "Image@123", "db683139888");
		$useremail=$this->session->userdata('logged_in')['email'];
		$output = '';
		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($connect, $_POST["query"]);
			$query = "
			SELECT * FROM images 
			WHERE (caption LIKE '%".$search."%'
			OR description LIKE '%".$search."%') AND email= '$useremail'
			";
		}
		else
		{
			$query = "
			SELECT * FROM images WHERE email= '$useremail'
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
							<p><a href="http://imagehosting.ninjaswork.com/gallery/edit/'.$row["id"].'" class="btn btn-warning" role="button">Edit</a>
								<a href="http://imagehosting.ninjaswork.com/gallery/delete/'.$row["id"].'" class="btn btn-danger" role="button" onclick="return confirm(\'Are you sure?\')">Delete</a>
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

	public function delete($id)
	{
		$this->db->select('email');
		$this->db->from('images');
		$this->db->where('id',$id);
		$resSQL = $this->db->get();
		if ($resSQL->num_rows() > 0) {
			$resultRaw = $resSQL->result_array();
			$result = $resultRaw[0];
			$name = $result['email'];
		}
		if($name == $this->session->userdata('logged_in')['email']){
		$this->Gallery_model->delete($id);
		$this->session->set_flashdata('message',"Image has been deleted");
		redirect('gallery');
		}
		else {
			redirect('login');
		}
	}
}
