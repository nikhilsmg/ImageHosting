<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Adminlogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('User_model');
	}
    public function index()
    {
		// get form input
		$email = "admin@imagehosting.com";
        $password = $this->input->post("password");

		// form validation
		
		$this->form_validation->set_rules("password", "Password", "trim|required");
		
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('adminlogin_view');
		}
		else
		{
			// check for user credentials
			$uresult = $this->User_model->get_user($email, $password);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array('login' => TRUE, 'uname' => $uresult[0]->first_name, 'uemail' => $uresult[0]->email, 'uid' => $uresult[0]->id);
				
				$this->session->set_userdata($sess_data);
				
				redirect("admingallery");
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
				redirect('adminlogin/index');
			}
		}
    }
}