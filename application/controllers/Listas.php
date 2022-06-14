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
        $tablanombre = array('nombre'=>$name);
        if(!$this->empleadomodelo->insertar($usuarios, $tablanombre)){
            $usuarios['sms']= 'Ocurrio un error en con los datos del usuario';
            $this->load->view('usuarios', $usuarios);
        }
        $usuarios['sms']= 'usuario añadido';
        $datos = $this->empleadomodelo->getmodelo_bydui();
        $info1 = $this->empleadomodelo->clientes();
        $data = array('empleados' =>$datos, 'infoclientes'=>$info1);
        $this->load->view('usuarios', $data, $usuarios);
    }

    

        
        
}



   
