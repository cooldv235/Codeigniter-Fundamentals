<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    // SAVE IMAGES FILE NAMES IN DATABASE
    public function insert_image($data)
    {
        $this->db->insert('eight_images_table',$data);
    }

    // GET ALL IMAGES FROM DB TO DISPLAY ON VIEW
    public function fetch_images()
    {
        $output = '';
        $this->db->select("name");
        $this->db->from("eight_images_table");
        $this->db->order_by("id","DESC");

        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $output .= '
                <div class="col-md-3">
                    <img src="' . base_url() . 'uploads/images/' . $row->name . '" class="img-responsive img-thumbnail" />
                </div>
            ';
        }

        return $output;
    }
}