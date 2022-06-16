<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Listas extends CI_Controller {
    public function __construct(){
        parent:: __construct();
          $this->load->model("empleadomodelo");
    }


    public function Lista(){
        
        
        $datos = $this->empleadomodelo->getmodelo_bydui(""); 

        $info1 = $this->empleadomodelo->clientes();
        
        $data = array('empleados'=> $datos, 'infoclientes'=>$info1);
        
        $this->load->view('usuarios', $data);
        
    }

    public function Guardar(){

        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        $usuarios = array('dui' =>$document, 'nombre'=>$name, 'edad'=>$age);
        if(!$this->empleadomodelo->insertar($usuarios,)){
            $usuarios['sms']= 'Ocurrio un error en con los datos del usuario';
            $this->load->view('usuarios', $usuarios);
        }
        $usuarios['sms']= 'usuario añadido';
        $datos = $this->empleadomodelo->getmodelo_bydui();
        $info1 = $this->empleadomodelo->clientes();
        $data = array('empleados' =>$datos, 'infoclientes'=>$info1);
        $this->load->view('usuarios', $data, $usuarios);
    }
    public function agregar(){
        $this->load->view('agregarnuevo');
       
    }
    public function tablausuarios(){

        $datos = $this->empleadomodelo->getmodelo_bydui(""); 

        $info1 = $this->empleadomodelo->clientes();
        
        $data = array('empleados'=> $datos, 'infoclientes'=>$info1);
        
        $this->load->view('agregarnuevo', $data);
    
    }
    public function guardar_by_ajax(){

        $document = $this->input->post('dui');
        $name = $this->input->post('nombre');
        $age = $this->input->post('edad');
        $datos = array('dui' =>$document, 'nombre'=>$name, 'edad'=>$age);
        if(!$this->empleadomodelo->insertar($datos)) {
            $usuarios['respuesta']= false;
            $usuarios['msj']= 'Ocurrio un error en con los datos del usuario';
        } else { 
            $usuarios['respuesta']= true;
            $usuarios['msj']= $name . ' ha sido agregado a la base de datos';
        }
        echo json_encode($usuarios);
        return;            
    }

    public function test(){

        $document = $this->input->post('dui');
        $usuarios = array('respuesta' =>'ok', 'msj'=>'funciona','dui'=>$document);
        
        echo json_encode($usuarios);
            
    }

}



    

        



   
