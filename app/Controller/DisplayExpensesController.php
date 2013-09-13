<?php

class DisplayExpensesController extends AppController {

    var $uses = array('Expense');

    public function getExpensesByCategoryAndMonth() {
        try {
            $year = $this->request->params['year'];
            error_log("Year:" . $year);
            if (strlen($year) <> 4 || (!is_numeric($year))) {
                throw new Exception("Invalid Year in params");
            }
            $this->getData($year);
        }catch (Exception $e) {
            $this->handleException($e);
        }
        $this->autoRender = false;
    }


    private function getData($year) {
        $fromDate = $year.'-01-01';
        $toDate = $year.'-12-31';
        $expenses = $this->Expense->findExpensesByDateRange($fromDate, $toDate);
        print_r($expenses);
    }
}

