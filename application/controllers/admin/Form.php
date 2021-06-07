<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
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

    public function print($id)
    {
        $this->load->library('pdfgenerator');
        $this->data['data'] = $this->pendaftaran->getWhereData("form", ['id' => $id])->row();

        $html = $this->load->view('backend/form/print', $this->data, true);

        $this->pdfgenerator->generate($html, 'DOC-REG-MTs-TSANAWIYAH');
    }

    public function index($id)
    {
        $this->data['id']        = $id;
        $this->data['subview']    = "backend/form/home";
        $this->load->view('backend/main', $this->data);
    }

    // Section CRUD
    public function add($id)
    {
        $this->data['id']        = $id;
        $this->data['subview']    = "backend/form/add";
        $this->load->view('backend/main', $this->data);
    }

    public function save($id)
    {
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
                // 'id_user'                   => '1',
                'id_pendaftaran'            => $id,
                'status_pembayaran'         => $this->input->post('statusPembayaran'),
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
            redirect(base_url("admin/pendaftaran/form/" . $id));
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
            $this->data['subview']    = "backend/form/add";
            $this->load->view('backend/main', $this->data);
        }
    }

    public function edit($id)
    {
        $this->data['data']     = $this->pendaftaran->getWhereData("form", ['id' => $id])->row();
        $this->data['subview']    = "backend/form/edit";
        $this->load->view('backend/main', $this->data);
    }

    public function update($id)
    {
        $idPendaftaran = $this->input->post('idPendaftaran');
        // Get data pendaftaran
        $get = $this->pendaftaran->getWhereData("form", ['id' => $id])->row();
        // Cek nisn or no_ijazah
        $nisn   = $this->input->post('nisn');
        $ijazah = $this->input->post('noIjazah');
        if ($get->pendidikan_nisn != $nisn && $get->pendidikan_no_ijazah != $ijazah) {
            $check  = $this->pendaftaran->getCustom("form", "id_pendaftaran = $idPendaftaran AND pendidikan_nisn = $nisn OR pendidikan_no_ijazah = $ijazah")->row();
        } elseif ($get->pendidikan_nisn == $nisn && $get->pendidikan_no_ijazah != $ijazah) {
            $check  = $this->pendaftaran->getCustom("form", "id_pendaftaran = $idPendaftaran AND pendidikan_no_ijazah = $ijazah")->row();
        } elseif ($get->pendidikan_nisn != $nisn && $get->pendidikan_no_ijazah == $ijazah) {
            $check  = $this->pendaftaran->getCustom("form", "id_pendaftaran = $idPendaftaran AND pendidikan_nisn = $nisn")->row();
        } else {
            $check  = false;
        }

        if (empty($check)) {
            $data = [
                // 'id_user'                   => '1',
                'status_pembayaran'         => $this->input->post('statusPembayaran'),
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
            $ret = $this->pendaftaran->updateData('form', $id, $data);
            redirect(base_url("admin/pendaftaran/form/" . $idPendaftaran));
        } else {
            if ($check->pendidikan_nisn != $nisn) {
                $message = 'Ijazah Sudah Terdaftar';
            } elseif ($check->pendidikan_no_ijazah != $ijazah) {
                $message = 'Nisn Sudah Terdaftar';
            } else {
                $message = 'Nisn dan Ijazah Sudah Terdaftar';
            }
            $this->data['message']    = $message;
            $this->data['data']     = $get;
            $this->data['subview']    = "backend/form/edit";
            $this->load->view('backend/main', $this->data);
        }
    }

    public function delete($id)
    {
        $data = $this->pendaftaran->getWhereData("form", ['id' => $id])->row();
        $this->pendaftaran->deleteData('form', ['id' => $id]);
        redirect(base_url("admin/pendaftaran/form/" . $data->id_pendaftaran));
    }

    // Section Get Data json for Datatable	
    public function data_json($id)
    {

        $kolom = ['no', 'no_form', 'nama_lengkap', 'pendidikan_nisn', 'status_pembayaran'];

        $disp_start   = intval($this->input->get('iDisplayStart', true));
        $item_perpage = intval($this->input->get('iDisplayLength', true));
        $orders       = [];
        $searchs      = [];

        // searching
        $tmp = $this->input->get('sSearch', true);
        if (!empty($tmp)) {
            $searchs = ['no_form' => $tmp, 'nama_lengkap' => $tmp, 'pendidikan_nisn' => $tmp];
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

        $content = $this->pendaftaran->dataJson('form', $item_perpage, $disp_start, $orders, $searchs, null, ['form.id_pendaftaran', $id]);

        $json = [
            'sEcho'                => intval($this->input->get('sEcho', true)),
            'iTotalRecords'        => $content['total_all'],
            'iTotalDisplayRecords' => $content['total_found'],
            'aaData' => []
        ];

        foreach ($content['data'] as $c) {
            $edit_url   = site_url('admin/pendaftaran/form/edit/' . $c->id);
            $del_url    = site_url('admin/pendaftaran/form/delete/' . $c->id);
            $print_url  = site_url('admin/pendaftaran/form/print/' . $c->id);

            $d = [];
            $d[] = '<td><td>';
            $d[] = '<td>' . $c->no_form . '</td>';
            $d[] = '<td>' . $c->nama_lengkap . '</td>';
            $d[] = '<td>' . $c->pendidikan_nisn . '</td>';
            $d[] = '<td>' . $c->status_pembayaran . '</td>';
            $d[] = '
				<a href="' . $print_url . '" title="Print  ' . $c->nama_lengkap . '" class="btn btn-success" target="_blank"><i class="dripicons-print"></i></a>
				<a href="' . $edit_url . '" title="Edit ' . $c->nama_lengkap . '" class="btn btn-primary"><i class="dripicons-pencil"></i></a>
				<a href="' . $del_url . '" title="Hapus ' . $c->nama_lengkap . '" class="btn btn-danger" onclick="if(! confirm(\'Hapus ' . $c->nama_lengkap . '\')) return false;"><i class="dripicons-trash"></i></a>
			';

            $json['aaData'][] = $d;
        }

        header('Content-type: application/json');
        echo json_encode($json);
    }
}
