<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Listas extends CI_Controller {


    public function Lista(){
        
        
        $this->load->model("empleadomodelo");
        
        $datos = $this->empleadomodelo->getmodelo_bydui(""); 
        
        $data = array('empleados'=> $datos,); 
        
        $this->load->view('usuarios',$data);

           
    }

     public function getnumeros(){

    $numeros = $_POST["numeros"];

    if($numeros){

        echo " no esta vacia . $numeros";
    }

    if(isset($_POST["numeros"])){

        echo "Hola <b>. $_POST[numeros] .</b> esto paso";



    }





    }
}

   
