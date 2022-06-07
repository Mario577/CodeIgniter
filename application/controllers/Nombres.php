<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nombres extends CI_Controller {

    public function Nombre(){

        $nombres="marcos";

        $edad=18;

        // $data = array('nombres, edad' =>$nombres, $edad); 
        $data = array('nombres' => $nombres,'edad' => $edad );
        $this->load->view('clientes',$data);
    
    }
}