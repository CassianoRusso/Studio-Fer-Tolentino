<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Core_model extends CI_Model{

  public function cadastrar($tabela = null, $dados = null){
    if($tabela && is_array($dados)){

      if($this->db->insert($tabela, $dados)){

        /*
         $servico_id = $this->db->query("SELECT MAX(servico_id) as 'servico_id' FROM servicos")->row();

         if(isset($dados["servico_status_pagamento"])){
          if($dados["servico_status_pagamento"] == 1){
            $this->db->insert('caixa', array('caixa_valor' => $dados["servico_valor"], 
                                             'caixa_data' => date('Y-m-d'), 
                                             'Servicos_servico_id' => current($servico_id)) );
          }
        } */

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

  public function editar_servico($tabela = null, $data = null, $condicao = null){
    if($tabela && is_array($condicao) && is_array($data)){
        if($this->db->update($tabela, $data, $condicao)){
            
          if(isset($data["servico_status"])){
            if($data["servico_status"] == 2){
             
              $servico_id = $condicao['servico_id'];

              $existe = $this->db->query("SELECT * FROM caixa WHERE Servicos_servico_id = $servico_id")->row();

              if(empty($existe)){

                $valor = $this->db->query("SELECT servico_valor as 'valor' FROM servicos WHERE servico_id = $servico_id")->row();
                date_default_timezone_set('America/Sao_Paulo');
                $this->db->insert('caixa', array('caixa_valor' => current($valor), 
                                                'caixa_data' => date('Y-m-d'), 
                                                'Servicos_servico_id' => $servico_id));
              }
            
            }
          }
          if(isset($data["servico_status_pagamento"])){
            if($data["servico_status_pagamento"] == 1){
              $servico_id = $condicao['servico_id'];

              $existe = $this->db->query("SELECT * FROM caixa WHERE Servicos_servico_id = $servico_id")->row();

              if(empty($existe)){

                $valor = $this->db->query("SELECT servico_valor as 'valor' FROM servicos WHERE servico_id = $servico_id")->row();
                date_default_timezone_set('America/Sao_Paulo');
                $this->db->insert('caixa', array('caixa_valor' => current($valor), 
                                                'caixa_data' => date('Y-m-d'), 
                                                'Servicos_servico_id' => $servico_id));
              }
            }
          }
            
            return true;

        }else{

            $this->session->set_flashdata('erro', 'Erro ao atualizar os dados!');

        }      
    }else{

        return false;

    }
  }

  public function delete($tabela = null, $condicao = null){
        
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

  public function diaria_servico($tabela = null, $condicao = null){
    if($tabela){

      return $this->db->query(" SELECT * FROM $tabela WHERE DAY(caixa_data) = DAY(CURRENT_DATE()) AND MONTH(caixa_data) = MONTH(CURRENT_DATE()) AND YEAR(caixa_data) = YEAR(CURRENT_DATE()) AND ( servicos_servico_id > 0 OR caixa_servico_produto = 1 ) ")->result();

    }else{

      return false;

    }

  }

  public function mensal_servico($tabela = null){
    if($tabela){
      
      return $this->db->query(" SELECT * FROM $tabela WHERE MONTH(caixa_data) = MONTH(CURRENT_DATE()) AND YEAR(caixa_data) = YEAR(CURRENT_DATE()) AND ( servicos_servico_id > 0 OR caixa_servico_produto = 1 )")->result();
      

    }else{

      return false;

    }

  }

  public function diaria_produto($tabela = null, $condicao = null){
    if($tabela){

      return $this->db->query(" SELECT * FROM $tabela WHERE DAY(caixa_data) = DAY(CURRENT_DATE()) AND MONTH(caixa_data) = MONTH(CURRENT_DATE()) AND YEAR(caixa_data) = YEAR(CURRENT_DATE()) AND ( produtos_produto_id > 0 OR caixa_servico_produto = 2 )")->result();

    }else{

      return false;

    }

  }

  public function mensal_produto($tabela = null){
    if($tabela){
      
      return $this->db->query(" SELECT * FROM $tabela WHERE MONTH(caixa_data) = MONTH(CURRENT_DATE()) AND YEAR(caixa_data) = YEAR(CURRENT_DATE()) AND ( produtos_produto_id > 0 OR caixa_servico_produto = 2 )")->result();
      

    }else{

      return false;

    }

  }

  public function renda($tabela = null){
    if($tabela){

        return $this->db->query(" SELECT caixa_valor as 'preco', MONTH(caixa_data) as 'mes' FROM $tabela WHERE caixa_data >= DATE_ADD(NOW(), INTERVAL -6 MONTH) ")->result();
        
    }else{
        return false;
    }
}
}
