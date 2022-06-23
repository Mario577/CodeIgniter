<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("empleadomodelo");
    }


    public function Lista()
    {


        $datos = $this->empleadomodelo->getmodelo_bydui("");

        $info1 = $this->empleadomodelo->clientes();

        $data = array('empleados' => $datos, 'infoclientes' => $info1);

        $this->load->view('usuarios', $data);
    }

    public function Guardar()
    {

        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        $usuarios = array('dui' => $document, 'nombre' => $name, 'edad' => $age);
        if (!$this->empleadomodelo->insertar($usuarios,)) {
            $usuarios['sms'] = 'Ocurrio un error en con los datos del usuario';
            $this->load->view('usuarios', $usuarios);
        }
        $usuarios['sms'] = 'usuario añadido';
        $datos = $this->empleadomodelo->getmodelo_bydui();
        $info1 = $this->empleadomodelo->clientes();
        $data = array('empleados' => $datos, 'infoclientes' => $info1);
        $this->load->view('usuarios', $data, $usuarios);
    }
    /*---------------------------------------------------------------------------*/
    public function tablausuarios()
    {

        $datos = $this->empleadomodelo->getmodelo_bydui("");

        $info1 = $this->empleadomodelo->clientes();

        $data = array('empleados' => $datos, 'infoclientes' => $info1);

        $this->load->view('agregarnuevo', $data);
    }
    /*---------------------------------------------------------------------------*/
    public function guardar_by_ajax()
    {

        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        $datos = array('dui' => $document, 'nombre' => $name, 'edad' => $age);
        if (!$this->empleadomodelo->insertar($datos)) {
            $usuarios['respuesta'] = false;
            $usuarios['msj'] = 'Ocurrio un error en con los datos del usuario';
        } else {
            $usuarios['respuesta'] = true;
            $usuarios['msj'] = $name . ' ha sido agregado a la base de datos';
        }
        echo json_encode($usuarios);
        return;
    }

    /*-----------------------------------------------------------------------------*/

    public function tablausuarios2()
    {

        $datos = $this->empleadomodelo->getmodelo_bydui("");

        $info1 = $this->empleadomodelo->clientes();

        $data = array('empleados' => $datos, 'infoclientes' => $info1);

        $this->load->view('agregarnuevo2', $data);
    }

    /*------------------------------------------------------------------------------*/

    public function guardar_by_ajax2()
    {

        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        $datos = array('dui' => $document, 'nombre' => $name, 'edad' => $age);
        if (!$this->empleadomodelo->insertar($datos)) {
            $usuarios['respuesta'] = false;
            $usuarios['msj'] = 'Ocurrio un error en con los datos del usuario';
        } else {
            $datos = $this->empleadomodelo->getmodelo_bydui("");
            $usuarios['tabla'] = $datos;
            $usuarios['respuesta'] = true;
            $usuarios['msj'] = $name . ' ha sido agregado a la base de datos';
        }
        echo json_encode($usuarios);
        return;
    }

    public function tablausuarios3()
    {

        $listado = $this->empleadomodelo->tabla();

        $this->load->library('table');
        $template = array('table_open' => '<table  class="table" id="tabla1">');
        $this->table->set_template($template);
        $this->table->set_heading(array('data1' => 'Dui', 'data2' => 'Nombre', 'data3' => 'Edad',));
        $socios['tabla_datos'] = $this->table->generate($listado);

        $this->table->clear();

        $this->load->view('agregarnuevo3', $socios);
    }

    public function guardar_by_ajax3()
    {

        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        $datos = array('dui' => $document, 'nombre' => $name, 'edad' => $age);

        if (!$this->empleadomodelo->insertar($datos)) {
            $usuarios['respuesta'] = false;
            $usuarios['msj'] = 'Ocurrio un error en con los datos del usuario';
        } else {

            $this->load->library('table');
            $listado = $this->empleadomodelo->tabla();
            $template = array('table_open' => '<table  class="table" id="tabla1">');
            $this->table->set_template($template);
            $this->table->set_heading('Dui','Nombre','Edad');
            $usuarios['tabla_datos'] = $this->table->generate($listado);
            
            

            $usuarios['respuesta'] = true;
            $usuarios['msj'] = $name . ' ha sido agregado a la base de datos';
        }
        echo json_encode($usuarios);
        return;
    }
}
