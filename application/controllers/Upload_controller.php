<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            
    }

    public function index()
    {
        $data['title'] = "Upload Image using AJAX in Codeigniter";

        $this->load->view("crud/templates/header");
        $this->load->view("upload/index",$data);
        $this->load->view("crud/templates/footer");
    }

    public function ajax_image_upload()
    {
        if(isset($_FILES["image_file"]["name"])){
            $config['upload_path'] = './uploads/images';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // CODEIGNITER UPLOAD LIBRARY
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('image_file')){
                echo $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
                echo '<img src="' . base_url() . 'uploads/images/' . $data["file_name"] . '" />';
            }
        }
    }

}