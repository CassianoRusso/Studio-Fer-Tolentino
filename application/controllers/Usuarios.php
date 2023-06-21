<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller{

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
            'titulo' => 'Usuários',
            'pagina' => 'usuarios',
            'usuarios' => $this->ion_auth->users()->result(),
            'datatables' => true
        );

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function cadastrar(){
        $data = array(
            'titulo' => 'Cadastrar Usuário',
            'pagina' => 'usuarios',
            'formulario' => true
        );

        $this->form_validation->set_rules('email', 'e-mail', 'valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'usuário', 'is_unique[users.username]');
        $this->form_validation->set_rules('password', 'senha', 'min_length[6]');
        $this->form_validation->set_rules('confirma', '', 'matches[password]');

        if($this->form_validation->run()){

            $dados = array_map('trim', $_POST);
            extract($dados);

            $additional_data = array(
                'first_name' => $dados["first_name"],
                'last_name' => $dados["last_name"],
                'username' => $dados["username"],
                'active' => $dados["active"]
            );
            $group = array(
                'group_id' => 1
            );

            $email = $this->security->xss_clean($dados["email"]);
            $username = $this->security->xss_clean($dados["username"]);
            $password = $this->security->xss_clean($dados["password"]);

            $additional_data = $this->security->xss_clean($additional_data);

            
            if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
                $this->session->set_flashdata('sucesso', 'Usuário cadastrado com sucesso.');
            }else{ 
                $this->session->set_flashdata('erro', 'Erro ao tentar cadastrar usuário.');
            }

            redirect(base_url('usuarios'));

        }else{

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/cadastrar', $data);
            $this->load->view('layout/footer', $data);
        }


    }

    public function editar($usuario_id = null){
        
        if(!$usuario_id || !$this->ion_auth->user($usuario_id)->row()){
            

            $this->session->set_flashdata('erro', 'Usuário não encontrado.');
            redirect('usuarios');


        }else{

            $this->form_validation->set_rules('email', 'e-mail', 'valid_email|callback_email_check');
            $this->form_validation->set_rules('username', 'usuário', 'callback_username_check');
            $this->form_validation->set_rules('password', 'senha', 'min_length[6]');
            $this->form_validation->set_rules('confirma', '', 'matches[password]');


            if($this->form_validation->run()){

                $dados = array_map('trim', $_POST);

                extract($dados);

                if(! $dados["password"] ){
                    unset($dados["password"]);
                }

                if($this->ion_auth->update($usuario_id, $dados)){

                    $perfil_db = $this->ion_auth->get_users_groups($usuario_id)->row();
                    $perfil = $this->input->post('perfil');

                    if($perfil != $perfil_db->id){
                        $this->ion_auth->remove_from_group($perfil_db->id, $usuario_id);

                        $this->ion_auth->add_to_group($perfil, $usuario_id);
                    }

                    $this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');

                }else{

                    $this->session->set_flashdata('erro', 'Erro ao tentar atualizar os dados!');

                }

                redirect('usuarios');
                

            }else{
                $data = array(
                    'titulo' => 'Editar Usuário',
                    'pagina' => 'usuarios',
                    'usuario' => $this->ion_auth->user($usuario_id)->row(),
                    'perfil' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                    'formulario' => true
                );
    
                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/editar', $data);
                $this->load->view('layout/footer', $data);
            }
            
        }        
        
    }

    public function deletar($usuario_id){
        
        if(!$usuario_id || !$this->ion_auth->user($usuario_id)->row()){
            $this->session->set_flashdata('erro', 'Usuário não existe.');
            redirect(base_url('usuarios'));

        }
        if($this->ion_auth->is_admin($usuario_id)){
            $this->session->set_flashdata('erro', 'O Administrador não pode ser excluido.');
            redirect(base_url('usuarios'));

        }

        if($this->ion_auth->delete_user($usuario_id)){
            $this->session->set_flashdata('sucesso', 'Usuário excluido com sucesso.');
            redirect(base_url('usuarios'));
        }else{
            $this->session->set_flashdata('erro', 'Erro ao tentar deletar usuário.');
            redirect(base_url('usuarios'));
        }
    }

    public function email_check($email){

        $usuario_id = $this->input->post('id');

        if($this->model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))){
            
            $this->form_validation->set_message('email_check', 'Esse e-mail já existe.');
            return false;
        
        }else{

            return true;
        
        }
    }

    public function username_check($username){
        $usuario_id = $this->input->post('id');

        if($this->model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))){
            
            $this->form_validation->set_message('username_check', 'Esse usuário já existe.');
            return false;
        
        }else{

            return true;
        
        }
    }
}