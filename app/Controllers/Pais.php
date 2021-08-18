<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaisModel;

class Pais extends BaseController
{
    protected $paises, $session;
    protected $reglas;

    public function __construct()
    {
        //$this->session = session();
        $this->paises = new PaisModel();
        helper(['form']);

        $this->reglas = ['nombre' => [
            'rules' => 'required',
            //'errors' => ['required' => 'El campo {field} es obligatorio.']
            'errors' => ['required' => 'El nombre del país es obligatorio.']
        ], 'siglas' => [
            'rules' => 'required',
            'errors' => ['required' => 'Las siglas son un campo obligatorio.']
        ]];
    }

    public function index($activo = 1)
    {
        //Si no existe una variable de sesión - Valida las sesiones
        /* if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }*/

        //Pendiente, consultar una sentencia SQL para que pueda organizar las columna
        $paises = $this->paises->where('activo', $activo)->findAll();

        //$unidades = $this->unidades->where('activo', $activo)->findAll();
        //print_r($this->paises->getlastQuery());

        $data = ['titulo' => 'Países', 'datos' => $paises];

        echo view('header');
        echo view('pais/pais', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar País'];

        echo view('header');
        echo view('pais/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->paises->save([
                'nombre' => $this->request->getPost('nombre'),
                'siglas' => $this->request->getPost('siglas')
            ]);
            return redirect()->to(base_url() . '/pais');
        } else {
            $data = ['titulo' => 'Agregar País', 'validation' => $this->validator];
            echo view('header');
            echo view('pais/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $pais = $this->paises->where('id', $id)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar país', 'datos' => $pais, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar país', 'datos' => $pais];
        }

        echo view('header');
        echo view('pais/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->paises->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'siglas' => $this->request->getPost('siglas')
                ]
            );
            return redirect()->to(base_url() . '/pais');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->paises->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/pais');
    }
    public function reingresar($id)
    {
        $this->paises->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/pais');
    }

    public function eliminados($activo = 0)
    {
        $paises = $this->paises->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Paises Eliminados', 'datos' => $paises];

        echo view('header');
        echo view('pais/eliminados', $data);
        echo view('footer');
    }
}
