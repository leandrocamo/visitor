<?php

namespace App\Models;

use CodeIgniter\Model;

class CantonModel extends Model
{
    protected $table      = 'canton';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'siglas', 'id_provincia', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_ingreso';
    protected $updatedField  = 'fecha_edicion';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
