<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Agendas extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info', 'Sua sessão expirou.');
            redirect('login');
        }

        $this->load->model("Agendas_model", "model");
    }

    public function index(){
        $data = array(
            'titulo' => 'Lista de Agendamentos',
            'pagina' => 'agendas',
            'usuario' => $user = $this->ion_auth->user()->row(),
            'agendas' => $this->model->agenda('agenda'),
            'servicos' => $this->model->servicos('servicos', array('servico_ativo' => 1)),
            'clientes' => $this->model->clientes('clientes', array('cliente_ativo' => 1)),
            'datatables' => true,
            'plugin_calendar' => true
        );

        $this->load->view('layout/header', $data);
        $this->load->view('agendas/listar-agendas', $data);
        $this->load->view('layout/footer', $data);

    }

    public function cadastrar(){
        date_default_timezone_set('America/Sao_Paulo');

        $data = array(
            'titulo' => 'Cadastrar na agenda',
            'pagina' => 'agendas',
            'usuario' => $user = $this->ion_auth->user()->row(),
            'servicos' => $this->model->servicos('servicos', array('servico_ativo' => 1)),
            'clientes' => $this->model->clientes('clientes', array('cliente_ativo' => 1)),
            'formulario' => true,
            'plugin_editor' => true
        );

        $this->form_validation->set_rules('agenda_assunto', 'Por favor, insira um assunto.', 'required');
        $this->form_validation->set_rules('agenda_data', 'Por favor, insira uma data.', 'required|callback_date_check');
        $this->form_validation->set_rules('agenda_horario_inicial', 'Por favor, informe o horário inicial.', 'required');
        $this->form_validation->set_rules('agenda_horario_final', 'Por favor, informe o horário final.', 'required');

        if($this->form_validation->run()){

            $dados = array_map('trim', $_POST);

            if($dados["clientes_cliente_id"] == 0){
                unset($dados["clientes_cliente_id"]);
            }
            if($dados["servicos_servico_id"] == 0){
                unset($dados["servicos_servico_id"]);
            }

            extract($dados);
            
            if($this->model->cadastrar('agenda', $dados)){
                $this->session->set_flashdata('sucesso', 'Horário agendado com sucesso!');
                
                if($dados["agenda_status_pagamento"] == 1){
                    $agenda_id = $this->model->agenda_cadastrada('agenda');
                    $this->registrar_caixa($agenda_id->agenda_id);
                }
                
            }
            
            redirect(base_url('listar-agendas'));

        }else{
            $this->load->view('layout/header', $data);
            $this->load->view('agendas/cadastrar-agenda');
            $this->load->view('layout/footer');
        }

    }

    public function editar($agenda_id){
        date_default_timezone_set('America/Sao_Paulo');

        $data = array(
            'titulo' => 'Editar agenda',
            'pagina' => 'agendas',
            'usuario' => $user = $this->ion_auth->user()->row(),
            'agendas' => $this->model->get_by_id('agenda', array('agenda_id' => $agenda_id)),
            'servicos' => $this->model->servicos('servicos', array('servico_ativo' => 1)),
            'clientes' => $this->model->clientes('clientes', array('cliente_ativo' => 1)),
            'formulario' => true,
            'plugin_editor' => true
        );

        $this->form_validation->set_rules('agenda_assunto', 'Por favor, insira um assunto.', 'required');
        $this->form_validation->set_rules('agenda_data', 'Por favor, insira uma data.', 'required|callback_date_check');
        $this->form_validation->set_rules('agenda_horario_inicial', 'Por favor, informe o horário inicial.', 'required');
        $this->form_validation->set_rules('agenda_horario_final', 'Por favor, informe o horário final.', 'required');

        if($this->form_validation->run()){
            $dados = array_map('trim', $_POST);

            if($dados["clientes_cliente_id"] == 0){
                unset($dados["clientes_cliente_id"]);
            }
            if($dados["servicos_servico_id"] == 0){
                unset($dados["servicos_servico_id"]);
            }

            extract($dados);
            
            $dados["agenda_descricao"] = ucfirst($agenda_descricao);
            
            if($this->model->editar('agenda', $dados, array('agenda_id' => $agenda_id))){
                $this->session->set_flashdata('sucesso', 'Agenda atualizada com sucesso!');

                if($dados["agenda_status_pagamento"] == 1){
                    $this->registrar_caixa($agenda_id);
                }
            }
            
            redirect(base_url("listar-agendas"));

        }else{
            $this->load->view('layout/header', $data);
            $this->load->view('agendas/editar-agenda');
            $this->load->view('layout/footer');
        }
    }

    public function deletar($agenda_id){

        if($this->model->deletar('agenda', array('agenda_id' => $agenda_id))){
            $this->session->set_flashdata('sucesso', 'agenda excluído com sucesso!');
        }

        redirect(base_url('listar-agendas'));

    }

    public function detalhes($agenda_id){

        $dados = $this->model->get_by_id('agenda', array('agenda_id' => $agenda_id));
        $servico = $dados->servicos_servico_id;
        $cliente = $dados->clientes_cliente_id;

        $data = array(
            'titulo' => 'Detalhes do agendamento',
            'pagina' => 'agendas',
            'usuario' => $user = $this->ion_auth->user()->row(),
            'agenda' => $this->model->get_by_id('agenda', array('agenda_id' => $agenda_id)),
            'servico' => $this->model->get_by_id('servicos', array('servico_id' => $servico)),
            'cliente' => $this->model->get_by_id('clientes', array('cliente_id' => $cliente)),
            'formulario' => true,
            'plugin_editor' => true
        );
        $dados_agenda = $this->model->get_by_id('agenda', array('agenda_id' => $agenda_id));

        if(empty($dados_agenda->agenda_notificacao)){ 

            $dados_agenda->agenda_notificacao = 1;
            $this->model->editar_notificacao($dados_agenda);

        } else {

            date_default_timezone_set('America/Sao_Paulo');
            $hora_atual = date('H:i');
            
            if($dados_agenda->agenda_horario_inicial >= $hora_atual){
                $tempo = gmdate('H:i', strtotime( $dados_agenda->agenda_horario_inicial ) - strtotime( $hora_atual ) );
                if($tempo <= '00:15'){
                    $dados_agenda->agenda_notificacao = 3;
                    $this->model->editar_notificacao($dados_agenda);

                } elseif($tempo <= '00:30'){
                    $dados_agenda->agenda_notificacao = 2;
                    $this->model->editar_notificacao($dados_agenda);

                }
                
            }else{
                $dados_agenda->agenda_notificacao = 3;
                $this->model->editar_notificacao($dados_agenda);
            }
        } 

        $this->load->view('layout/header', $data);
        $this->load->view('agendas/detalhes-agenda');
        $this->load->view('layout/footer');
    }

    public function finalizar($agenda_id){
        date_default_timezone_set('America/Sao_Paulo');

        $dados_agenda = $this->model->get_by_id('agenda', array('agenda_id' => $agenda_id));
        $dados_servico = $this->model->get_by_id('servicos',array('servico_id' => $dados_agenda->servicos_servico_id));
        
        if($dados_agenda->agenda_status_pagamento == 0){
            $caixa_valor = $dados_servico->servico_valor;
            $caixa_data = date('Y-m-d H:i');
            $caixa_status = 1;
            $servicos_servico_id = $dados_agenda->servicos_servico_id;
            $clientes_cliente_id = $dados_agenda->clientes_cliente_id;
            
            $dados = array(
                'caixa_valor' => $caixa_valor,
                'caixa_data' => $caixa_data,
                'caixa_status' => $caixa_status,
                'servicos_servico_id' => $servicos_servico_id,
                'clientes_cliente_id' => $clientes_cliente_id
            );    
        }

        if(isset($dados)){
            if($this->model->cadastrar('caixa', $dados)){
                $this->model->finalizar_servico($agenda_id);
                $this->session->set_flashdata('sucesso', 'Serviço finalizado e valor registrado no caixa!');
            }
        }else{
            $this->model->finalizar_servico($agenda_id);
            $this->session->set_flashdata('sucesso', 'Serviço finalizado!');
        }
        
        redirect(base_url('listar-agendas'));
        
    }

    public function registrar_caixa($agenda_id){
        date_default_timezone_set('America/Sao_Paulo');

        $dados_agenda = $this->model->get_by_id('agenda', array('agenda_id' => $agenda_id));        
        $dados_servico = $this->model->get_by_id('servicos',array('servico_id' => $dados_agenda->servicos_servico_id));
        
        $caixa_valor = $dados_servico->servico_valor;
        $caixa_data = date('Y-m-d H:i');
        $caixa_status = 1;
        $servicos_servico_id = $dados_agenda->servicos_servico_id;
        $clientes_cliente_id = $dados_agenda->clientes_cliente_id;
        
        $dados = array(
            'caixa_valor' => $caixa_valor,
            'caixa_data' => $caixa_data,
            'caixa_status' => $caixa_status,
            'servicos_servico_id' => $servicos_servico_id,
            'clientes_cliente_id' => $clientes_cliente_id
        );    
        
        if($this->model->cadastrar('caixa', $dados)){
            return true;
        }
        
    }

    public function date_check($agenda_data){
        if(strtotime($agenda_data) < strtotime(date('Y-m-d'))){
            $this->form_validation->set_message('date_check', 'A data não pode ser menor que a data atual.');
            return false;
        }else{
            return true;
        }
    }

    public function notificacoes(){
        $data = array(
            'notificacoes' => $this->model->notificacoes('agenda')
        );

        $this->load->view('agendas/listar-notificacoes', $data);
    }

    

}
