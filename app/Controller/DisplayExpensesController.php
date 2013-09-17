<?php

class DisplayExpensesController extends AppController {

    var $uses = array('Expense');

    public function getExpensesByYear() {
        try {
            $year = $this->request->params['year'];
            error_log("Year:" . $year);
            if (strlen($year) <> 4 || (!is_numeric($year))) {
                throw new Exception("Invalid Year in params");
            }
            $expeneses = $this->getData($year);
            $this->response->body(json_encode($expeneses));
            $this->autoRender = false;
        }catch (Exception $e) {
            $this->handleException($e);
        }
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

