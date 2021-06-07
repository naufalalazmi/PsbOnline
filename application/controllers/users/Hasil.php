<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
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

		$this->load->model('model_pendaftaran', 'pendaftaran');
	}

	public function index()
	{
		$date 	= date('Y-m-d H:i:s');
		$isOpen = $this->pendaftaran->getCustom("pendaftaran", "date >= '$date'")->row();
		if ($isOpen) {
			$this->data['status'] = true;
		} else {
			$this->data['status'] = false;
		}
		if (isset($_SESSION['register'])) {
			$this->data['data'] = $this->pendaftaran->getWhereData("form", ['id_pendaftaran' => $_SESSION['idPendaftaranForm'], 'id_user' => $_SESSION['id']])->row();
		}
		$this->data['subview']	= "frontend/hasil/home";
		$this->load->view('frontend/main', $this->data);
	}
}
