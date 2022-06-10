<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listas extends CI_Controller {

    public function Lista(){

        $usuario = array('dui' =>"06369537-7" ,'name'=>'mario', 'edad'=>"20");
        $data = array('usuario' => $usuario,);

        $this->load->view('usuarios',$data);

        
    }




}