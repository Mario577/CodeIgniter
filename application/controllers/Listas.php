<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listas extends CI_Controller {

    public function Lista(){


        $this->load->model("empleadomodelo");

        $datos = $this->empleadomodelo->getmodelo_bydui("06369577-7"); 
        
        $data = array('empleados'=> $datos); 
        
        $this->load->view('usuarios',$data);

        
    }

    /*$number=$_GET["dui"];
    $name=$_GET["nombre"];
    $age=$_GET["contra"];*/
    
}