<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public $catId = null;
    public $catTitle = null;
    public $catDesc = null;
    public $catStat = null;
    public $tableData = null;

    public function __construct() {
        parent::__construct();
        $this->load->model('CRUDFunctions');
    }

    public function index() { // Kategóriák táblázata (főoldal)

        $this->CRUDFunctions->getData('category', false, false);

        $this->load->library('table');

        $template = [
            'table_open' => '<table id="catTable" class="table table-bordered table-striped">',
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
        $this->table->set_heading('Cím', 'Leírás', 'Státusz', 'Kezelés');

        $this->tableData = $this->CRUDFunctions->dataSet->result();

        if(count($this->tableData) > 0) {

            foreach($this->tableData as $row) {
                $status = $row->catStat == 1 ? 'Aktív' : 'Inaktív';
                $desc = !empty($row->catDesc) ? $row->catDesc : 'N/A'; 
                $this->table->add_row($row->catTitle, $desc, $status, '<a href="' . base_url() . 'index.php/category/category/managecategory/' . $row->catId . '" class="btn btn-warning" role="button">Kezelés</a>');
            }
        }
        else {
            $this->tableData = false;
        }

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/category/category');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }
    }

    public function createCategory() { // Kategória készítése

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/category/createcategory');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }
    }

    public function saveCategory() { // Kategória mentése

        if(isset($_POST['data'])) {

            $data = json_decode($this->input->post('data'), true);            
            $this->CRUDFunctions->saveData('category', $data);            
            echo(!empty($this->CRUDFunctions->ajaxResponse)) ? 'success' : 'error' ; 
        }
        else {
            echo 'error';
        }
    }

    public function manageCategory($catId) { // Kategória kezelése

        $this->CRUDFunctions->getData('category', ['catId' => $catId], 1);

        foreach($this->CRUDFunctions->dataSet->result() as $row) {            

            $this->catId = $row->catId;
            $this->catTitle = $row->catTitle;
            $this->catDesc = !empty($row->catDesc) ? $row->catDesc : 'N/A';
            $this->catStat = $row->catStat;
        }

        if($this->session->userdata('userId')) {
            $this->load->view('templates/adminHead');
            $this->load->view('pages/category/managecategory');
            $this->load->view('templates/adminFooter');
        }
        else {
            header('Location: ' . base_url());
        }
    }

    public function updateCategory($catId) { // Kategória módosítása

        if(isset($_POST['data'])) {

            $data = json_decode($this->input->post('data'), true);            
            $this->CRUDFunctions->updateData('category', $data, 'catId', $catId);                        
            echo(!empty($this->CRUDFunctions->ajaxResponse)) ? $this->CRUDFunctions->ajaxResponse : 'error'; 
        }
        else {
            echo 'error';
        }
    }

    public function deleteCategory($catId) { // Kategória törlése

        $this->CRUDFunctions->deleteData('category', ['catId' => $catId]);                    
        echo(!empty($this->CRUDFunctions->ajaxResponse)) ? $this->CRUDFunctions->ajaxResponse : 'error';
    }
}