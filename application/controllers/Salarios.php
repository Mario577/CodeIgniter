<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salarios extends CI_Controller {

    public function salario(){

        $planilla= "Marcos Reyes" . "Elena Vasquez" . "Douglas Rodriguez" . "Fabricio Crespin" ;
        $salario = "1200" . "800" . "600" . "400";
    
        $data = array('name'=>$planilla,'salario'=>$salario,);

        foreach ($data as $planilla => $salario) {

            echo " $planilla $salario <br>";
        }
    
        $this->load->view('vistasalarios',$data);


    }



}


