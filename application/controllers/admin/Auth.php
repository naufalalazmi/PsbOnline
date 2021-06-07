<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Check is login
		if (isLogin()) {
			if (isAdmin()) {
				redirect(base_url("admin"));
			} else {
				redirect(base_url("profile"));
			}
		}
				
		// Load Model
		$this->load->model('model_user','users');

	}

	public function index()	{
		$this->data['subview'] = "backend/auth/login";
        $this->load->view('backend/main_auth', $this->data);
	}

	public function validate() {
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$getByusername	= $this->users->getWhereData("administrator", ['username' => $username])->row();

		if ($getByusername) {
			if (password_verify($password, $getByusername->password)) {
				$dataSession = array(
					'id' => $getByusername->id,
					'role' => 'admin',
					'username' => $getByusername->username,
					'status' => "login"
				);
	
				$this->session->set_userdata($dataSession);
				redirect(base_url("admin"));
			} else {
				$this->session->set_flashdata('message', 'Password tidak cocok');
				redirect(base_url("admin/login"));
			}
		} else {
			$this->session->set_flashdata('message', 'Username tidak cocok');
			redirect(base_url("admin/login"));
		}
	}

	public function register() {
		$this->data['subview'] = "frontend/page/register";
        $this->load->view('frontend/main_auth', $this->data);
	}
}
