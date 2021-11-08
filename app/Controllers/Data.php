<?php

use App\Models\Serverside_model;

namespace App\Controllers;

class Data extends BaseController
{
    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
    }

    public function index()
    {
        return view('pages/app/home');
    }

    public function rubrik()
    {
        $request = \Config\Services::request();
        $list_data = $this->serversideModel;
        $where = 'deleted_at IS NULL';
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array(NULL, 'id_md_rubrik', 'rubrik', 'status');
        $column_search = array('id_md_rubrik', 'rubrik', 'status');
        $order = array('id_md_rubrik' => 'asc');
        $list = $list_data->get_datatables('md_rubrik', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");
        foreach ($list as $lists) {
            $no++;
            if ($lists->rubrik) {
                $stats = 'Aktif';
            } else {
                $stats = 'Non Aktif';
            }

            $row    = array();
            $row[] = $no;
            $row[] = $lists->rubrik;
            $row[] = $stats;
            $row[] = '<button class="btn btn-outline btn-info btn-sm dim" type="button"><i class="fa fa-edit" onclick="edit(' . $lists->id_md_rubrik . ')"></i></button>
            <button class="btn btn-outline btn-danger btn-sm dim" type="button"><i class="fa fa-trash" onclick="die(' . $lists->id_md_rubrik . ')"></i></button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('v_rubrik', $where),
            "recordsFiltered" => $list_data->count_filtered('v_rubrik', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
    }

    public function getRubrik($id)
    {
        $data = $this->db1->query("SELECT * FROM md_rubrik WHERE id_md_rubrik=" . $id)->getRowArray();
        echo json_encode($data);
    }

    public function rubrikDet()
    {
        $request = \Config\Services::request();
        $list_data = $this->serversideModel;
        $where = 'deleted_at IS NULL';
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array(NULL, 'id_md_rubrik_detail', 'id_md_rubrik', 'berkas', 'kode_berkas', 'keterangan', 'status');
        $column_search = array('id_md_rubrik_detail', 'id_md_rubrik', 'berkas', 'kode_berkas', 'keterangan', 'status');
        $order = array('kode_berkas' => 'asc');
        $list = $list_data->get_datatables('v_rubrik', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");
        foreach ($list as $lists) {
            $no++;
            if ($lists->status) {
                $stats = 'Aktif';
            } else {
                $stats = 'Non Aktif';
            }
            $row    = array();
            $row[] = $no;
            $row[] = $lists->kode_berkas;
            $row[] = $lists->berkas;
            $row[] = $lists->keterangan;
            $row[] = $stats;
            $row[] = '<button class="btn btn-outline btn-info btn-sm dim" type="button"><i class="fa fa-edit" onclick="edit(' . $lists->id_md_rubrik_detail . ')"></i></button>
            <button class="btn btn-outline btn-danger btn-sm dim" type="button"><i class="fa fa-trash" onclick="die(' . $lists->id_md_rubrik_detail . ')"></i></button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('v_rubrik', $where),
            "recordsFiltered" => $list_data->count_filtered('v_rubrik', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
    }

    public function getRubrikDet($id)
    {
        $data = $this->db1->query("SELECT * FROM v_rubrik WHERE id_md_rubrik_detail=" . $id)->getRowArray();
        echo json_encode($data);
    }
}
