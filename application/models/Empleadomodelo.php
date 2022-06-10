<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleadomodelo extends CI_Model{

    public function getmodelo(){
        
     //  return  $this->db->query("SELECT * FROM clientes")->result();
     //  return  $this->db->get("clientes")->result();
       //return  $this->db->get_where("clientes", array('dui' => "09875463-0"))->result();
     
     
       //$this->db->where('dui', "09875463-0");
       return  $this->db->get("clientes")->result();


       

        }

        public function getmodelo_bydui($dui_){
        
            //  return  $this->db->query("SELECT * FROM clientes")->result();
            //  return  $this->db->get("clientes")->result();
              //return  $this->db->get_where("clientes", array('dui' => "09875463-0"))->result();
            
            
              // 
              $this->db->where('dui', $dui_);
              return  $this->db->get("clientes")->result();
       
       
              
       
               }
       



    }


