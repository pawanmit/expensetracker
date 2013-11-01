<?php

require_once '../DTO/ExpenseDTO.php';
require_once '../DTO/SummaryDTO.php';

class ExpenseService {

    private $expenseDTO;
    private $summaryDTO;

    function  __construct() {
        $this->expenseDTO = new ExpenseDTO();
        $this->summaryDTO = new SummaryDTO();
        $this->expenseModel = ClassRegistry::init('Expense');
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
            'yearAndMonth' => "CONCAT(year(date) , '-', month(date))",
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

    public function getExpenseSummaryForCategoryByDate($category, $fromDate, $toDate) {
        $conditions = array(
            'conditions' => array( 'date BETWEEN ? AND ?' => array($fromDate,$toDate), 'category' => $category),
            'fields' => array('yearAndMonth', 'sub_category', 'total'), //array of field names
            'order' => array('yearAndMonth'), //string or array defining order
            'group' => array('yearAndMonth', 'sub_category'), //fields to GROUP BY
        );
        $virtualFields = array(
            'yearAndMonth' => "CONCAT(year(date) , '-', month(date))",
            'total' => 'SUM(amount)'
        );
        $resultSet = $this->summaryDTO->findUsingConditionsAndVirtualFields($conditions, $virtualFields);
        //print_r($resultSet);
        $expenseSummary = array();
        if (count($resultSet) > 0) {
            foreach($resultSet as $result) {
                $summary = $this->summaryDTO->createStdObjectFromResult($result['Expense']);
                array_push($expenseSummary, $summary);
            }
        }
        return $expenseSummary;
    }

    public function getCategoryAndTotalByDate($fromDate, $toDate) {
        $conditions = array(
            'conditions' => array( 'date BETWEEN ? AND ?' => array($fromDate,$toDate)),
            'fields' => array('yearAndMonth', 'category', 'total'), //array of field names
            'order' => array('category'), //string or array defining order
            'group' => array('yearAndMonth', 'category'), //fields to GROUP BY
        );
        $virtualFields = array(
            'yearAndMonth' => "CONCAT(year(date) , '-', month(date))",
            'total' => 'SUM(amount)'
        );
        $this->expenseModel->virtualFields = $virtualFields;
        $result = $this->expenseModel->find('all', $conditions);
        $expenseSummary = array();
        foreach ($result as $row) {
            $expense = new StdClass();
            $expense->category = $row['Expense']['category'];
            $expense->total = $row['Expense']['total'];
            array_push($expenseSummary, $expense);
        }
        return $expenseSummary;
    }

    public function getDistinctYearsAndMonths() {
        $results = $this->expenseModel->query("SELECT DISTINCT( CONCAT(YEAR(date) , '-', MONTH(date)) ) AS yearMonth FROM expense ORDER BY yearMonth DESC;");
        $yearAndMonths = array();
        foreach($results as $yearAndMonth) {
            array_push($yearAndMonths, $yearAndMonth[0]['yearMonth']);
        }
        return $yearAndMonths;
    }
}