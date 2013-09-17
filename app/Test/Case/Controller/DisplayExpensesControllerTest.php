<?php

App::uses('AppController', 'Controller');
App::uses('Expense', 'Model');

class DisplayExpensesControllerTest  extends ControllerTestCase {
    public $fixtures = array('app.expense');
    //public $dropTables = false;


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


    private function getExpenseShouldFail($response)
    {
        $this->assertContains('Error', $response);
    }

    private function getExpensesShouldPass($expected, $result) {
        $this->assertEqual($expected, $result);
    }

    private function mockDisplayExpensesController() {
        $this->generate('DisplayExpenses', array(
            'methods' => array(
                'getExpensesByYear'
            )
        ));
    }
}