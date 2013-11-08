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

        //$latestYearAndMonth = null;
        if ( !isset($yearAndMonths[0]) ) {
            throw new InternalErrorException();
        }
        $latestYearAndMonth = $yearAndMonths[0];
        $this->redirect('/details/' . $latestYearAndMonth);
        //$this->view = '/ExpenseTracker/summary';
        //$this->layout= false;
    }

    public function getExpenseSummaryForYearAndMonth() {
        $currentYearAndMonth = $this->request->params['yearAndMonth'];
        $yearAndMonths = $this->expenseService->getDistinctYearsAndMonths();
        $expenseSummary = $this->getCategoryAndTotalByDate($currentYearAndMonth);
        $this->set('yearAndMonths', $yearAndMonths);
        $this->set('currentYearAndMonth', $currentYearAndMonth);
        $this->set('expenseSummary', $expenseSummary);
        $this->view = '/ExpenseTracker/month';
        $this->layout= false;
    }

    public function summary() {
        $this->view = '/ExpenseTracker/summary';
        $this->layout= false;

    }

    private function getCategoryAndTotalByDate($yearMonth) {
        $fromDate = $yearMonth . '-01';
        $toDate = $yearMonth . '-31';
        $expenseSummary = $this->expenseService->getCategoryAndTotalByDate($fromDate, $toDate);
        //print_r($expenseSummary);
        return $expenseSummary;
    }

    public function getExpenseSummaryForCategory() {
        $category = $this->request->params['category'];
    }
}