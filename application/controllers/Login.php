<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {    

    public function index() { // Bejelentkező oldal

        $this->load->view('pages/login');
    }

    public function validateUser() { // Beléptetés

        if(isset($_POST['data'])) {            
            $this->load->model('CRUDFunctions');
            $loginData = json_decode($this->input->post('data'), true);
            $validPass = false;
            
            $this->CRUDFunctions->getData('user', ['userEmail' => $loginData['userEmail']], 1);
            $userData = $this->CRUDFunctions->dataSet->result();

            if(count($userData) > 0) {
                
                foreach($userData as $user) {
                    $validPass = password_verify($loginData['userPass'], $user->userPass);

                    if($validPass) {
                        $this->session->set_userdata('userId', $user->userId);
                        echo 'success';                        
                    }
                }
            }
            else {
                echo 'error';
            }                                    
        }
    }

    public function logout() { // Kilépés

        if($this->session->userdata('userId')) {

            $this->session->unset_userdata('userId');
            $this->session->sess_destroy();

            header('Location: ' . base_url());
        }
    }
}