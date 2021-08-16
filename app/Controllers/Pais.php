<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaisModel;

class Pais extends BaseController
{
    protected $pais, $session;
    protected $reglas;

    public function __construct()
    {
        //$this->session = session();
        $this->pais = new PaisModel();
        helper(['form']);

        $this->reglas = ['nombre' => [
            'rules' => 'required',
            'errors' => ['required' => 'El campo {field} es obligatorio.']
        ], 'siglas' => [
            'rules' => 'required',
            'errors' => ['required' => 'El campo {field} es obligatorio.']
        ]];
    }
    //1
    public function index($activo = 1)
    {
        //Si no existe una variable de sesión - Valida las sesiones
        /*if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }*/
        //Consulta todos los datos de la tabla pais
        $pais = $this->pais->where('activo', $activo)->findAll();
        //Inicializa el $data que se va enviar al formulario
        $data = ['titulo' => 'Paises', 'datos' => $pais];
        //Se imprime al header y footer, el pais
        echo view('header');
        echo view('pais/pais', $data);
        echo view('footer');
    }
    //2
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar pais'];

        echo view('header');
        echo view('pais/nuevo', $data);
        echo view('footer');
    }
    //3
    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->pais->save([
                'nombre' => $this->request->getPost('nombre'),
                'siglas' => $this->request->getPost('siglas')
            ]);
            return redirect()->to(base_url() . '/pais');
        } else {
            $data = ['titulo' => 'Agregar unidad (revisar)', 'validation' => $this->validator];
            echo view('header');
            echo view('pais/nuevo', $data);
            echo view('footer');
        }
    }
    //4
    public function editar($id, $valid = null)
    {
        $pais = $this->pais->where('id', $id)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar pais', 'datos' => $pais, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar pais', 'datos' => $pais];
        }

        echo view('header');
        echo view('pais/editar', $data);
        echo view('footer');
    }
    //5
    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->pais->update(
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
    //6
    public function eliminados($activo = 0)
    {
        $pais = $this->pais->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Países Eliminados', 'datos' => $pais];

        echo view('header');
        echo view('pais/eliminados', $data);
        echo view('footer');
    }
    public function eliminar($id)
    {
        $this->pais->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/pais');
    }
    public function reingresar($id)
    {
        $this->pais->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/pais');
    }

    //=================================

    
    

    
    

    
 
}
