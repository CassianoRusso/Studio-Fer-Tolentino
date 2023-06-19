<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Produtos extends CI_Controller{

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
      'titulo' => 'Lista dos Produtos',
      'pagina' => 'listar-produtos',
      'usuario' => $user = $this->ion_auth->user()->row(),
      'produtos' => $this->model->get_all('produtos'),
      'datatables' => true
    );

    $this->load->view('layout/header', $data);
    $this->load->view('produtos/listar-produtos', $data);
    $this->load->view('layout/footer', $data);

  }

  public function cadastrar(){
    $data = array(
      'titulo' => 'Cadastrar produto',
      'pagina' => 'cadastrar-produto',
      'usuario' => $user = $this->ion_auth->user()->row(),
      'formulario' => true,
      'plugin_editor' => true
    );

    $this->form_validation->set_rules('produto_nome', 'Informe um nome para o produto.', 'required');
    $this->form_validation->set_rules('produto_valor', 'Por favor, insira o valor do produto.', 'min_length[3]');

    if($this->form_validation->run()){
      $dados = array_map('trim', $_POST);

      extract($dados);
      
      $dados["produto_nome"] = ucfirst($produto_nome);
      $dados["produto_descricao"] = ucfirst($produto_descricao);
      
      if($this->model->cadastrar('produtos', $dados)){
        $this->session->set_flashdata('sucesso', 'Produto cadastrado com sucesso!');
      }
      
      redirect(base_url('listar-produtos'));

    }else{
      $this->load->view('layout/header', $data);
      $this->load->view('produtos/cadastrar-produto');
      $this->load->view('layout/footer');
    }

  }

  public function editar($produto_id){
    $data = array(
      'titulo' => 'Editar produto',
      'pagina' => 'editar-produto',
      'usuario' => $user = $this->ion_auth->user()->row(),
      'produtos' => $this->model->get_by_id('produtos', array('produto_id' => $produto_id)),
      'formulario' => true,
      'plugin_editor' => true
    );
    
    $this->form_validation->set_rules('produto_nome', 'Informe um nome para o produto.', 'required');
    $this->form_validation->set_rules('produto_valor', 'Por favor, insira o valor do produto.', 'min_length[3]');

    if($this->form_validation->run()){

      $dados = array_map('trim', $_POST);

      extract($dados);
      
      $dados["produto_nome"] = ucfirst($produto_nome);
      $dados["produto_descricao"] = ucfirst($produto_descricao);
      
      if($this->model->editar('produtos', $dados, array('produto_id' => $produto_id))){
        $this->session->set_flashdata('sucesso', 'Produto atualizado com sucesso!');
      }
      
      redirect(base_url("listar-produtos"));

    }else{
      $this->load->view('layout/header', $data);
      $this->load->view('produtos/editar-produto');
      $this->load->view('layout/footer');
    }
  }

  public function deletar($produto_id){

    if($this->model->delete('produtos', array('produto_id' => $produto_id))){
      $this->session->set_flashdata('sucesso', 'Produto excluído com sucesso!');
    }

    redirect(base_url('listar-produtos'));

  }
}
