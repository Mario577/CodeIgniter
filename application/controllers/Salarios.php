<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salarios extends CI_Controller {

    public function pago(){

<<<<<<< HEAD
 
        $empleados = array("Marcos"=>1200,"Elena"=>1200, "Douglas"=>600);
        $data = array('empleados'=> $empleados); 

=======
        $planilla= "Marcos Reyes" . "Elena Vasquez" . "Douglas Rodriguez" . "Fabricio Crespin" ;
        $salario = "1200" . "800" . "600" . "400";
    
        $data = array('name'=>$planilla,'salario'=>$salario,);

        foreach ($data as $planilla => $salario) {

            echo " $planilla $salario <br>";
        }
    
>>>>>>> 3e6380c15e93146e4264a5d673b274bfb66d35d2
        $this->load->view('vistasalarios',$data);


    }



}


