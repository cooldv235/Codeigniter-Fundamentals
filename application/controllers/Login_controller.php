<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Login_model','login');
            $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Login using Codeigniter Session";

        $this->load->view("crud/templates/header");
        $this->load->view("login/login",$data);
        $this->load->view("crud/templates/footer");
    }

    public function login_validation()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()){
            // TRUE
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // CHECK DETAILS FOR LOGIN FROM MODEL
            if($this->login->can_login($username,$password)){
                $session_data = [
                    'username' => $username,
                ];

                // SET SESSION VARIABLES
                $this->session->set_userdata($session_data);

                // REDIRECT
                redirect(base_url() . 'login_controller/dashboard');
            } else {

                // SESSION FLASHDATA EXAMPLE
                $this->session->set_flashdata('error','Invalid username or password.');

                redirect(base_url() . 'login_controller/index');
            }

        } else {
            // FALSE
            $this->index();
        }
        
    }

    public function dashboard()
    {
        if($this->session->userdata('username') != ''){
            $data['title'] = "Welcome to Dashboard " . $this->session->userdata('username');

            $this->load->view("crud/templates/header");
            $this->load->view("login/dashboard",$data);
            $this->load->view("crud/templates/footer");
        } else {
            redirect(base_url() . 'login_controller/index');
        }
    }

    // LOGOUT FUNCTION
    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect(base_url() . 'login_controller/index');
    }
}