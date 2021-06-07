<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
		$this->load->model('model_user', 'users');
	}

	public function admin()
	{
		$this->data['type']		= "admin";
		$this->data['subview']	= "backend/admin/home";
		$this->load->view('backend/main', $this->data);
	}

	public function siswa()
	{
		$this->data['type']		= "siswa";
		$this->data['subview']	= "backend/user/home";
		$this->load->view('backend/main', $this->data);
	}

	// Section CRUD
	public function add($type)
	{
		$this->data['type']		= $type;
		$this->data['subview']	= "backend/$type/add";
		$this->load->view('backend/main', $this->data);
	}

	public function save_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', ['is_unique' => 'Email sudah Terdaftar.']);
		$this->form_validation->set_rules('nisn', 'Nisn', 'required|is_unique[users.nisn]', ['is_unique' => 'NISN sudah Terdaftar.']);

		if ($this->form_validation->run() === FALSE) {
			$this->data['subview']	= "backend/user/add";
			$this->load->view('backend/main', $this->data);
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
			redirect(base_url("admin/user/siswa"));
		}
	}

	public function save_admin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[administrator.email]', ['is_unique' => 'Email sudah Terdaftar.']);
		$this->form_validation->set_rules('nip', 'Nip', 'required|is_unique[administrator.nip]', ['is_unique' => 'NIP sudah Terdaftar.']);

		if ($this->form_validation->run() === FALSE) {
			$this->data['subview']	= "backend/admin/add";
			$this->load->view('backend/main', $this->data);
		} else {
			$data = [
				'nip' 			=> $this->input->post('nip'),
				'nama_lengkap'	=> $this->input->post('nama_lengkap'),
				'alamat'		=> $this->input->post('alamat'),
				'no_telepon'	=> $this->input->post('no_telepon'),
				'tempat_lahir'	=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'email' 		=> $this->input->post('email'),
				'username'		=> $this->input->post('username'),
				'password'		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];
			$ret = $this->users->insertData('administrator', $data);
			redirect(base_url("admin/user/admin"));
		}
	}

	public function edit_siswa($id)
	{
		$this->data['data'] = $this->users->getWhereData("users", ['id' => $id])->row();
		$this->data['subview']	= "backend/user/edit";
		$this->load->view('backend/main', $this->data);
	}

	public function edit_admin($id)
	{
		$this->data['data'] = $this->users->getWhereData("administrator", ['id' => $id])->row();
		$this->data['subview']	= "backend/admin/edit";
		$this->load->view('backend/main', $this->data);
	}

	public function update_siswa($id)
	{
		$data = [
			'nama_lengkap' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'nisn' => $this->input->post('nisn'),
			'no_telepon' => $this->input->post('telepon')
		];
		if ($this->input->post('password')) {
			$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}
		$ret = $this->users->updateData('users', $id, $data);
		redirect(base_url("admin/user/siswa"));
	}

	public function update_admin($id)
	{
		$data = [
			'nip' 			=> $this->input->post('nip'),
			'nama_lengkap'	=> $this->input->post('nama_lengkap'),
			'alamat'		=> $this->input->post('alamat'),
			'no_telepon'	=> $this->input->post('no_telepon'),
			'tempat_lahir'	=> $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'email' 		=> $this->input->post('email'),
			'username'		=> $this->input->post('username')
		];
		if ($this->input->post('password')) {
			$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}
		$ret = $this->users->updateData('administrator', $id, $data);
		redirect(base_url("admin/user/admin"));
	}

	public function delete_siswa($id)
	{
		$this->users->deleteData('users', ['id' => $id]);
		redirect(base_url("admin/user/siswa"));
	}

	public function delete_admin($id)
	{
		$this->users->deleteData('administrator', ['id' => $id]);
		redirect(base_url("admin/user/admin"));
	}

	// Section Get Data json for Datatable
	public function data_user()
	{

		$kolom = ['nama_lengkap', 'email', 'nisn'];

		$disp_start   = intval($this->input->get('iDisplayStart', true));
		$item_perpage = intval($this->input->get('iDisplayLength', true));
		$orders       = [];
		$searchs      = [];

		// searching
		$tmp = $this->input->get('sSearch', true);
		if (!empty($tmp)) {
			$searchs = ['nama_lengkap' => $tmp];
		}

		// ordering
		$sort_total = intval($this->input->get('iSortingCols', true));
		if ($sort_total > 0) {
			for (
				$i = 0;
				$i < count($kolom);
				$i++
			) {
				$sort_x     = $this->input->get('iSortCol_' . $i, true);
				$sort_yn    = $this->input->get('bSortable_' . $sort_x, true);
				$sort_dir   = $this->input->get('sSortDir_' . $i, true);

				if ($sort_yn == 'true') {
					$orders[$kolom[$sort_x]] = $sort_dir;
				}
			}
		}

		$content = $this->users->dataJson('users', $item_perpage, $disp_start, $orders, $searchs);

		$json = [
			'sEcho'                => intval($this->input->get('sEcho', true)),
			'iTotalRecords'        => $content['total_all'],
			'iTotalDisplayRecords' => $content['total_found'],
			'aaData' => []
		];

		foreach ($content['data'] as $c) {
			$edit_url = site_url('admin/user/edit_siswa/' . $c->id);
			$del_url  = site_url('admin/user/delete_siswa/' . $c->id);

			$d = [];
			$d[] = '<td><td>';
			$d[] = '<td>' . $c->nama_lengkap . '</td>';
			$d[] = '<td>' . $c->email . '</td>';
			$d[] = '<td>' . $c->nisn . '</td>';
			$d[] = '
				<a href="' . $edit_url . '" title="Edit ' . $c->nama_lengkap . '" class="btn btn-primary"><i class="dripicons-pencil"></i></a>
				<a href="' . $del_url . '" title="Hapus ' . $c->nama_lengkap . '" class="btn btn-danger" onclick="if(! confirm(\'Hapus ' . $c->nama_lengkap . '\')) return false;"><i class="dripicons-trash"></i></a>
			';

			$json['aaData'][] = $d;
		}

		header('Content-type: application/json');
		echo json_encode($json);
	}

	public function data_admin()
	{

		$kolom = ['nama_lengkap', 'email', 'nip'];

		$disp_start   = intval($this->input->get('iDisplayStart', true));
		$item_perpage = intval($this->input->get('iDisplayLength', true));
		$orders       = [];
		$searchs      = [];

		// searching
		$tmp = $this->input->get('sSearch', true);
		if (!empty($tmp)) {
			$searchs = ['nama_lengkap' => $tmp];
		}

		// ordering
		$sort_total = intval($this->input->get('iSortingCols', true));
		if ($sort_total > 0) {
			for (
				$i = 0;
				$i < count($kolom);
				$i++
			) {
				$sort_x     = $this->input->get('iSortCol_' . $i, true);
				$sort_yn    = $this->input->get('bSortable_' . $sort_x, true);
				$sort_dir   = $this->input->get('sSortDir_' . $i, true);

				if ($sort_yn == 'true') {
					$orders[$kolom[$sort_x]] = $sort_dir;
				}
			}
		}

		$content = $this->users->dataJson('administrator', $item_perpage, $disp_start, $orders, $searchs);

		$json = [
			'sEcho'                => intval($this->input->get('sEcho', true)),
			'iTotalRecords'        => $content['total_all'],
			'iTotalDisplayRecords' => $content['total_found'],
			'aaData' => []
		];

		foreach ($content['data'] as $c) {
			$edit_url = site_url('admin/user/edit_admin/' . $c->id);
			$del_url  = site_url('admin/user/delete_admin/' . $c->id);

			$d = [];
			$d[] = '<td><td>';
			$d[] = '<td>' . $c->nama_lengkap . '</td>';
			$d[] = '<td>' . $c->email . '</td>';
			$d[] = '<td>' . $c->nip . '</td>';
			$d[] = '
				<a href="' . $edit_url . '" title="Edit ' . $c->nama_lengkap . '" class="btn btn-primary"><i class="dripicons-pencil"></i></a>
				<a href="' . $del_url . '" title="Hapus ' . $c->nama_lengkap . '" class="btn btn-danger" onclick="if(! confirm(\'Hapus ' . $c->nama_lengkap . '\')) return false;"><i class="dripicons-trash"></i></a>
			';

			$json['aaData'][] = $d;
		}

		header('Content-type: application/json');
		echo json_encode($json);
	}
}
