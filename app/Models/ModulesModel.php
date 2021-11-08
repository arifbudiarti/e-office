<?php

namespace App\Models;

use CodeIgniter\Model;

class ModulesModel extends Model
{
    protected $table = 'md_modules';
    protected $primaryKey = 'id_md_modules';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['modules', 'status', 'icon', 'url', 'color', 'urutan', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getModules($id = false)
    {
        if ($id === false) {
            return $this->orderBy('urutan', 'asc')->findAll();
        } else {
            return $this->where('id_md_modules', $id)->orderBy('urutan', 'asc')->findAll();
        }
    }
}
