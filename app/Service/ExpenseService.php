<?php

require_once '../DTO/ExpenseDTO.php';
require_once '../DTO/SummaryDTO.php';

class ExpenseService {

    private $expenseDTO;
    private $summaryDTO;

    function  __construct() {
        $this->expenseDTO = new ExpenseDTO();
        $this->summaryDTO = new SummaryDTO();
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
        //print_r($resultSet);
        if(count($resultSet) > 0 ) {
            foreach($resultSet as $entry) {
                $expense = $this->expenseDTO->createStdObjectFromResult($entry['Expense']);
                array_push($expenses, $expense);
            }
        }
        return $expenses;
    }

    public function getExpenseSummary() {
        $conditions = array(
            'fields' => array('yearAndMonth', 'category', 'total'), //array of field names
            'order' => array('yearAndMonth'), //string or array defining order
            'group' => array('yearAndMonth', 'category'), //fields to GROUP BY
        );
        $virtualFields = array(
            'yearAndMonth' => "date",
            'total' => 'SUM(amount)'
        );
        $resultSet = $this->summaryDTO->findUsingConditionsAndVirtualFields($conditions, $virtualFields);
        $expenseSummary = array();
        if (count($resultSet) > 0) {
            foreach($resultSet as $result) {
                $summary = $this->summaryDTO->createStdObjectFromResult($result['Expense']);
                array_push($expenseSummary, $summary);
            }
        }
        return $expenseSummary;
    }
}