<?php

namespace App\Models;

use CodeIgniter\Model;

class RubrikModel extends Model
{
    protected $table = 'md_rubrik';
    protected $primaryKey = 'id_md_rubrik';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['rubrik', 'status', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function getRubrik($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where('id_md_rubrik', $id)->findAll();
        }
    }
}
