<?php

namespace App\Models;

use CodeIgniter\Model;

class PaisModel extends Model
{
    protected $table      = 'pais';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'siglas','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_ingreso';
    protected $updatedField  = 'fecha_edicion';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
