<?php

App::uses('AppController', 'Controller');
App::uses('Expense', 'Model');

class ExpenseDataControllerTest  extends ControllerTestCase {
    public $fixtures = array('app.expense');

    public $dropTables = false;


       public function testExpenseTotalOfCategoryByMonth() {

        }

        public function testGetExpensesByCategoryAndMonthAcceptsOnlyValidYear() {
            //$this->mockDisplayExpensesController();
            $this->testAction('/getExpenses/jhjh', array('method' => 'get'));
            $response = $this->result;
            debug($response);
            $this->getExpenseShouldFail($response);
        }

    public function testGetExpensesByYearReturnCorrectNumberOfRows() {
        //$this->mockDisplayExpensesController();
        $this->testAction('/getExpenses/2012', array('method' => 'get'));
        $response = $this->result;
        $expenses = json_decode($response);
        debug(count($expenses));
        $expectedNumRows = 4;
        $actualRowsReturned = count($expenses);
        $this->getExpensesShouldPass($expectedNumRows, $actualRowsReturned);

    }

    public function testGetExpensesByMonthAndCategoryReturnsCorrectNumberOfRows() {
        $this->testAction('/getExpenses/2013-6/Food', array('method' => 'get'));
        $response = $this->result;
        $expenses = json_decode($response);
        debug(count($expenses));
        $expectedNumRows = 2;
        $actualRowsReturned = count($expenses);
        $this->getExpensesShouldPass($expectedNumRows, $actualRowsReturned);
    }

    public function testGetExpenseSummaryReturnsCorrectTotal() {
        $this->testAction('/getSummary', array('method' => 'get'));
        $response = $this->result;
        $summary = json_decode($response);
        //debug($summary);
        foreach ($summary as $entry) {
            if ($entry->yearAndMonth == '2013-6' && $entry->category == 'Health') {
                $this->getExpensesShouldPass('150.00', $entry->total );
            }
        }
    }

    public function testGetExpenseSummaryByCategoryAndDateReturnsCorrectTotal() {
        $this->_testAction('/getExpenseSummaryForCategoryByDate/Shopping/2013-7', array('method' => 'get'));
        $response = $this->result;
        debug($response);
        $expenseSummaryByCategory = json_decode($response);
        foreach($expenseSummaryByCategory as $entry) {
            if ($entry->subCategory == 'Clothes') {
                $this->getExpensesShouldPass('33.00', $entry->total );
            }
        }

    }

    private function getExpenseShouldFail($response)
    {
        $this->assertContains('Error', $response);
    }

    private function getExpensesShouldPass($expected, $result) {
        $this->assertEqual($expected, $result);
    }

    private function mockDisplayExpensesController() {
        $this->generate('ExpenseData', array(
            'methods' => array(
                'getExpensesByYear'
            )
        ));
    }
}