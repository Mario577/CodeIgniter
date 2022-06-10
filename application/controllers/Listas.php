<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listas extends CI_Controller {

    public function Lista(){

        $usuario = array('dui' =>"06369537-7, 02678987-9" ,'nombre'=>'mario, ana', 'edad'=>"20, 34");
        $data = array('usuario' => $usuario,);

        $this->load->view('usuarios',$data);

        
    }

    /*$number=$_GET["dui"];
    $name=$_GET["nombre"];
    $age=$_GET["contra"];*/
    
}