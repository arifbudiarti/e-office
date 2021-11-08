<?php

namespace App\Controllers;

class Apps extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->db1 = \Config\Database::connect();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['modules'] = $this->modulesModel->getModules();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        return view('pages/app/home', $data);
    }
}
