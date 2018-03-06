<?php
error_reporting(0);
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('HomeModel');
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
	}
	
	function index()
	{
		$this->data['posts'] = $this->HomeModel->getPosts();
		$this->data['images'] = $this->HomeModel->getimg();
		$this->load->view('home_view',$this->data);
	}
	
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '', 'uemail' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('home/index');
	}
}


