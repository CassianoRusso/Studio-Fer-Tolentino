<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = array(
            'pagina' => 'login',
            'login' => true
        );
        $this->load->view('layout/header', $data);
        $this->load->view('login/index');
        $this->load->view('layout/footer');

    }

    public function acesso(){

        $email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $remember = FALSE;

        if($this->ion_auth->login($email, $password, $remember)){
            redirect(base_url('home'));

        }else{

            $this->session->set_flashdata('error', 'E-mail ou Senha inválida.');
            redirect('login');
            
        }    

    }

    public function loguot(){
        $this->ion_auth->logout();
        redirect('login');
    }
}