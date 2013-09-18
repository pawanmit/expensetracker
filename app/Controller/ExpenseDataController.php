<?php

require_once '../Service/ExpenseService.php';

class ExpenseDataController extends AppController {

    //var $uses = array('Expense');
    private $expenseService;

    public function  beforeFilter() {
        $this->expenseService = new ExpenseService();
    }

    public function getExpensesByYear() {
        try {
            $year = $this->request->params['year'];
            if (strlen($year) <> 4 || (!is_numeric($year))) {
                throw new Exception("Invalid Year in params");
            }
            $expeneses = $this->expenseService->getExpensesByYear($year);
            $this->response->body(json_encode($expeneses));
            $this->autoRender = false;
        }catch (Exception $e) {
            $this->handleException($e);
        }
    }

    public function getExpenseSummary() {
        $summary = $this->expenseService->getExpenseSummary();
        $this->response->body(json_encode($summary));
        $this->autoRender = false;
    }

    public function getExpensesInDateRange() {
        $datesJson = $this->request->input();
        $dateRange = json_decode($datesJson);
        $fromDate = $dateRange->fromDate;
        $toDate = $dateRange->toDate;
        $expenses = $this->Expense->findExpensesByDateRange($fromDate, $toDate);
        return json_encode($expenses);
    }

    private function getData($year) {
        $fromDate = $year.'-01-01';
        $toDate = $year.'-12-31';
        $expenses = $this->Expense->findExpensesByDateRange($fromDate, $toDate);
        //print_r($expenses);
        return $expenses;
    }
}

