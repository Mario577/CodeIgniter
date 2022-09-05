<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empleadomodelo extends CI_Model
{


  public function getmodelo_bydui()
  {

    //$this->db->where('dui', "09875463-0");
    // return  $this->db->query("SELECT * FROM clientes")->result();
    // return  $this->db->get("clientes")->result();
    //return  $this->db->get_where("clientes", array('dui' => "09875463-0"))->result();
    //$this->db->where('dui', $dui_);
    return  $this->db->get("clientes")->result();
  }
  //----------------------------------------------------------------------------------------
  public function insertar($datos)
  {
    if (!$this->db->insert('clientes', $datos)) {
      return false;
    }
    return true;
  }

//-------------------------------------------------------------------------------------------

  public function tabla()
  {
    return  $this->db->get("clientes")->result();
  }
//-------------------------------------------------------------------------------------------

  public function borrado($datob){
    if(!$this->db->delete("clientes", array('dui' => $datob))){
        return false;
    }
    return true;
  }

  public function actualizar($anterior, $document, $name, $age){
    // echo $document;
    // throw new Exception("Error Processing Request", 1);
    
    $this->db->where('dui',$anterior);
    $this->db->set('dui', $document);
    $this->db->set('nombre', $name);
    $this->db->set('edad', $age);
    if(!$this->db->update("clientes")){
      return false;
    }
    return true;
  }

  public function sesion($usuario, $contraseña){

    $this->db->where('usuario', $usuario);
    $this->db->where('contraseña', $contraseña);
    $validar = $this->db->get('permisos');
    if($validar->num_rows()>0){
        return TRUE;
    }else{
        return FALSE;
    }
  }


}
