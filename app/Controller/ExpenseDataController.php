<?php

require_once '../Service/ExpenseService.php';

class ExpenseDataController extends AppController {

    //var $uses = array('Expense');
    private $expenseService;

    public function  beforeFilter() {
        $this->expenseService = new ExpenseService();
    }

    /*
     * Maps /getExpenses/:year
     */
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

    /*
     * Maps end point /getSummary
     */
    public function getExpenseSummary() {
        $summary = $this->expenseService->getExpenseSummary();
        $this->response->body(json_encode($summary));
        $this->autoRender = false;
    }

    public function getExpensesByCategoryAndMonth() {
        try {
            $yyyymm = $this->request->params['yyyymm'];
            $fromDate = $yyyymm . '-01';
            $toDate = $yyyymm . '-31';
            $category = $this->request->params['category'];
            $expenses = $this->expenseService->getExpenseByDateRange($fromDate, $toDate);
            $expenseByCat = array();
            foreach($expenses as $expense) {
                if($expense->category == $category) {
                    array_push($expenseByCat, $expense);
                }
            }
            $this->response->body(json_encode($expenseByCat));
            $this->autoRender = false;
        } catch (Exception $e) {
            $this->handleException($e);
        }
    }

}

