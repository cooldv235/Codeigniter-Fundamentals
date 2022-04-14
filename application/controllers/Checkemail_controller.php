<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkemail_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Checkemail_model');
    }

    public function index()
    {
        $data['title'] = 'Check email using AJAX in Codeigniter Framework';

        $this->load->view("crud/templates/header");
        $this->load->view("emailcheck/index",$data);
        $this->load->view("crud/templates/footer");
    }

    public function check_email_availability()
    {
        $email = $_POST["email"];

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo '<label class="text-danger">Invalid Email</label>';
        } else {
            
            if($this->Checkemail_model->is_email_available($email)){
                echo '<label class="text-danger">Email already registered</label>';
            } else {
                echo '<label class="text-success">Email is available</label>';
            }
        }
    }
}