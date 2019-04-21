<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller { 

    public function index() { // Admin kezdőoldal
        
        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/adminHome');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }
    }
}