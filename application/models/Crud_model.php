<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    // CREATE OF CRUD
    public function store($data){
        $this->db->insert('six_create_ci_insert',$data);
    }
}