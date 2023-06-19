<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Caixa_model extends CI_Model{

    public function caixa($tabela = null, $condicao = null){
        if($tabela){

          if(is_array($condicao)){

            $this->db->where($condicao);
            
          }
          return $this->db->get($tabela)->result();
      
        }else{
      
          return false;
      
        }
    }
    
    public function clientes($tabela = null, $condicao = null){
        if($tabela){

          if(is_array($condicao)){
    
            $this->db->where($condicao);
            
          }
          return $this->db->get($tabela)->result();
      
        }else{
      
          return false;
      
        }
    }

    public function servicos($tabela = null, $condicao = null){
        if($tabela){

            if(is_array($condicao)){
      
              $this->db->where($condicao);
              
            }
            return $this->db->get($tabela)->result();
      
          }else{
      
            return false;
      
          }
    }

    public function produtos($tabela = null, $condicao = null){
        if($tabela){

            if(is_array($condicao)){
      
              $this->db->where($condicao);
              
            }
            return $this->db->get($tabela)->result();
      
          }else{
      
            return false;
      
          }
    }

    public function cadastrar($tabela = null, $dados = null){
        if($tabela && is_array($dados)){
    
          if($this->db->insert($tabela, $dados)){
    
            return true;
    
          }else{
            return $this->session->set_flashdata('erro', 'Erro na tentativa de cadastro!');
          }
    
        }else{
          return false;
        }
    
    }

}