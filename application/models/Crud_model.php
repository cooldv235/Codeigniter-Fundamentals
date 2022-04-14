<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

    // CREATE OF CRUD
    public function store($data){
        $this->db->insert('six_create_ci_insert',$data);
    }

    public function fetch_data(){
        $query = $this->db->get('six_create_ci_insert');
        return $query;
    }

    public function delete_record($id){
        $this->db->where('id',$id);
        $this->db->delete('six_create_ci_insert');
    }

    public function fetch_user($id){
        $this->db->where('id',$id);
        $query = $this->db->get('six_create_ci_insert');

        return $query;
    }

    public function update_user($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('six_create_ci_insert',$data);
        
    }
}