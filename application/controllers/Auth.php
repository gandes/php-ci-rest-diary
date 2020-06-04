<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
        $this->load->model('user');
    }
    
    public function register(){
        if(!username_validate_length($_POST["username"])){
            echo json_encode(response_error(203, "Maaf, username harus memiliki panjang 6-32 karakter"));
        } else if(!username_validate_upper($_POST["username"])) {
            echo json_encode(response_error(203, "Maaf, username setidaknya memiliki 1 huruf besar"));
        } else if(!username_validate_lower($_POST["username"])) {
            echo json_encode(response_error(203, "Maaf, username setidaknya memiliki 1 huruf kecil"));
        } else if(!username_validate_number($_POST["username"])) {
            echo json_encode(response_error(203, "Maaf, username setidaknya memiliki 1 angka"));
        } else if(!username_validate_special($_POST["username"])) {
            echo json_encode(response_error(203, "Maaf, username setidaknya memiliki 1 spesial karakter"));
        } else {
            $this->user->record = [
                "username" => $_POST["username"],
                "email" => $_POST["email"],
                "password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
                "fullname" => $_POST["fullname"],
                "birthday" => $_POST["birthday"],
            ];
            if($this->user->create()){
                echo json_encode(response_success("Selamat, akun anda berhasil didaftarkan."));
            } else {
                echo json_encode(response_error(203, "Maaf, akun yang anda buat tidak berhasil terdaftar"));
            }
        }
    }

    public function login(){
        $result = $this->user->check_account($_POST["username_or_email"]);
        if(!$result){
            echo json_encode(response_error(203, "Maaf, coba periksa kembali username atau email"));
        } else {
            if (password_verify($_POST["password"], $result[0]->password)){
                $data = [
                    "token" => $this->user->generate_token($result[0]->user_id)
                ];
                echo json_encode(response_success("Selamat, akun anda berhasil didaftarkan.", $data));
            } else {
                echo json_encode(response_error(203, "Maaf, password yang anda masukan tidak sesuai dengan username dan email"));
            }
        }
    }
}
