<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Agendas_model extends CI_Model{

    public function get_all($tabela = null, $condicao = null){
        if($tabela){
    
          if(is_array($condicao)){
    
            $this->db->where($condicao);
    
          }
          return $this->db->get($tabela)->result();
    
        }else{
    
          return false;
    
        }
    
    }

    public function get_by_id($tabela = null, $condicao = null){
        if($tabela){

            if(is_array($condicao)){

            $this->db->where($condicao);
            $this->db->limit(1);
            
            }
            return $this->db->get($tabela)->row();

        }else{

            return false;

        }

    }

    public function agenda($tabela = null, $condicao = null){
        if($tabela){

            if(is_array($condicao)){
      
              $this->db->where($condicao);
              
            }
            return $this->db->get($tabela)->result();
      
          }else{
      
            return false;
      
          }
    }

    public function agenda_cadastrada($tabela = null){
      if($tabela){

        return $this->db->query(" SELECT agenda_id FROM $tabela ORDER BY agenda_id DESC")->row();

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

    public function editar($tabela = null, $data = null, $condicao = null){
        
        if($tabela && is_array($condicao) && is_array($data)){
            if($this->db->update($tabela, $data, $condicao)){            
                
              return true;
  
            }else{
  
                $this->session->set_flashdata('erro', 'Erro ao atualizar os dados!');
  
            }      
        }else{
  
            return false;
  
        }
    }

    public function deletar($tabela = null, $condicao = null){
        
      $this->db->db_debug = FALSE;

      if($tabela && is_array($condicao)){

          $status = $this->db->delete($tabela, $condicao);

          $error = $this->db->error();

          if(! $status){
              foreach($error as $code){
                  if($code == 1451){

                    $this->session->set_flashdata('erro', 'Esse registro não poderá ser excluido, pois está sendo utilizado em outra tabela!');

                  }
              }
          }else{

              return true;

          }

          $this->db->db_debug = TRUE;

      }else{
          return false;
      }
  }

    public function notificacoes($tabela = null, $condicao = null){
      if($tabela){
        date_default_timezone_set('America/Sao_Paulo');
        
        return $this->db->query(" SELECT * FROM $tabela WHERE DAY(agenda_data) = DAY(CURRENT_DATE()) AND MONTH(agenda_data) = MONTH(CURRENT_DATE()) AND YEAR(agenda_data) = YEAR(CURRENT_DATE()) ")->result();
  
      }else{
  
        return false;
  
      }
  
    }

    public function editar_notificacao($dados){
      $id = $dados->agenda_id;
      $notificacao = $dados->agenda_notificacao;

      if($this->db->query(" UPDATE agenda SET agenda_notificacao = $notificacao WHERE agenda_id = $id ")){

        return true;

      } else{

        return false;

      }
      
    }

    public function finalizar_servico($agenda_id){

      if($this->db->query(" UPDATE agenda SET agenda_status_servico = 1 WHERE agenda_id = $agenda_id ")){

        return true;

      } else{

        return false;

      }

    }

}