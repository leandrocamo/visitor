<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaisModel;
use App\Models\ProvinciaModel;
use App\Models\CantonModel;

class Canton extends BaseController
{
    protected $pais, $provincia, $canton, $session;
    protected $reglas;

    public function __construct()
    {
        //$this->session = session();
        $this->canton = new CantonModel();
        $this->provincia = new ProvinciaModel();
        $this->pais = new PaisModel();
        helper(['form']);

        $this->reglas = ['nombre' => [
            'rules' => 'required',
            //'errors' => ['required' => 'El campo {field} es obligatorio.']
            'errors' => ['required' => 'El nombre del cantón o ciudad es obligatorio.']
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
        $pais = $this->pais->where('activo', 1)->findAll();
        $provincia = $this->provincia->where('activo', $activo)->findAll();
        $canton = $this->canton->where('activo', $activo)->findAll();

        //print_r($this->paises->getlastQuery());

        $data = ['titulo' => 'Cantón', 'datos' => $canton, 'provincia' => $provincia, 'pais' => $pais];

        echo view('header');
        echo view('canton/canton', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $pais = $this->pais->where('activo', 1)->findAll();
        $provincia = $this->provincia->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Cantón', 'provincia' => $provincia, 'pais' => $pais];

        echo view('header');
        echo view('canton/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            //echo 'Mensaje: ' . $this->request->getPost('id_provincia');
            //exit;
            $this->canton->save([
                'nombre' => $this->request->getPost('nombre'),
                'siglas' => $this->request->getPost('siglas'),
                'id_provincia' => $this->request->getPost('id_provincia')
            ]);
            return redirect()->to(base_url() . '/canton');
        } else {
            $data = ['titulo' => 'Agregar Cantón Error', 'validation' => $this->validator];
            echo view('header');
            echo view('canton/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $provincias = $this->provincias->where('id', $id)->first();
        $canton = $this->canton->where('id', $id)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar Cantón', 'datos' => $canton, 'provincia' => $provincias, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar Cantón', 'datos' => $canton, 'provincia' => $provincias];
        }

        echo view('header');
        echo view('canton/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->canton->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'siglas' => $this->request->getPost('siglas'),
                    'id_provincia' => $this->request->getPost('id_provincia')
                ]
            );
            return redirect()->to(base_url() . '/canton');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->canton->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/canton');
    }
    public function reingresar($id)
    {
        $this->canton->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/canton');
    }

    public function eliminados($activo = 0)
    {
        $canton = $this->canton->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Cantones Eliminados', 'datos' => $canton];

        echo view('header');
        echo view('canton/eliminados', $data);
        echo view('footer');
    }
}
