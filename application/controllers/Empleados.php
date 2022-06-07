<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function empleado(){

        $nombre = "marcos reyes";
        $fecha = "01/08/2022";
        $salario = "1200";


        $data = array('nombre'=> $nombre,'fecha'=> $fecha, 'salario'=>$salario);
    
        $this->load->view('tablaempleado',$data);


    }



}