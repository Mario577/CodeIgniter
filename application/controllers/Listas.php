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
            $this->table->add_row(
                $fila->dui,
                $fila->nombre,
                $fila->edad,
                "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#example' data-dui='$fila->dui'>Eliminar
                <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                </button>",
                "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui' data-nombre='$fila->nombre' data-edad='$fila->edad'>Modificar
                <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                </button>"
            );
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
                $this->table->add_row(
                    $fila->dui, 
                    $fila->nombre, 
                    $fila->edad, 
                    "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#example' data-dui='$fila->dui'>Eliminar
                    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>",
                    "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui' data-nombre='$fila->nombre' data-edad='$fila->edad'>Modificar
                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                    </button>");
            };
            $usuarios['tabla_datos'] = $this->table->generate();
            $usuarios['respuesta'] = true;
            $usuarios['msj'] = $name . ' ha sido agregado a la base de datos';
        }
        echo json_encode($usuarios);
        return;
    }

    public function eliminar_by_ajax(){

        $dato_a = $this->input->post('dui');

        if (!$this->empleadomodelo->borrado($dato_a)) {
            
            $dato_del['respuesta']= false;
            $dato_del['msj']= 'No se pudo eliminar el usuario';
        } else {
            $this->load->library('table');
            $listado = $this->empleadomodelo->tabla();
            $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
            $this->table->set_template($template);
            $this->table->set_heading('Dui', 'Nombre', 'Edad');
            foreach ($listado as $fila) {
                $this->table->add_row(
                    $fila->dui, 
                    $fila->nombre, 
                    $fila->edad, 
                    "<button type='button' id=erase class='btn btn-danger' data-toggle='modal' data-target='#example' data-dui='$fila->dui'>Eliminar
                    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>",
                    "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui' data-nombre='$fila->nombre' data-edad='$fila->edad'>Modificar
                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                    </button>");
            };
            $dato_del['tabla_datos'] = $this->table->generate();
            $dato_del['respuestadel'] = true;
            $dato_del['msj'] = $dato_a . ' ha sido eliminado con exito';
        }
        echo json_encode($dato_del);
        return;
    }

    public function actualizar_by_ajax(){

        $anterior = $this->input->post('andui');
        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        if (!$this->empleadomodelo->actualizar($anterior, $document, $name, $age)) {
            $dato_upd['respuesta'] = false;
            $dato_upd['msj'] = 'No se pudo actualizar el usuario';
        } else {
            $this->load->library('table');
            $listado = $this->empleadomodelo->tabla();
            $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
            $this->table->set_template($template);
            $this->table->set_heading('Dui', 'Nombre', 'Edad');
            foreach ($listado as $fila) {
                $this->table->add_row(
                    $fila->dui, 
                    $fila->nombre, 
                    $fila->edad, 
                    "<button type='button' id=erase class='btn btn-danger' data-toggle='modal' data-target='#example' data-dui='$fila->dui'>Eliminar
                    <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    </button>",
                    "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui' data-nombre='$fila->nombre' data-edad='$fila->edad'>Modificar
                    <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>
                    </button>");
            };
            $dato_upd['tabla_datos'] = $this->table->generate();
            $dato_upd['respuesta_upd'] = true;
            $dato_upd['msj'] = $name . ' ha sido actualizado con exito';
        }
        echo json_encode($dato_upd);
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
            $this->table->add_row($fila->dui, $fila->nombre, $fila->edad, "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui'>Eliminar</button>", "<a class='btn btn-warning' href='http://localhost/CodeIgniter/index.php/Listas/vista_css'>Modificar</a>");
        };
        $socios['tabla_datos'] = $this->table->generate();
        $usuario = $this->input->post('usuario');
        $contraseña = $this->input->post('contraseña');
        if(isset($contraseña)){
            if($this->empleadomodelo->sesion($usuario, md5($contraseña))){
            header("Location: http://localhost/CodeIgniter/index.php/Listas/proyecto_css", TRUE, 301);
            exit();
            }
            header("Location: http://localhost/CodeIgniter/index.php/Listas/comprobar_css", TRUE, 301);
            exit();       
        }
        $this->load->view('nuevoproyecto', $socios);
    }
    
    
    //----------------------------------------------------------------------------------------------------------
    
    
    
    
    public function Guardar_css()
    {
        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        $datos = array('dui' => $document, 'nombre' => $name, 'edad' => $age);
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'dui',
                'label' => 'Documento Unico de Identidad',
                'rules' => 'required|exact_length[10]|alpha_dash',
                'errors' => array(
                    'required' => ' Ingresa un Dui',
                    'exact_length' => 'Debe contener 10 caracteres exactos',
                    'alpha_dash' => 'Debe contener alphanumericos y -|_|'
                )
            ),
            array(
                'field' => 'nombre',
                'label' => 'Nombre del Usuario',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Ingresa un Nombre'
                )
            ),
            array(
                'field' => 'edad',
                'label' => 'Edad del Usuario',
                'rules' => 'required|greater_than_equal_to[18]',
                'errors' => array(
                    'required' => 'Ingresa una edad',
                    'greater_than_equal_to[18]' => 'Debe tener 18 años o Mayor'
                )
            ),
        );
        
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
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
                    $this->table->add_row($fila->dui, $fila->nombre, $fila->edad, "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui'>Eliminar</button>", "<a class='btn btn-warning' href='http://localhost/CodeIgniter/index.php/Listas/vista_css'>Modificar</a>");
                };
                $usuarios['tabla_datos'] = $this->table->generate();
                $usuarios['respuesta'] = true;
                $usuarios['msj'] = $name . ' ha sido agregado a la base de datos';
                header("Location: http://localhost/CodeIgniter/index.php/Listas/proyecto_css", TRUE, 301);
                exit();
                $this->load->view('nuevoproyecto', $usuarios);
            }
        } else {
            echo "<script>alert('error en el llenado del formulario')</script>";
            echo validation_errors();
            $this->load->library('table');
            $listado = $this->empleadomodelo->tabla();
            $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
            $this->table->set_template($template);
            $this->table->set_heading('Dui', 'Nombre', 'Edad');
            foreach ($listado as $fila) {
                $this->table->add_row($fila->dui, $fila->nombre, $fila->edad, "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui'>Eliminar</button>", "<a class='btn btn-warning' href='http://localhost/CodeIgniter/index.php/Listas/vista_css'>Modificar</a>");
            };
            $socios['tabla_datos'] = $this->table->generate();
            $this->load->view('nuevoproyecto', $socios );
            
        }
    }

    public function eliminar_css()
    {
        $datob = $this->input->post('dui');
        echo $datob;

        if (!$this->empleadomodelo->borrado($datob)) {
            echo "<script> alert('El usuario no pudo ser eliminado') </script>";
            $this->load->view('nuevoproyecto');
        } else {
            echo "<script> alert('Usuario eliminado con exito') </script>";
            $this->load->library('table');
            $listado = $this->empleadomodelo->tabla();
            $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
            $this->table->set_template($template);
            $this->table->set_heading('Dui', 'Nombre', 'Edad');
            foreach ($listado as $fila) {
                $this->table->add_row($fila->dui, $fila->nombre, $fila->edad, "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui'>Eliminar</button>", "<a class='btn btn-warning' href='http://localhost/CodeIgniter/index.php/Listas/vista_css'>Modificar</a>");
            };
            $usuarios['tabla_datos'] = $this->table->generate();
            header("Location: http://localhost/CodeIgniter/index.php/Listas/proyecto_css", TRUE, 301);
            exit();
            $this->load->view('nuevoproyecto', $usuarios);
        }
    }
    public function vista_css()
    {
        $this->load->library('table');
        $listado = $this->empleadomodelo->tabla();
        $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
        $this->table->set_template($template);
        $this->table->set_heading('Dui', 'Nombre', 'Edad');
        foreach ($listado as $fila) {
            $this->table->add_row($fila->dui, $fila->nombre, $fila->edad, "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui', data-nombre='$fila->nombre', data-edad='$fila->edad'>Modificar</button>", "<a class='btn btn-info' href='http://localhost/CodeIgniter/index.php/Listas/proyecto_css'>Inicio</a>");
        };
        $socios['tabla_datos'] = $this->table->generate();
        $this->load->view('actualizar_css', $socios);
    }


    public function update_css()
    {

        $anterior = $this->input->post('andui');
        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        if (!$this->empleadomodelo->actualizar($anterior, $document, $name, $age)) {
            echo "<script> alert('No se pudo actualizar el usuario') </script>";
            $this->load->view('actualizar_css');
        } else {
            echo "<script> alert('Usuario actualizado con exito') </script>";
            $this->load->library('table');
            $listado = $this->empleadomodelo->tabla();
            $template = array('table_open' => '<table  class="table table-bordered" id="tabla1">');
            $this->table->set_template($template);
            $this->table->set_heading('Dui', 'Nombre', 'Edad');
            foreach ($listado as $fila) {
                $this->table->add_row($fila->dui, $fila->nombre, $fila->edad, "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui'>Eliminar</button>", "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' data-dui='$fila->dui', data-nombre='$fila->nombre', data-edad='$fila->edad'>Modificar</button>");
            };
            $socios['tabla_datos'] = $this->table->generate();
            header("Location: http://localhost/CodeIgniter/index.php/Listas/proyecto_css", TRUE, 301);
            exit();
            $this->load->view('nuevoproyecto', $socios);
        }
    }

}

//-----------------------------------------------------------------------------------------------------------------------------