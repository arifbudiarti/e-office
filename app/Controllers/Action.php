<?php

namespace App\Controllers;

class Action extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
    }

    public function rubrik($act, $id = null)
    {
        if ($act == '1') { //save
            $data = array(
                'rubrik' => $this->request->getPost('rubrik'),
                'status' => 1,
            );
            $status = $this->rubrikModel->insert($data);
        } elseif ($act == '2') { //update
            $id = $this->request->getPost('id_md_rubrik');
            $data = array(
                'id_md_rubrik' => $this->request->getPost('id_md_rubrik'),
                'rubrik' => $this->request->getPost('rubrik'),
                'status' => $this->request->getPost('status'),
            );
            $status = $this->rubrikModel->update($id, $data);
        } else { //delete
            $status = $this->rubrikModel->where('id_md_rubrik', $id)->delete();
        }

        if ($status) {
            echo json_encode(array("status" => TRUE));
        }
    }

    public function rubrikDet($act, $id = null)
    {
        if ($act == '1') { //save
            $data = array(
                'id_md_rubrik' => $this->request->getPost('rubrik'),
                'berkas' => $this->request->getPost('berkas'),
                'kode_berkas' => $this->request->getPost('kode_berkas'),
                'keterangan' => $this->request->getPost('keterangan'),
                'status' => 1,
            );
            $status = $this->rubrikDetModel->insert($data);
        } elseif ($act == '2') { //update
            $id = $this->request->getPost('id_md_rubrik_detail');
            $data = array(
                'id_md_rubrik_detail' => $this->request->getPost('id_md_rubrik_detail'),
                'id_md_rubrik' => $this->request->getPost('rubrik'),
                'berkas' => $this->request->getPost('berkas'),
                'kode_berkas' => $this->request->getPost('kode_berkas'),
                'keterangan' => $this->request->getPost('keterangan'),
                'status' => $this->request->getPost('status'),
            );
            $status = $this->rubrikDetModel->update($id, $data);
        } else { //delete
            $status = $this->rubrikDetModel->where('id_md_rubrik_detail', $id)->delete();
        }

        if ($status) {
            echo json_encode(array("status" => TRUE));
        }
    }
}
