<?php

App::uses('AppController', 'Controller');
App::uses('Expense', 'Model');

class DisplayExpensesControllerTest  extends ControllerTestCase {
    public $fixtures = array('app.expense');

    public function testExpenseTotalOfCategoryByMonth() {

    }

    public function testSummaryByCatAndMonthOnlyAcceptsValidYear() {
        //$this->mockDisplayExpensesController();
        $this->testAction('/getExpenseSummary/jhjh', array('method' => 'get'));
        $response = $this->result;
        debug($response);
        $this->getExpenseShouldFail($response);
    }

    private function getExpenseShouldFail($response)
    {
        $this->assertContains('Error', $response);
    }

    private function mockDisplayExpensesController() {
        $this->generate('DisplayExpenses', array(
            'methods' => array(
                'getExpensesByCategoryAndMonth'
            )
        ));
    }
}