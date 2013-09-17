<?php
require_once '../DTO/ExpenseDTO.php';

class Expense extends AppModel {

    public $useTable = 'expense';

    public function saveOrUpdate(ExpenseDTO $expenseDTO) {
        try {
            $fieldValueArray = $this->createFieldValueArray($expenseDTO);
            AppModel::set($fieldValueArray);
            //print_r($fieldValueArray);
            AppModel::save();
            return $this->id;
        } catch (Exception $e){
            throw new Exception ('Error saving Expense with id ' . $expenseDTO->id );
        }
     }

    public function findExpensesByDateRange($fromDate, $toDate) {
        error_log('Searching for Expense between ' . $fromDate . ' and ' . $toDate);
        $results = AppModel::find('all', array('conditions' => array('date BETWEEN ? AND ?' => array($fromDate,$toDate)) ));
        $expenses = array();
        foreach($results as $result) {
            $expense = new ExpenseDTO();
            $expense = $this->createDTOFromResult($expense, $result['Expense']);
            array_push($expenses, $expense);
        }
        return $expenses;
    }

    public function getCategories() {
        $results = AppModel::find('all', array('fields' => array('DISTINCT category')));
        //print_r($results);
    }

}