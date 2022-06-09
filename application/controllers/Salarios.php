<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salarios extends CI_Controller {

    public function pago(){

 
        $empleados = array("Marcos"=>1200,"Elena"=>1200, "Douglas"=>600);
        $data = array('empleados'=> $empleados); 

        $this->load->view('vistasalarios',$data);


    }



}


