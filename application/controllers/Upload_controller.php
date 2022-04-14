<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();

            // LOAD MODEL
            $this->load->model('Upload_model','UM');
            
    }

    public function index()
    {
        $data['title'] = "Upload Image using AJAX in Codeigniter";
        $data['image_data'] = $this->UM->fetch_images();

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

                // COMPRESS IMAGE FILE
                $config['image_library'] = 'gd2';
                $config['source_image'] = './uploads/images/' . $data["file_name"];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = '60%';
                $config['width'] = 200;
                $config['hieght'] = 200;
                $config['new_image'] = './uploads/images/' . $data['file_name'];

                $this->load->library('image_lib',$config);
                $this->image_lib->resize();

                $image_data = [
                    'name' => $data['file_name'],
                ];
                // UPLOAD DATA TO DB
                $this->UM->insert_image($image_data);

                echo $this->UM->fetch_images();

                echo '<img src="' . base_url() . 'uploads/images/' . $data["file_name"] . '" />';
            }
        }
    }

}