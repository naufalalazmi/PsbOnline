<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// Check is login
		if (!isLogin()) {
			redirect(base_url("admin/login"));
		} elseif (!isAdmin()) {
			redirect(base_url("profile"));
		}

		// Load Model
		$this->load->model('model_pendaftaran', 'pendaftaran');
	}

	public function index()
	{
		$date = date('Y-m-d H:i:s');
		$this->data['name']				= $this->pendaftaran->getCustom("form", "YEAR(created_at)='$date' order by nilai_rata2 desc")->row();
		$this->data['totalPendaftar']	= $this->pendaftaran->getCount("form", "YEAR(created_at)='$date'");
		$this->data['totalUser']		= $this->pendaftaran->getCount("administrator");
		$this->data['subview']			= "backend/dashboard/home";
		$this->load->view('backend/main', $this->data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
