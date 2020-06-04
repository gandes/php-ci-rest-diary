<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diary extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('validation_helper');
        $this->load->helper('response_helper');
        $this->load->model('diary_model');
        $this->load->model('user');
    }
    
    public function create(){
        if(empty($_POST['token'])){
            echo json_encode(response_error(203, "Maaf, token diperlukan untuk melakukan permintaan ini"));
        } else {
            if($this->user->is_valid_token($_POST["user_id"], $_POST["token"])){
                $this->diary_model->record = [
                    "user_id" => $_POST["user_id"],
                    "diary" => $_POST["diary"],
                    "diary_date" => $_POST["diary_date"]
                ];
                if($this->diary_model->is_exists_date($_POST["user_id"], $_POST["diary_date"])){
                    $result = $this->diary_model->update($_POST["user_id"], $_POST["diary_date"]);
                    $message = "Selamat, diari berhasil diperbarui berdasarkan tanggal ".$_POST["diary_date"];
                } else {
                    $result = $this->diary_model->create();
                    $message = "Selamat, diari berhasil dibuat";
                }
                if($result){
                    echo json_encode(response_success($message, $this->diary_model->record));
                } else {
                    echo json_encode(response_success(203, "Maaf, pembuatan diari tidak berhasil"));
                }
            } else {
                echo json_encode(response_error(203, "Maaf, token yang anda masukan tidak valid"));
            }
        }
    }

    public function get_all(){
        if(empty($_POST['token'])){
            echo json_encode(response_error(203, "Maaf, token diperlukan untuk melakukan permintaan ini"));
        } else {
            if($this->user->is_valid_token($_POST["user_id"], $_POST["token"])){
                $result = $this->diary_model->select_all($_POST["user_id"]);
                if(count($result) > 0){
                    $message = "Data diary berhasil didapatkan";
                } else {
                    $message = "Data diary anda kosong";
                }
                echo json_encode(response_success($message, $result));
            } else {
                echo json_encode(response_error(203, "Maaf, token yang anda masukan tidak valid"));
            }
        }
    }

    public function get_by_quartal(){
        if(empty($_POST['token'])){
            echo json_encode(response_error(203, "Maaf, token diperlukan untuk melakukan permintaan ini"));
        } else {
            if($this->user->is_valid_token($_POST["user_id"], $_POST["token"])){
                $result = $this->diary_model->select_by_quartal($_POST["user_id"], $_POST["year"], $_POST["quartal"]);
                if(count($result) > 0){
                    $message = "Data diary berhasil didapatkan";
                } else {
                    $message = "Data diary anda kosong";
                }
                echo json_encode(response_success($message, $result));
            } else {
                echo json_encode(response_error(203, "Maaf, token yang anda masukan tidak valid"));
            }
        }
    }
}
