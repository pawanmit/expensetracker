<?php
require_once '../DTO/ExpenseDTO.php';

class Expense extends AppModel {

    public $useTable = 'expense';

    public function saveOrUpdate($fieldValueArray) {
        try {
            AppModel::set($fieldValueArray);
            //print_r($fieldValueArray);
            AppModel::save();
            return $this->id;
        } catch (Exception $e){
            throw new Exception ('Error saving Expense' );
        }
     }

    public function findUsingConditions($conditions) {
        $results = AppModel::find('all', array('conditions' => $conditions ));
        //print_r($results);
        return $results;
    }

    public function getCategories() {
        $results = AppModel::find('all', array('fields' => array('DISTINCT category')));
        //print_r($results);
    }

}