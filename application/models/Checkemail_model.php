<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkemail_model extends CI_Model {
    
    public function is_email_available($email)
    {
        $this->db->where('email',$email);
        $query = $this->db->get('nine_email_checker_table');

        if($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}