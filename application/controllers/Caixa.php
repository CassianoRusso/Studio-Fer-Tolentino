<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Caixa extends CI_Controller {
    
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
			$this->session->set_flashdata('info', 'Sua sessão expirou.');
			redirect('login');
		}
		
		$this->load->model("Caixa_model", "model");
    }

    public function index(){
        $data = array(
            'titulo' => 'Caixa - Histórico de registros',
            'pagina' => 'historico',
            'usuario' => $user = $this->ion_auth->user()->row(),
            'caixa' => $this->model->caixa('caixa'),
            'clientes' => $this->model->clientes('clientes'),
            'servicos' => $this->model->servicos('servicos'),
            'produtos' => $this->model->produtos('produtos'),
            'datatables' => true
        );

        $this->load->view('layout/header', $data);
        $this->load->view('caixa/historico');
        $this->load->view('layout/footer');
    }

    public function registrar(){
        date_default_timezone_set('America/Sao_Paulo');
        $data = array(
            'titulo' => 'Caixa - Registrar operação',
            'pagina' => 'registrar-caixa',
            'usuario' => $user = $this->ion_auth->user()->row(),
            'clientes' => $this->model->clientes('clientes', array('cliente_ativo' => 1)),
            'servicos' => $this->model->servicos('servicos', array('servico_ativo' => 1)),
            'produtos' => $this->model->produtos('produtos', array('produto_ativo' => 1)),
            'formulario' => true,
            'plugin_editor' => true
        );
        
        $this->form_validation->set_rules('caixa_valor', 'Por favor, informe o valor', 'required');

        if($this->form_validation->run()){

            $dados = array_map('trim', $_POST);
            
            if($dados["clientes_cliente_id"] == 0){
                unset($dados["clientes_cliente_id"]);
            }
            if($dados["servicos_servico_id"] == 0){
                unset($dados["servicos_servico_id"]);
            }
            if($dados["produtos_produto_id"] == 0){
                unset($dados["produtos_produto_id"]);
            }
            if($dados["caixa_status"] == 0){
                $dados["caixa_valor"] = '-'.$dados["caixa_valor"];
            }

            extract($dados);            
            
            if($this->model->cadastrar('caixa', $dados)){
                $this->session->set_flashdata('sucesso', 'Operação registrada no caixa!');
            }
            
            redirect(base_url('historico'));

        }else{
            $this->load->view('layout/header', $data);
            $this->load->view('caixa/registrar-caixa', $data);
            $this->load->view('layout/footer', $data);
        }
        
    }

    public function detalhes($caixa_id){

        $dados = $this->model->get_by_id('caixa', array('caixa_id' => $caixa_id));

        $data = array(
            'titulo' => 'Mais informações',
            'pagina' => 'historico',
            'usuario' => $user = $this->ion_auth->user()->row(),
            'caixa' => $this->model->get_by_id('caixa', array('caixa_id' => $caixa_id))
        );

        $this->load->view('layout/header', $data);
        $this->load->view('caixa/detalhes-caixa');
        $this->load->view('layout/footer');
    }



}