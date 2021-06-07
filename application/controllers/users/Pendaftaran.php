<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
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
        $this->load->model('model_user', 'users');
        $this->load->model('model_pendaftaran', 'pendaftaran');
    }

    public function index()
    {
        if (isset($_SESSION['register'])) {
            $this->data['data'] = $this->pendaftaran->getWhereData("form", ['id_pendaftaran' => $_SESSION['idPendaftaranForm'], 'id_user' => $_SESSION['id']])->row();
        }
        $this->data['subview'] = "frontend/pendaftaran/form";
        $this->load->view('frontend/main', $this->data);
    }

    public function print()
    {
        $this->load->library('pdfgenerator');
        $this->data['data'] = $this->pendaftaran->getWhereData("form", ['id_pendaftaran' => $_SESSION['idPendaftaranForm'], 'id_user' => $_SESSION['id']])->row();

        $html = $this->load->view('backend/form/print', $this->data, true);

        $this->pdfgenerator->generate($html, 'DOC-REG-MTs-TSANAWIYAH');
    }

    public function save()
    {
        $id = $_SESSION['idPendaftaran'];
        $date = date('Y-m-d H:i:s');
        $isOpen = $this->pendaftaran->getCustom("pendaftaran", "end_date >= '$date'")->row();
        if (!$isOpen) {
            unset($_SESSION['idPendaftaran']);
            redirect('users/pendaftaran');
        }
        // Get data pendaftaran
        $date = $this->pendaftaran->getWhereData("pendaftaran", ['id' => $id])->row();
        $year = date('Y', strtotime($date->start_date));
        // Cek nisn or no_ijazah
        $nisn   = $this->input->post('nisn');
        $ijazah = $this->input->post('noIjazah');
        $check  = $this->pendaftaran->getCustom("form", "id_pendaftaran = $id AND pendidikan_nisn = '$nisn' OR pendidikan_no_ijazah = '$ijazah'")->row();

        if (empty($check)) {
            // Cek no_form
            $checkNoForm = $this->pendaftaran->getWhereData("form", ['id_pendaftaran' => $id], ['id', 'DESC'])->row();
            $exNoForm    = explode('-', $checkNoForm->no_form);
            $replace     = str_replace('0', '', $exNoForm[3]);
            $buildNoForm = ($replace + 1);
            if (strlen($buildNoForm) == 1) {
                $noForm = $year . '-' . date('md') . '-' . $id . '-00' . $buildNoForm;
            } elseif (strlen($buildNoForm) == 2) {
                $noForm = $year . '-' . date('md') . '-' . $id . '-0' . $buildNoForm;
            } else {
                $noForm = $year . '-' . date('md') . '-' . $id . '-' . $buildNoForm;
            }

            $data = [
                'id_user'                   => $_SESSION['id'],
                'id_pendaftaran'            => $id,
                'status_pembayaran'         => 'belum lunas',
                'no_form'                   => $noForm,
                'nama_lengkap'              => $this->input->post('namaLengkap'),
                'jenis_kelamin'             => $this->input->post('jenisKelamin'),
                'tempat_lahir'              => $this->input->post('tempatLahir'),
                'tanggal_lahir'             => $this->input->post('tanggalLahir'),
                'agama'                     => $this->input->post('agama'),
                'anak_ke'                   => $this->input->post('anakKe'),
                'anak_kandung'              => $this->input->post('saudaraKandung'),
                'anak_tiri'                 => $this->input->post('saudaraTiri'),
                'status_keluarga'           => $this->input->post('statusKeluarga'),
                'register_date'             => date('Y-m-d'),
                'alamat_lengkap'            => $this->input->post('alamatRumah'),
                'alamat_rt'                 => $this->input->post('alamatRumahRt'),
                'alamat_rw'                 => $this->input->post('alamatRumahRw'),
                'alamat_no'                 => $this->input->post('alamatRumahNo'),
                'alamat_desa'               => $this->input->post('alamatRumahDesa'),
                'alamat_kecamatan'          => $this->input->post('alamatRumahKecamatan'),
                'alamat_kabupaten'          => $this->input->post('alamatRumahKabupaten'),
                'alamat_kodepos'            => $this->input->post('alamatRumahPos'),
                'alamat_hp'                 => $this->input->post('alamatRumahTelepon'),
                'pendidikan_asal'           => $this->input->post('lulusanPeserta'),
                'pendidikan_no_ijazah'      => $this->input->post('noIjazah'),
                'pendidikan_tahun_ijazah'   => $this->input->post('tahunIjazah'),
                'pendidikan_nisn'           => $this->input->post('nisn'),
                'pendidikan_npun'           => $this->input->post('npun'),
                'orangtua_ayah'             => $this->input->post('namaAyah'),
                'orangtua_ibu'              => $this->input->post('namaIbu'),
                'orangtua_pendidikan_ayah'  => $this->input->post('pendidikanAyah'),
                'orangtua_pendidikan_ibu'   => $this->input->post('pendidikanIbu'),
                'orangtua_pekerjaan_ayah'   => $this->input->post('pekerjaanAyah'),
                'orangtua_pekerjaan_ibu'    => $this->input->post('pekerjaanIbu'),
                'orangtua_alamat_lengkap'   => $this->input->post('alamatRumahOrtu'),
                'orangtua_alamat_rt'        => $this->input->post('alamatRumahOrtuRt'),
                'orangtua_alamat_rw'        => $this->input->post('alamatRumahOrtuRw'),
                'orangtua_alamat_no'        => $this->input->post('alamatRumahOrtuNo'),
                'orangtua_alamat_desa'      => $this->input->post('alamatRumahOrtuDesa'),
                'orangtua_alamat_kecamatan' => $this->input->post('alamatRumahKecamatan'),
                'orangtua_alamat_kabupaten' => $this->input->post('alamatRumahKabupaten'),
                'orangtua_alamat_kodepos'   => $this->input->post('alamatRumahPos'),
                'orangtua_alamat_hp'        => $this->input->post('alamatRumahTelepon'),
            ];
            $ret = $this->pendaftaran->insertData('form', $data);
            if ($ret) {
                $this->session->set_userdata('idPendaftaranForm', $id);
                $this->session->set_userdata('register', true);
                redirect(base_url("users/pendaftaran"));
            }
        } else {
            if ($check->pendidikan_nisn != $nisn) {
                $message = 'Ijazah Sudah Terdaftar';
            } elseif ($check->pendidikan_no_ijazah != $ijazah) {
                $message = 'Nisn Sudah Terdaftar';
            } else {
                $message = 'Nisn dan Ijazah Sudah Terdaftar';
            }
            $this->data['message']    = $message;
            $this->data['id']        = $id;
            $this->data['subview']    = "frontend/pendaftaran/form";
            $this->load->view('frontend/main', $this->data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
