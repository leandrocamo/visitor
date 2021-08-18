<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProvinciaModel;
use App\Models\PaisModel;

class Provincia extends BaseController
{
    protected $provincias, $session, $pais;
    protected $reglas;

    public function __construct()
    {
        //$this->session = session();
        $this->provincias = new ProvinciaModel();
        $this->pais = new PaisModel();
        helper(['form']);

        $this->reglas = ['nombre' => [
            'rules' => 'required',
            //'errors' => ['required' => 'El campo {field} es obligatorio.']
            'errors' => ['required' => 'El nombre de la provincia es obligatorio.']
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
        $provincias = $this->provincias->where('activo', $activo)->findAll();
        $pais = $this->pais->where('activo', $activo)->findAll();

        //print_r($this->provincias->getlastQuery());

        $data = ['titulo' => 'Provincias', 'datos' => $provincias];

        echo view('header');
        echo view('provincia/provincia', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $pais = $this->pais->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar Provincia', 'paises' => $pais];

        echo view('header');
        echo view('provincia/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->provincias->save([
                'nombre' => $this->request->getPost('nombre'),
                'siglas' => $this->request->getPost('siglas'),
                'id_pais' => $this->request->getPost('id_pais')
            ]);
            return redirect()->to(base_url() . '/provincia');
        } else {
            $data = ['titulo' => 'Agregar Provincia', 'validation' => $this->validator];
            echo view('header');
            echo view('provincia/nuevo', $data);
            echo view('footer');
        }
    }
    public function editar($id, $valid = null)
    {
        $pais = $this->pais->where('activo', 1)->findAll();
        $provincias = $this->provincias->where('id', $id)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar provincia', 'datos' => $provincias, 'paises' => $pais, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar provincia', 'datos' => $provincias, 'paises' => $pais,];
        }

        echo view('header');
        echo view('provincia/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->provincias->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'siglas' => $this->request->getPost('siglas'),
                    'id_pais' => $this->request->getPost('id_pais')
                ]
            );          
            return redirect()->to(base_url() . '/provincia');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->provincias->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/provincia');
    }
    public function reingresar($id)
    {
        $this->provincias->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/provincia');
    }

    public function eliminados($activo = 0)
    {
        $provincias = $this->provincias->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Provincias Eliminadas', 'datos' => $provincias];

        echo view('header');
        echo view('provincia/eliminados', $data);
        echo view('footer');
    }
}
