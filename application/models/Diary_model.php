<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diary_model extends CI_Model {

    private $table_name = "diary";
    private $quartal = [
        "Q1" => [
            "start" => "01",
            "finish" => "03",
        ],
        "Q2" => [
            "start" => "04",
            "finish" => "06",
        ],
        "Q3" => [
            "start" => "07",
            "finish" => "09",
        ],
        "Q4" => [
            "start" => "10",
            "finish" => "12",
        ]
    ];

    public $record = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function select_all($user_id){
        $this->db->select('*');
        $query = $this->db->get_where($this->table_name, array('user_id' => $user_id));
        return $query->result();
    }

    public function select_by_quartal($user_id, $year, $quartal){
        $start_date = date("Y-m-01", strtotime($year."-".$this->quartal[$quartal]["start"]."-01"));
        $finish_date = date("Y-m-t", strtotime($year."-".$this->quartal[$quartal]["finish"]."-01"));

        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->where('diary_date >=', $start_date);
        $this->db->where('diary_date <=', $finish_date);
        $query = $this->db->get_where($this->table_name);
        return $query->result();
    }

    public function create(){
        $this->record["created_at"] = date("Y-m-d h-i-s");
        $this->db->insert($this->table_name, $this->record);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function update($user_id, $diary_date){
        $this->record["updated_at"] = date("Y-m-d h-i-s");
        $this->db->update($this->table_name, $this->record, array('user_id' => $user_id, 'diary_date' => $diary_date));
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function is_exists_date($user_id, $diary_date){
        $this->db->select('*');
        $query = $this->db->get_where($this->table_name, array('user_id' => $user_id, 'diary_date' => $diary_date));
        if($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}
