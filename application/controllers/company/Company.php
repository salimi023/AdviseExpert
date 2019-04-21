<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

    public $catData = [];
    public $tableData = [];
    public $companyData = [];
    public $contactData = [];
    public $searchResult = [];
    public $category = null;
    public $status = null;
    public $compId = null;
    public $compName = null;
    public $compEmail = null;
    public $compAddress = null;
    public $compDate = null;
    public $compCatId = null;
    public $compStat = null;        

    public function __construct() {

        parent::__construct();
        $this->load->model('CRUDFunctions');
    }

    public function index() { // Cégek táblázata (főoldal)
        
        $this->load->library('table');
        $this->CRUDFunctions->getData('company');

        $template = [
            'table_open' => '<table id="compTable" class="table table-bordered table-striped">',
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
        $this->table->set_heading('Név', 'E-mail', 'Cím', 'Kategória', 'Státusz', 'Felvétel időpontja', 'Kezelés');

        $this->tableData = $this->CRUDFunctions->dataSet->result();

        if(count($this->tableData) > 0) {

            foreach($this->tableData as $row) {             
                self::getCompanyCatStat($row->compCat, $row->compStat);
                $this->table->add_row('<a href="' . base_url() . 'index.php/company/company/profilecompany/' . $row->compId . '">' . $row->compName . '</a>', $row->compEmail, $row->compAddress, $this->category, $this->status, $row->compDate, '<a href="' . base_url() . 'index.php/company/company/managecompany/' . $row->compId . '" class="btn btn-warning" role="button">Kezelés</a>');
            }
        }
        else {
            $tableData = false;
        }

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/company/company');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location:' . base_url());
        }
    }

    public function createCompany() { // Cég felvétele

        // Aktív kategóriák lekérdezése
        $this->CRUDFunctions->getData('category', ['catStat' => 1]);
        $this->catData = $this->CRUDFunctions->dataSet->result();

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/company/createcompany');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location:' . base_url());
        }
    }

    public function saveCompany() { // Cég mentése

        if(isset($_POST['data'])) {

            $companyData = json_decode($this->input->post('data'), true);
            $contact = $this->input->post('contact');            
                       
            $this->CRUDFunctions->saveData('company', $companyData); // Cégadatok mentése
            $this->CRUDFunctions->getData('company', ['compEmail' => $companyData['compEmail']], 1);

            foreach($this->CRUDFunctions->dataSet->result() as $row) { // Kapcsolattartók mentése               
                $compId = $row->compId;             
                
                foreach($contact as $contactName) {
                    $data = [
                        'compId' => $compId,
                        'contName' => $contactName
                    ];                 

                    $this->CRUDFunctions->saveData('contact', $data);                                                            
                }
            }
            echo(!empty($this->CRUDFunctions->ajaxResponse)) ? $this->CRUDFunctions->ajaxResponse : 'error';                     
        }
        else {
            echo 'error';
        }
    }

    public function manageCompany($compId) { // Cég kezelése

        // Aktív kategóriák lekérdezése
        $this->CRUDFunctions->getData('category', ['catStat' => 1]);
        $this->catData = $this->CRUDFunctions->dataSet->result();

        // Cégadatok lekérdezése
        $this->CRUDFunctions->getData('company', ['compId' => $compId], 1);
        $this->companyData = $this->CRUDFunctions->dataSet->result();        
        
        foreach($this->companyData as $data) {
            $this->compId = $data->compId;
            $this->compName = $data->compName;
            $this->compEmail = $data->compEmail;
            $this->compAddress = $data->compAddress;
            $this->compDate = $data->compDate;
            $this->compCatId = $data->compCat;
            $this->compStat = $data->compStat;             
        }

        // Kontaktok lekérdezése
        $this->CRUDFunctions->getData('contact', ['compId' => $compId]);
        $this->contactData = $this->CRUDFunctions->dataSet->result();         

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/company/managecompany');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }
    }

    public function updateCompany($compId) { // Cég adatainak frissítése

        if(isset($_POST['data'])) {

            $companyData = json_decode($this->input->post('data'), true);
            $contact = $this->input->post('contact');            
                       
            $this->CRUDFunctions->updateData('company', $companyData, 'compId', $compId); // Cégadatok frissítése
            $this->CRUDFunctions->deleteData('contact', ['compId' => $compId]);                        
                
            foreach($contact as $contactName) { // Kapcsolattartók frissítése
                $data = [
                    'compId' => $compId,
                    'contName' => $contactName
                ];                 

                $this->CRUDFunctions->saveData('contact', $data);                                                            
            }
            
            echo(!empty($this->CRUDFunctions->ajaxResponse)) ? $this->CRUDFunctions->ajaxResponse : 'error';                     
        }
        else {
            echo 'error';
        }
    }

    public function deleteCompany($compId) { // Cég törlése

        $this->CRUDFunctions->deleteData('company', ['compId' => $compId]); // Cég törlése
        $this->CRUDFunctions->deleteData('contact', ['compId' => $compId]); // Kontaktok törlése

        echo(!empty($this->CRUDFunctions->ajaxResponse)) ? $this->CRUDFunctions->ajaxResponse : 'error';
    }

    public function profileCompany($compId) { // Cég profil
        
        // Cégadatok lekérdezése
        $this->CRUDFunctions->getData('company', ['compId' => $compId], 1);
        $this->companyData = $this->CRUDFunctions->dataSet->result();
        
        foreach($this->companyData as $data) {
            self::getCompanyCatStat($data->compCat, $data->compStat);
        }

        // Kontaktok lekérdezése
        $this->CRUDFunctions->getData('contact', ['compId' => $compId]);
        $this->contactData = $this->CRUDFunctions->dataSet->result();        

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/company/profilecompany');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }
    }

    public function searchCompany() { // Cégek keresése
        
        if(isset($_POST['search_value'])) {
            $this->CRUDFunctions->searchData('company', ['compName' => $this->input->post('search_value')]);
            $this->searchResult = $this->CRUDFunctions->dataSet->result();

            if(count($this->searchResult) > 0) {

                $this->load->library('table');

                $template = [
                    'table_open' => '<table id="searchTable" class="table table-bordered table-striped">',
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
                $this->table->set_heading('Név', 'E-mail', 'Cím', 'Kategória', 'Státusz', 'Felvétel időpontja');

                foreach($this->searchResult as $result) {
                    self::getCompanyCatStat($result->compCat, $result->compStat);
                    $this->table->add_row('<a href="' . base_url() . 'index.php/company/company/profilecompany/' . $result->compId . '">' . $result->compName . '</a>', $result->compEmail, $result->compAddress, $this->category, $this->status, $result->compDate);                    
                }                             
            }            
        }

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/company/search');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }           
    }

    private function getCompanyCatStat($catId, $stat) { // Cég kategória és státusz megállapítása

        // Kategória lekérdezése                
        $this->CRUDFunctions->getData('category', ['catId' => $catId], 1);
        $categoryData = $this->CRUDFunctions->dataSet->result();                

        foreach($categoryData as $cat) {
            $this->category = $cat->catTitle;                                      
        }
        
        // Státusz megállapítása       
        switch($stat) {

            case 0:
            $this->status = 'Aktív';
            break;

            case 1:
            $this->status = 'Inaktív';
            break;

            case 2:
            $this->status = 'Archivált';
            break;
        }
    }
}