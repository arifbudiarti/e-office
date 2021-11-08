<?php

namespace App\Controllers;

class Settings extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->mainUrl = 'Settings';
        $this->idModules = 2;
        $this->db1 = \Config\Database::connect();
    }

    public function index()
    {
        $data['title'] = "Settings";
        $data['url'] = $this->mainUrl;
        $data['child'] = "";
        $data['menu'] = $this->sidebar(0);
        // echo "<pre>";
        // print_r($data['menu']);
        // echo "</pre>";
        return view('pages/settings/index', $data);
    }

    public function rubrik($idMod)
    {
        $data['title'] = "Settings";
        $data['url'] = $this->mainUrl;
        $data['child'] = "Rubrik";
        $data['menu'] = $this->sidebar($idMod);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        return view('pages/settings/rubrik', $data);
    }

    public function rubrikDet($idMod)
    {
        $data['title'] = "Settings";
        $data['url'] = $this->mainUrl;
        $data['child'] = "Rubrik Detail";
        $data['rubrik'] = $this->rubrikModel->getRubrik();
        $data['menu'] = $this->sidebar($idMod);
        return view('pages/settings/rubrikDet', $data);
    }

    public function menu($idMod)
    {
        $data['title'] = "Data Rubrik Surat";
        $data['menu'] = $this->sidebar($idMod);
        return view('pages/settings/menu', $data);
    }

    public function privilage($idMod)
    {
        $data['title'] = "Data Rubrik Surat";
        $data['menu'] = $this->sidebar($idMod);
        return view('pages/settings/privilage', $data);
    }

    public function users($idMod)
    {
        $data['title'] = "Data Rubrik Surat";
        $data['menu'] = $this->sidebar($idMod);
        return view('pages/settings/rubrik', $data);
    }

    public function employee($idMod)
    {
        $data['title'] = "Data Karyawan";
        $data['menu'] = $this->sidebar($idMod);
        return view('pages/settings/employee', $data);
    }

    public function sidebar($idMod)
    {
        $lvl1 = $this->db1->query("SELECT * FROM v_menu WHERE id_md_modules=" . $this->idModules . " AND ref IS NULL ORDER BY urutan ASC")->getResultArray();
        for ($i = 0; $i < sizeof($lvl1); $i++) {
            $id_md_menu = $lvl1[$i]['id_md_menu'];
            $menu = $lvl1[$i]['menu'];
            $icon = $lvl1[$i]['icon'];
            $url = $lvl1[$i]['url'];
            if ($lvl1[$i]['id_md_menu'] == $idMod) {
                $aktif = 'class="active"';
            } else {
                $aktif = '';
            }
            $lvl2 = $this->db1->query("SELECT * FROM md_menu WHERE ref=" . $id_md_menu . " ORDER BY urutan ASC")->getResultArray();

            $data[] = array(
                'id_md_menu' => $id_md_menu,
                'menu' => $menu,
                'icon' => $icon,
                'url' => $url,
                'aktif' => $aktif,
                'detail' => $lvl2,
            );
        }

        return $data;
    }
}
