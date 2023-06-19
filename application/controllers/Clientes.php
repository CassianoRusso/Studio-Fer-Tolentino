<?php 

defined('BASEPATH') OR exit('Ação não permitida');

class Clientes extends CI_Controller {
    
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
            'titulo' => 'Lista dos Clientes',
            'pagina' => 'listar-clientes',
            'usuario' => $user = $this->ion_auth->user()->row(),
            'clientes' => $this->model->get_all('clientes'),
        
            'datatables' => true
        );

        $this->load->view('layout/header', $data);
        $this->load->view('clientes/listar-clientes', $data);
        $this->load->view('layout/footer', $data);
    }

    public function cadastrar(){
       
        $data = array(
            'titulo' => 'Cadastrar Cliente',
			'pagina' => 'cadastrar-cliente',
			'usuario' => $user = $this->ion_auth->user()->row(),
            'formulario' => true,
            'plugin_editor' => true
        );

        $this->form_validation->set_rules('cliente_nome', 'Insira nome e sobrenome.', 'min_length[5]|max_length[100]');
        $this->form_validation->set_rules('cliente_telefone', 'Telefone inválido!', 'min_length[14]|max_length[15]|callback_check_telefone');
        $this->form_validation->set_rules('cliente_aniversario', 'Insira uma data válida!', 'required');

        if($this->form_validation->run()){

            $dados = array_map('trim', $_POST);
            extract($dados);
            
            $dados["cliente_nome"] = ucwords($cliente_nome);
            
            if($this->model->cadastrar('clientes', $dados)){
                $this->session->set_flashdata('sucesso', 'Cliente cadastrado com sucesso!');
            }
            
            redirect(base_url('listar-clientes'));

        }else{
            $this->load->view('layout/header', $data);
            $this->load->view('clientes/cadastrar-cliente');
            $this->load->view('layout/footer');
        }
    }
    
    public function editar($cliente_id){
        $data = array(
            'titulo' => 'Editar cliente',
			'pagina' => 'editar-cliente',
			'usuario' => $user = $this->ion_auth->user()->row(),
            'cliente' => $this->model->get_by_id('clientes', array('cliente_id' => $cliente_id)),

            'formulario' => true,
            'plugin_editor' => true
        );

        $this->form_validation->set_rules('cliente_nome', 'Insira nome e sobrenome.', 'min_length[5]|max_length[100]');
        $this->form_validation->set_rules('cliente_telefone', 'Telefone inválido!', 'min_length[14]|max_length[15]|callback_check_telefone');
        $this->form_validation->set_rules('cliente_aniversario', 'Insira uma data válida!', 'required');

        if($this->form_validation->run()){

            $dados = array_map('trim', $_POST);
            extract($dados);
            
            $dados["cliente_nome"] = ucwords($cliente_nome);
            
            
            if($this->model->editar('clientes', $dados, array('cliente_id' => $cliente_id))){
                $this->session->set_flashdata('sucesso', 'Os dados do cliente foram atualizados com sucesso!');
            }
            
            redirect(base_url('listar-clientes'));

        }else{
            $this->load->view('layout/header', $data);
            $this->load->view('clientes/editar-cliente');
            $this->load->view('layout/footer');
        }
    }
    
    public function deletar($cliente_id){

        if($this->model->delete('clientes', array('cliente_id' => $cliente_id))){
            $this->session->set_flashdata('sucesso', 'Cliente excluído com sucesso!');
        }

        redirect(base_url('listar-clientes'));

    }
    
    public function check_telefone($cliente_telefone){

        $cliente_id = $this->input->post('cliente_id');
    
        if($this->model->get_by_id('clientes', array('cliente_telefone' => $cliente_telefone, 'cliente_id !=' => $cliente_id))){
            $this->form_validation->set_message('check_telefone', 'Esse telefone já está cadastrado!');
            return false;
        }else{
            return true;
        }
    }
}