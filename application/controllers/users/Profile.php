<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// Check is login
		if (!isLogin()) {
			redirect(base_url("login"));
		} elseif (!isSiswa()) {
			redirect(base_url("profile"));
		}
	}

	public function index()
	{
		$this->data['subview'] = "frontend/profile/home";
		$this->load->view('frontend/main', $this->data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('homepage');
	}
}
