<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_controller extends CI_Controller {
    public function index(){
        $this->load->model('Crud_model','crud');

        $data['title'] = "Create of CRUD";
        $data['users'] = $this->crud->fetch_data();

        $this->load->view("crud/templates/header");
        $this->load->view("crud/create",$data);
        $this->load->view("crud/templates/footer");

    }

    public function store(){

        // FORM VALIDATION
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name','First Name','required|alpha');
        $this->form_validation->set_rules('last_name','Last Name','required|alpha');

        if($this->form_validation->run()){
            $this->load->model('Crud_model','crud');
            
            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
            ];

            $this->crud->store($data);

            redirect(base_url() . "crud_controller/inserted");
        } else {
            $this->index();
        }
    }

    public function inserted()
    {
        $this->index();
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model('Crud_model','crud');
        $this->crud->delete_record($id);
        redirect(base_url() . "crud_controller/deleted");
    }

    public function deleted()
    {
        $this->index();
    }
}