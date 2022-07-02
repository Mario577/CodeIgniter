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

        $data = array('empleados' => $datos);

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
        $data = array('empleados' => $datos);
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


        $data = array('empleados' => $datos);

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
/*--------------------------------------------------------------------------------------*/
    public function tablausuarios3()
    {

        $this->load->library('table');
        $listado = $this->empleadomodelo->tabla();
        $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
        $this->table->set_template($template);
        $this->table->set_heading('Dui', 'Nombre', 'Edad');
        foreach ($listado as $fila) {
            $this->table->add_row($fila->dui,$fila->nombre,$fila->edad,
            "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='.bs-example-modal-sm'>Eliminar</button>
            <div class='modal fade bs-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel'>
              <div class='modal-dialog modal-sm' role='document'>
                <div class='modal-content'>
                  Estas seguro que deseas eliminar este usuario ?
                  <button id='eliminar' class='btn-danger' name='eliminar'> Eliminar </button>
                </div>
              </div>
            </div>",
            "<button id='modificar' class='btn-warning' name='modificar'> Modificar </button>");
        };
        $socios['tabla_datos'] = $this->table->generate();
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
                $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
                $this->table->set_template($template);
                $this->table->set_heading('Dui', 'Nombre', 'Edad');
                foreach ($listado as $fila) {
                $this->table->add_row($fila->dui,$fila->nombre,$fila->edad,"<button id='eliminar' class='btn-danger' name='eliminar'> Eliminar </button>", "<button id='modificar' class='btn-warning' name='modificar'> Modificar </button>");
                };
                $usuarios['tabla_datos'] = $this->table->generate();
                $usuarios['respuesta'] = true;
                $usuarios['msj'] = $name . ' ha sido agregado a la base de datos';
            }
            echo json_encode($usuarios);
            return;
            }
            public function eliminar(){
                $eliminar = $this->input->post('eliminar');
                $datob = array('eliminar'=>$eliminar);
                if(!$this->empleadomodelo->delete($datob)) {
                    $info['respuesta'] = false;
                    $info['msj'] = 'Ocurrio un error al eliminar al usuario';
                }else{
                    $datob = $this->empleadomodelo->getmodelo_bydui("");
                    $info['tabla']= $datob;
                    $info['respuesta']= true;
                    $info['msj']= 'El usuario fue eliminado con exito';
                }
                echo json_encode($info);
                return;
            }
        
    

    //-----------------------------------------------------------------------------------------------------


    public function proyecto_css()
    {

        $this->load->library('table');
        $listado = $this->empleadomodelo->tabla();
        $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
        $this->table->set_template($template);
        $this->table->set_heading('Dui', 'Nombre', 'Edad');
        foreach ($listado as $fila) {
            $this->table->add_row($fila->dui,$fila->nombre,$fila->edad,
            "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='.bs-example-modal-sm'>Eliminar</button>
            <div class='modal fade bs-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel'>
              <div class='modal-dialog modal-sm' role='document'>
                <div class='modal-content'>
                  Estas seguro que deseas eliminar este usuario ?<br>
                  <br>
                  <a class='fcc-btn' href=http://localhost/CodeIgniter/index.php/Listas/eliminar_css?listado=fila>Eliminar</a>
                </div>
              </div>
            </div>",
            "<button id='modificar' class='btn-warning' name='modificar'> Modificar </button>");
        };
        $socios['tabla_datos'] = $this->table->generate();
        $this->load->view('nuevoproyecto', $socios);
    }


    //----------------------------------------------------------------------------------------------------------




    public function Guardar_css()
    {
        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        $datos = array('dui' => $document, 'nombre' => $name, 'edad' => $age);
       
            if (!$this->empleadomodelo->insertar($datos)) {
                $usuarios['respuesta'] = false;
                $usuarios['msj'] = 'Ocurrio un error en con los datos del usuario';
                $this->load->view('nuevoproyecto', $usuarios);
            } else {
                $this->load->library('table');
                $listado = $this->empleadomodelo->tabla();
                $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
                $this->table->set_template($template);
                $this->table->set_heading('Dui', 'Nombre', 'Edad');
                foreach ($listado as $fila) {
                $this->table->add_row($fila->dui,$fila->nombre,$fila->edad,"<button id='eliminar' class='btn-danger' name='eliminar'> Eliminar </button>", "<button id='modificar' class='btn-warning' name='modificar'> Modificar </button>");
                };
                $usuarios['tabla_datos'] = $this->table->generate();
                $usuarios['respuesta'] = true;
                $usuarios['msj'] = $name . ' ha sido agregado a la base de datos';
                $this->load->view('nuevoproyecto', $usuarios);
            }
    }
    public function eliminar_css()
    {
        $datob = $_GET['dui'];
        echo $datob;
        $resultado = $this->empleadomodelo->getmodelo_bydui($datob);
        if(count($resultado) == 'dui')
        {
            $this->empleadomodelo->delete($datob);
            $this->load->view('nuevoproyecto');
        }
    }

    
}
