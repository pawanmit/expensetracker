<?php

require_once '../Service/ExpenseService.php';

class ExpenseViewController extends AppController {

    private $expenseService;

    public function  beforeFilter() {
        $this->expenseService = new ExpenseService();
    }

    public function index() {
        //get max mm-yyyy
        //redirect to /ExpenseTracker/summary/mm-yyyy
        $yearAndMonths = $this->expenseService->getDistinctYearsAndMonths();
        //print_r($yearAndMonths);
        $latestYearAndMonth = $yearAndMonths[0];
        //$latestYearAndMonth = null;
        if ( !isset($latestYearAndMonth) ) {
            throw new InternalErrorException();
        }
        $this->redirect('/summary/' . $latestYearAndMonth);
        //$this->view = '/ExpenseTracker/summary';
        //$this->layout= false;
    }

    public function getExpenseSummaryForYearAndMonth() {
        $currentYearAndMonth = $this->request->params['yearAndMonth'];
        $yearAndMonths = $this->expenseService->getDistinctYearsAndMonths();
        //print_r($yearAndMonths);
        $this->set('yearAndMonths', $yearAndMonths);
        $this->set('currentYearAndMonth', $currentYearAndMonth);
        $this->view = '/ExpenseTracker/summary';
        $this->layout= false;
    }

}