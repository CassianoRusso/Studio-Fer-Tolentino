<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Servicos extends CI_Controller{

  public function __construct(){
    parent::__construct();

    if(!$this->ion_auth->logged_in()){
      $this->session->set_flashdata('info', 'Sua sessão expirou.');
      redirect('login');
    }

    $this->load->model("Core_model", "model");
  }

  public function index(){
    $data = array(
      'titulo' => 'Lista dos Serviços',
      'pagina' => 'listar-servicos',
      'usuario' => $user = $this->ion_auth->user()->row(),
      'servicos' => $this->model->get_all('servicos'),
      'clientes' => $this->model->get_all('clientes'),
      'datatables' => true,
      'plugin_calendar' => true
    );

    $this->load->view('layout/header', $data);
    $this->load->view('servicos/listar-servicos', $data);
    $this->load->view('layout/footer', $data);

  }

  public function cadastrar(){
    $data = array(
      'titulo' => 'Cadastrar serviço',
      'pagina' => 'cadastrar-servico',
      'usuario' => $user = $this->ion_auth->user()->row(),
      'formulario' => true,
      'plugin_editor' => true
    );

    $this->form_validation->set_rules('servico_nome', 'Selecione um tipo de serviço.', 'required');
    $this->form_validation->set_rules('servico_valor', 'Por favor, insira o valor do serviço.', 'min_length[3]');

    if($this->form_validation->run()){

      $dados = array_map('trim', $_POST);
      extract($dados);
      
      $dados["servico_nome"] = ucfirst($servico_nome);
      $dados["servico_descricao"] = ucfirst($servico_descricao);
      
      if($this->model->cadastrar('servicos', $dados)){
        $this->session->set_flashdata('sucesso', 'Serviço cadastrado com sucesso!');
      }
      
      redirect(base_url('listar-servicos'));

    }else{
      $this->load->view('layout/header', $data);
      $this->load->view('servicos/cadastrar-servico');
      $this->load->view('layout/footer');
    }

  }

  public function editar($servico_id){
    $data = array(
      'titulo' => 'Editar serviço',
      'pagina' => 'editar-servico',
      'usuario' => $user = $this->ion_auth->user()->row(),
      'servicos' => $this->model->get_by_id('servicos', array('servico_id' => $servico_id)),
      'formulario' => true,
      'plugin_editor' => true
    );
    
    $this->form_validation->set_rules('servico_nome', 'Selecione um tipo de serviço.', 'required');
    $this->form_validation->set_rules('servico_valor', 'Por favor, insira o valor do serviço.', 'min_length[3]');

    if($this->form_validation->run()){
      
      $dados = array_map('trim', $_POST);
      extract($dados);
      
      $dados["servico_nome"] = ucfirst($servico_nome);
      $dados["servico_descricao"] = ucfirst($servico_descricao);
      
      if($this->model->editar('servicos', $dados, array('servico_id' => $servico_id))){
        $this->session->set_flashdata('sucesso', 'Serviço atualizado com sucesso!');
      }
      
      redirect(base_url("listar-servicos"));

    }else{
      $this->load->view('layout/header', $data);
      $this->load->view('servicos/editar-servico');
      $this->load->view('layout/footer');
    }
  }

  public function deletar($servico_id){

    if($this->model->delete('servicos', array('servico_id' => $servico_id))){
      $this->session->set_flashdata('sucesso', 'Serviço excluído com sucesso!');
    }

    redirect(base_url('listar-servicos'));

  }

  /* public function finalizar($servico_id){

    if($this->model->editar_servico('servicos', array('servico_status' => 1), array('servico_id' => $servico_id))){
      $this->session->set_flashdata('sucesso', 'Serviço finalizado e movido para a lista de prontos!');
    }
    redirect(base_url("servicos-fazer"));
    
  }

  public function entregar($servico_id){

    date_default_timezone_set('America/Sao_Paulo');
    if($this->model->editar_servico('servicos', array('servico_status' => 2, 'servico_status_pagamento' => 1, 'servico_data_entrega' => date('Y-m-d')), array('servico_id' => $servico_id))){
      $this->session->set_flashdata('sucesso', 'Serviço entregue!');
    }
    redirect(base_url("servicos-prontos"));
    
  } */
}
