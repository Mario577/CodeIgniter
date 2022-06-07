<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salarios extends CI_Controller {

    public function salario(){

        $name= "Marcos Reyes";
        $name1= "Elena Vasquez";
        $name2= "Douglas Rodriguez";
        $name3= "Fabricio Crespin";

        $salario = "1200";
        $salario1 = "800";
        $salario2 = "600";
        $salario3 = "400";

    
        $data = array('name'=>$name,'salario'=>$salario,'name1'=>$name1, 'salario1'=>$salario1, 'name2'=>$name2, 'salario2'=>$salario2, 'name3'=>$name3, 'salario3'=>$salario3);
    
        $this->load->view('vistasalarios',$data);


    }



}


