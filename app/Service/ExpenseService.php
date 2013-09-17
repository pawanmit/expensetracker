<?php

require_once '../DTO/ExpenseDTO.php';

class ExpenseService {

    private $expenseDTO;

    function  __construct() {
        $this->expenseDTO = new ExpenseDTO();
    }

    public function getExpensesByYear($year) {
        $fromDate = $year.'-01-01';
        $toDate = $year.'-12-31';
        return $this->getExpenseByDateRange($fromDate, $toDate);
    }

    public function getExpenseByDateRange($fromDate, $toDate) {
        $conditions = array('date BETWEEN ? AND ?' => array($fromDate,$toDate));
        $resultSet = $this->expenseDTO->findUsingConditions($conditions);
        $expenses = array();
        if(count($resultSet) > 0 ) {
            foreach($resultSet as $entry) {
                $this->expenseDTO->updateDTOFromResult($entry['Expense']);
                array_push($expenses, $this->expenseDTO);
            }
        }
        return $expenses;
    }

}