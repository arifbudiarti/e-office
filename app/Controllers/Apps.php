<?php

namespace App\Controllers;

class Apps extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
        $this->mainUrl = 'Apps';
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['modules'] = $this->modulesModel->getModules();
        $data['url'] = $this->mainUrl;
        $data['child'] = "";
        return view('pages/app/home', $data);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    }
}
