<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public $userId = null;
    public $userName = null;
    public $userEmail = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('CRUDFunctions');
    }

    public function index() { // Felhasználók táblázata (főoldal)

        $this->load->library('table');
        $this->CRUDFunctions->getData('user');

        $template = [
            'table_open' => '<table id="userTable" class="table table-bordered table-striped">',
            'thead_open'            => '<thead>',
            'thead_close'           => '</thead>',

            'heading_row_start'     => '<tr>',
            'heading_row_end'       => '</tr>',
            'heading_cell_start'    => '<th>',
            'heading_cell_end'      => '</th>',

            'tbody_open'            => '<tbody>',
            'tbody_close'           => '</tbody>',

            'row_start'             => '<tr>',
            'row_end'               => '</tr>',
            'cell_start'            => '<td>',
            'cell_end'              => '</td>',       

            'table_close'           => '</table>'
        ];

        $this->table->set_template($template);
        $this->table->set_heading('Név', 'E-mail', 'Kezelés');

        $this->tableData = $this->CRUDFunctions->dataSet->result();

        if(count($this->tableData) > 0) {

            foreach($this->tableData as $row) {                             
                $this->table->add_row($row->userName, $row->userEmail, '<a href="' . base_url() . 'index.php/user/user/manageuser/' . $row->userId . '" class="btn btn-warning" role="button">Kezelés</a>');
            }
        }
        else {
            $tableData = false;
        }

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/user/user');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }
    }

    public function addUser() { // Felhasználó felvétele

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/user/adduser');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }        
    }

    public function saveUser() { // Felhasználó mentése
        
        if(isset($_POST['data'])) {

            $userData = json_decode($this->input->post('data'), true);
            $userPass = password_hash($userData['userPass'], PASSWORD_DEFAULT);
            $userData['userPass'] = $userPass;

            $this->CRUDFunctions->saveData('user', $userData);            
            echo(!empty($this->CRUDFunctions->ajaxResponse)) ? $this->CRUDFunctions->ajaxResponse : 'error';            
        }
    }

    public function manageUser($userId) { // Felhasználó kezelése

        $this->CRUDFunctions->getData('user', ['userId' => $userId], 1);

        foreach($this->CRUDFunctions->dataSet->result() as $user) {

            $this->userId = $user->userId;
            $this->userName = $user->userName;
            $this->userEmail = $user->userEmail;
        }

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/user/manageuser');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }
    }

    public function updateUser($userId) { // Felhasználó frissítése

        if(isset($_POST['data'])) {

            $validPass = false;
            $oldPass = $this->input->post('validPass');
            $userData = json_decode($this->input->post('data'), true);            
            $this->CRUDFunctions->getData('user', ['userId' => $userId], 1);

            foreach($this->CRUDFunctions->dataSet->result() as $user) {                 
                $validPass = password_verify($oldPass, $user->userPass);
            }

            if($validPass) {

                if(!empty($userData['userPass'])) {
                    $newPass = password_hash($userData['userPass'], PASSWORD_DEFAULT);
                    $userData['userPass'] = $newPass;
                }
                else {
                    $userData['userPass'] = password_hash($oldPass, PASSWORD_DEFAULT);
                }

                $this->CRUDFunctions->updateData('user', $userData, 'userId', $userId);
                echo(!empty($this->CRUDFunctions->ajaxResponse)) ? $this->CRUDFunctions->ajaxResponse : 'error';
            }
            else {
                echo 'error';
            }
        }
    }

    public function deleteUser($userId) { // Felhasználó törlése

        $validPass = false;
        $oldPass = $this->input->post('validPass');                    
        $this->CRUDFunctions->getData('user', ['userId' => $userId], 1);

        foreach($this->CRUDFunctions->dataSet->result() as $user) {                 
            $validPass = password_verify($oldPass, $user->userPass);
        }

        if($validPass) {            

            $this->CRUDFunctions->deleteData('user', ['userId' => $userId]);
            echo(!empty($this->CRUDFunctions->ajaxResponse)) ? $this->CRUDFunctions->ajaxResponse : 'error';
        }
        else {
            echo 'error';
        }
    }    
}