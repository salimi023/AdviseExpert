<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDFunctions extends CI_Model {

    public $dataSet = [];
    public $ajaxResponse = null;

    public function saveData($table, $data = []) { // Adatok mentése

        $q = $this->db->insert($table, $data);
        $this->ajaxResponse = $q ? 'success' : 'error';
        return $this->ajaxResponse;
    }

    public function getData($table, $where = false, $limit = false) { // Adatok lekérdezése

        switch(true) {

            case $where == false && $limit == false:
            $this->dataSet = $this->db->get($table);
            break;

            case $where != false && $limit == false:
            $this->dataSet = $this->db->get_where($table, $where);
            break;

            case $where != false && $limit != false:
            $this->dataSet = $this->db->get_where($table, $where, $limit);
            break;
        }
        
        return $this->dataSet;
    }

    public function updateData($table, $data = [], $column, $option) { // Adatok frissítése
        
        $q = $this->db->where($column, $option)->update($table, $data);
        $this->ajaxResponse = $q ? 'success' : 'error';
        return $this->ajaxResponse;        
    }

    public function deleteData($table, $where = false) { // Adatok törlése

        switch(true) {

            case $where == false:
            $q = $this->db->delete($table);
            $this->ajaxResponse = $q ? 'success' : 'error';
            break;

            case $where != false:
            $q = $this->db->delete($table, $where);
            $this->ajaxResponse = $q ? 'success' : 'error';
            break;            
        }

        return $this->ajaxResponse;
    }

    public function searchData($table, $where = false) { // Adatok keresése keresőszó alapján
        
        $this->dataSet = $this->db->like($where)->get($table);
        return $this->dataSet;
    }
}