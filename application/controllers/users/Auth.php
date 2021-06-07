<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
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
		$this->load->model('model_user', 'users');
		$this->load->model('model_pendaftaran', 'pendaftaran');
	}

	public function index()
	{
		$this->load->view('frontend/homepage');
	}

	public function login()
	{
		$this->data['subview'] = "frontend/auth/login";
		$this->load->view('frontend/main_auth', $this->data);
	}

	public function validate()
	{
		$email		= $this->input->post('email');
		$password	= $this->input->post('password');
		$getByemail	= $this->users->getWhereData("users", ['email' => $email])->row();

		if ($getByemail) {
			if (password_verify($password, $getByemail->password)) {
				// Cek Tahun Login
				$date = date('Y-m-d H:i:s');
				$idPendaftaran = $this->users->getWhereData("pendaftaran", ['YEAR(start_date)' => $date])->row_array()['id'];
				$date = date('Y-m-d H:i:s');
				$isOpen = $this->pendaftaran->getCustom("pendaftaran", "end_date >= '$date'")->row();
				if ($isOpen) {
					$this->session->set_userdata('idPendaftaran', $isOpen->id);
				}
				// Cek sudah daftar di form
				$isRegister = $this->users->getWhereData("form", ['id_user' => $getByemail->id, 'id_pendaftaran' => $idPendaftaran, 'YEAR(created_at)' => $date])->row();
				if ($isRegister) {
					$this->session->set_userdata('idPendaftaranForm', $idPendaftaran);
					$this->session->set_userdata('register', true);
				}

				$dataSession = array(
					'id' => $getByemail->id,
					'role' => 'user',
					'name' => $getByemail->nama_lengkap,
					'status' => "login"
				);

				$this->session->set_userdata($dataSession);
				redirect(base_url("profile"));
			} else {
				$this->session->set_flashdata('message', 'Password tidak cocok');
				redirect(base_url("login"));
			}
		} else {
			$this->session->set_flashdata('message', 'Email tidak cocok');
			redirect(base_url("login"));
		}
	}

	public function register()
	{
		$this->data['subview'] = "frontend/auth/register";
		$this->load->view('frontend/main_auth', $this->data);
	}

	public function save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', ['is_unique' => 'Email sudah Terdaftar.']);
		$this->form_validation->set_rules('nisn', 'Nisn', 'required|is_unique[users.nisn]', ['is_unique' => 'NISN sudah Terdaftar.']);

		if ($this->form_validation->run() === FALSE) {
			$this->data['subview'] = "frontend/auth/register";
			$this->load->view('frontend/main_auth', $this->data);
		} else {
			$data = [
				'role' => 'user',
				'nama_lengkap' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'nisn' => $this->input->post('nisn'),
				'no_telepon' => $this->input->post('telepon'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];
			$ret = $this->users->insertData('users', $data);
			redirect(base_url("login"));
		}
	}
}
