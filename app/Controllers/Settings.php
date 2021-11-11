<?php

namespace App\Controllers;

class Settings extends BaseController
{

    public function __construct()
    {
        $this->month = date('m');
        $this->year = date('Y');
        $this->mainUrl = 'Settings';
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
        // $lvl1 = $this->db1->query("SELECT * FROM v_menu WHERE id_md_modules=" . $this->idModules . " AND ref IS NULL ORDER BY urutan ASC")->getResultArray();
        // for ($i = 0; $i < sizeof($lvl1); $i++) {
        //     $id_md_menu = $lvl1[$i]['id_md_menu'];
        //     $menu = $lvl1[$i]['menu'];
        //     $icon = $lvl1[$i]['icon'];
        //     $url = $lvl1[$i]['url'];
        //     if ($lvl1[$i]['id_md_menu'] == $idMod) {
        //         $aktif = 'class="active"';
        //     } else {
        //         $aktif = '';
        //     }
        //     $lvl2 = $this->db1->query("SELECT * FROM md_menu WHERE ref=" . $id_md_menu . " ORDER BY urutan ASC")->getResultArray();

        //     $data[] = array(
        //         'id_md_menu' => $id_md_menu,
        //         'menu' => $menu,
        //         'icon' => $icon,
        //         'url' => $url,
        //         'aktif' => $aktif,
        //         'detail' => $lvl2,
        //     );
        // }

        // return $data;
        $dmenu = $this->db1->query("SELECT * FROM v_menu_lvl1")->getResultArray();
        for ($i = 0; $i < sizeof($dmenu); $i++) {
            $id = $dmenu[$i]['md_id_menu'];
            $menu = $dmenu[$i]['menu'];
            $icon = $dmenu[$i]['icon'];
            $url = $dmenu[$i]['url'];

            $lvl1[] = array(
                'id' => $id,
                'menu' => $menu,
                'icon' => $icon,
                'url' => $url,
            );

            if (empty($url)) {
                $dmenu2 = $this->db1->query("SELECT * FROM v_menu_lvl2 WHERE ref=" . $id)->getResultArray();
                for ($j = 0; $j < sizeof($dmenu2); $j++) {
                    $id2 = $dmenu2[$j]['md_id_menu'];
                    $menu2 = $dmenu2[$j]['menu'];
                    $ref2 = $dmenu2[$j]['ref'];
                    $url2 = $dmenu2[$j]['url'];
                    $icon2 = $dmenu2[$j]['icon'];

                    $lvl2[$ref2][] = array(
                        'id' => $id2,
                        'menu' => $menu2,
                        'url' => $url2,
                        'icon' => $icon2,
                    );

                    if (empty($url2)) {
                        $dmenu3 = $this->db1->query("SELECT * FROM v_menu_lvl3 WHERE ref=" . $id2)->getResultArray();
                        for ($k = 0; $k < sizeof($dmenu3); $k++) {
                            $id3 = $dmenu3[$k]['md_id_menu'];
                            $menu3 = $dmenu3[$k]['menu'];
                            $ref3 = $dmenu3[$k]['ref'];
                            $url3 = $dmenu3[$k]['url'];
                            $icon3 = $dmenu3[$k]['icon'];

                            $lvl3[$ref3][] = array(
                                'id' => $id3,
                                'menu' => $menu3,
                                'url' => $url3,
                                'icon' => $icon3,
                            );
                        }
                    }
                }
            }
        }
        $data = array(
            'level1' => $lvl1,
            'level2' => $lvl2,
            'level3' => $lvl3,
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        return $data;
    }
}
