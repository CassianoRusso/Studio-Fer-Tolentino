<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->ion_auth->logged_in()){
			redirect('login');
		}
		
		$this->load->model("Core_model", "model");
	}

	public function index(){
		

		$data = array(
			'titulo' => 'Painel',
			'pagina' => 'painel',
			'usuario' => $user = $this->ion_auth->user()->row(),
			'servicos' => $this->model->get_all('servicos'),
			'clientes' => $this->model->get_all('clientes'),
			'caixa_dia_servico' => $this->model->diaria_servico('caixa'),
			'caixa_mes_servico' => $this->model->mensal_servico('caixa'),
			'caixa_dia_produto' => $this->model->diaria_produto('caixa'),
			'caixa_mes_produto' => $this->model->mensal_produto('caixa'),
			'rendimento' => $this->model->renda('caixa'),
			'chart' => true
		);	
		

		$this->load->view('layout/header', $data);
		$this->load->view('home/index');
		$this->load->view('layout/footer');

	}
}
