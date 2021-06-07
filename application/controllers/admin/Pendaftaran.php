<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
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
        $this->data['subview']    = "backend/pendaftaran/home";
        $this->load->view('backend/main', $this->data);
    }

    public function hasil()
    {
        $this->data['data']        = $this->pendaftaran->dataJsonHasil();
        $this->data['subview']    = "backend/pendaftaran/home_hasil";
        $this->load->view('backend/main', $this->data);
    }

    public function listHasil($id)
    {
        $this->data['id']        = $id;
        $this->data['subview']    = "backend/pendaftaran/list_hasil";
        $this->load->view('backend/main', $this->data);
    }

    public function printListHasil($id)
    {
        $this->load->library('pdfgenerator');
        $this->data['data'] = $this->pendaftaran->getWhereData('form', ['id_pendaftaran' => $id], ['nilai_rata2', 'desc'], 160)->result();

        $html = $this->load->view('backend/pendaftaran/print_hasil', $this->data, true);
        $this->pdfgenerator->generate($html, 'DOC-HASIL-UJIAN');
    }

    // Section CRUD
    public function add()
    {
        $this->data['subview']    = "backend/pendaftaran/add";
        $this->load->view('backend/main', $this->data);
    }

    public function save()
    {
        $data = [
            'title' => $this->input->post('title'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'date' => $this->input->post('date')
        ];
        $ret = $this->pendaftaran->insertData('pendaftaran', $data);
        redirect(base_url("admin/pendaftaran/"));
    }

    public function edit($id)
    {
        $this->data['data'] = $this->pendaftaran->getWhereData("pendaftaran", ['id' => $id])->row();
        $this->data['subview']    = "backend/pendaftaran/edit";
        $this->load->view('backend/main', $this->data);
    }

    public function update($id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'date' => $this->input->post('date')
        ];
        $ret = $this->pendaftaran->updateData('pendaftaran', $id, $data);
        redirect(base_url("admin/pendaftaran"));
    }

    public function updateStatus($id)
    {
        $idForm = $this->input->post('idForm');
        $bindo = $this->input->post('nilai_bindo');
        $mtk = $this->input->post('nilai_mtk');
        $ipa = $this->input->post('nilai_ipa');
        $bing = $this->input->post('nilai_bing');

        $rata2 = ($bindo + $mtk + $ipa + $bing) / 4;

        $data = [
            'nilai_bindo' => $bindo,
            'nilai_mtk' => $mtk,
            'nilai_ipa' => $ipa,
            'nilai_bing' => $bing,
            'nilai_rata2' => $rata2,
            'status_tes' => $this->input->post('hasil')
        ];
        $ret = $this->pendaftaran->updateData('form', $idForm, $data);
        redirect(base_url("admin/pendaftaran/listHasil/" . $id));
    }

    public function delete($id)
    {
        $this->pendaftaran->deleteData('pendaftaran', ['id' => $id]);
        redirect(base_url("admin/pendaftaran"));
    }

    // Section Get Data json for Datatable
    public function data_json()
    {

        $kolom = ['no', 'title', 'start_date', 'end_date', 'date', 'total'];

        $disp_start   = intval($this->input->get('iDisplayStart', true));
        $item_perpage = intval($this->input->get('iDisplayLength', true));
        $orders       = [];
        $searchs      = [];

        // searching
        $tmp = $this->input->get('sSearch', true);
        if (!empty($tmp)) {
            $searchs = ['title' => $tmp];
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

        $content = $this->pendaftaran->dataJson('pendaftaran', $item_perpage, $disp_start, $orders, $searchs, true);

        $json = [
            'sEcho'                => intval($this->input->get('sEcho', true)),
            'iTotalRecords'        => $content['total_all'],
            'iTotalDisplayRecords' => $content['total_found'],
            'aaData' => []
        ];

        foreach ($content['data'] as $c) {
            $list_url = site_url('admin/pendaftaran/form/' . $c->id);
            $edit_url = site_url('admin/pendaftaran/edit/' . $c->id);
            $del_url  = site_url('admin/pendaftaran/delete/' . $c->id);

            $d = [];
            $d[] = '<td><td>';
            $d[] = '<td>' . $c->title . '</td>';
            $d[] = '<td>' . $c->start_date . '</td>';
            $d[] = '<td>' . $c->end_date . '</td>';
            $d[] = '<td>' . $c->date . '</td>';
            $d[] = '<td>' . $c->total . '</td>';
            $d[] = '
				<a href="' . $list_url . '" title="List ' . $c->title . '" class="btn btn-success"><i class="dripicons-preview"></i></a>
				<a href="' . $edit_url . '" title="Edit ' . $c->title . '" class="btn btn-primary"><i class="dripicons-pencil"></i></a>
				<a href="' . $del_url . '" title="Hapus ' . $c->title . '" class="btn btn-danger" onclick="if(! confirm(\'Hapus ' . $c->title . '\')) return false;"><i class="dripicons-trash"></i></a>
			';

            $json['aaData'][] = $d;
        }

        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function data_json_list($id)
    {

        $kolom = ['no', 'no_form', 'nama_lengkap', 'pendidikan_nisn', 'nilai_bindo', 'nilai_mtk', 'nilai_ipa', 'nilai_bing', 'status_tes'];

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
            $edit_url = site_url('admin/pendaftaran/form/edit/' . $c->id);
            $del_url  = site_url('admin/pendaftaran/form/delete/' . $c->id);

            $d = [];
            $d[] = '<td><td>';
            $d[] = '<td>' . $c->no_form . '</td>';
            $d[] = '<td>' . $c->nama_lengkap . '</td>';
            $d[] = '<td>' . $c->pendidikan_nisn . '</td>';
            $d[] = '<td>' . $c->nilai_bindo . '</td>';
            $d[] = '<td>' . $c->nilai_mtk . '</td>';
            $d[] = '<td>' . $c->nilai_ipa . '</td>';
            $d[] = '<td>' . $c->nilai_bing . '</td>';
            $d[] = '<td>' . $c->nilai_rata2 . '</td>';
            $d[] = '<td>' . $c->status_tes . '</td>';
            $d[] = '
                <button onclick="buttonClick(\'' . $c->id . '\',
                \'' . $c->nilai_bindo . '\',
                \'' . $c->nilai_mtk . '\',
                \'' . $c->nilai_ipa . '\',
                \'' . $c->nilai_bing . '\',
                \'' . $c->nilai_rata2 . '\',
                \'' . $c->status_tes . '\')" 
                class="btn btn-primary waves-effect waves-light" 
                data-id="' . $c->id . '" 
                data-nilai_bindo="' . $c->nilai_bindo . '" 
                data-nilai_mtk="' . $c->nilai_mtk . '" 
                data-nilai_ipa="' . $c->nilai_ipa . '" 
                data-nilai_bing="' . $c->nilai_bing . '"
                data-nilai_rata2="' . $c->nilai_rata2 . '" 
                data-status="' . $c->status_tes . '" 
                data-toggle="modal" 
                data-target=".bs-example-modal-center">
                <i class="dripicons-pencil"></i>
                </button>
			';

            $json['aaData'][] = $d;
        }

        header('Content-type: application/json');
        echo json_encode($json);
    }
}
