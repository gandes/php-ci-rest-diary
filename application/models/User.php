<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    private $table_name = "user";

    public $record = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create(){
        $this->record["join_date"] = date("Y-m-d h-i-s");
        $this->db->insert($this->table_name, $this->record);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function generate_token($user_id){
        $this->record["last_login"] = date("Y-m-d h-i-s");
        $this->record["token"] = password_hash($this->record["last_login"], PASSWORD_BCRYPT);
        $this->db->update($this->table_name, $this->record, array('user_id' => $user_id));
        return $this->record["token"];
    }

    public function check_account($username_or_email){
        $this->db->select('*');
        $query = $this->db->get_where($this->table_name, array('username' => $username_or_email));
        if($query->num_rows() > 0){
            return $query->result();
        } else {
            $this->db->select('*');
            $query = $this->db->get_where($this->table_name, array('email' => $username_or_email));
            if($query->num_rows() > 0){
                return $query->result();
            } else {
                return false;
            }
        }
    }

    public function is_valid_token($user_id, $token){
        $this->db->select('*');
        $query = $this->db->get_where($this->table_name, array('user_id' => $user_id, 'token' => $token));
        if($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}
