<?php

require_once '../Service/ExpenseService.php';

class ExpenseViewController extends AppController {

    private $expenseService;

    public function  beforeFilter() {
        $this->expenseService = new ExpenseService();
    }

    public function summary() {
        //get max mm-yyyy
        //redirect to /ExpenseTracker/summary/mm-yyyy
        $expeneses = $this->expenseService->getDistinctYearsAndMonths();
        $this->view = '/ExpenseTracker/summary';
        $this->layout= false;
    }
}