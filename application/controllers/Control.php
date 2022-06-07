<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

    public function hola(){

        $var=10;

        $var++;

        $data = array('var' =>$var);
        $this->load->view('hola',$data);
    
    }
}