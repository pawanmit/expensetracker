<?php

App::uses('AppController', 'Controller');

class SaveExpensesControllerTest extends ControllerTestCase {

    public $fixtures = array('app.expense');

    public function testExpensesSaveWithCorrectNumberOfRows()
    {
        $expectedNumberOfRowsInserted = 2;
        $expenseJson = '[
                            {
                                "date": "6/1/2013",
                                "category": "Health",
                                "subCategory": "Preventive Care",
                                "vendor": "Walid",
                                "description": "",
                                "amount": "$105.00"
                            },
                                                        {
                                "date": "6/1/2013",
                                "category": "Health",
                                "subCategory": "Preventive Care",
                                "vendor": "Pawan",
                                "description": "",
                                "amount": "$105.00"
                            }
                         ]';


        //$this->mockSaveExpenseController();
        $this->testAction('/saveExpenses', array('data' => $expenseJson, 'method' => 'post'));
        $response = $this->result;
        debug($response);
        $numberOfRowsInserted = count(explode(",", $response));
        $this->assertEquals($expectedNumberOfRowsInserted, $numberOfRowsInserted);
    }

    public function testExpenseNotSavedIfAmountNotValid()
    {
        $expenseJson = '[
                            {
                                "date": "6/1/2013",
                                "category": "Health",
                                "subCategory": "Preventive Care",
                                "vendor": "Walid",
                                "description": ""
                            }
                         ]';

        $this->mockSaveExpenseController();

        $this->testAction('/saveExpenses', array('data' => $expenseJson, 'method' => 'post'));
        $response = $this->result;
        debug($response);
        $this->saveExpenseShouldFail($response);
    }

    public function testExpenseNotSavedIfDateNotValid()
    {
        $expenseJson = '[
                            {
                                "date": "45454",
                                "category": "Health",
                                "subCategory": "Preventive Care",
                                "vendor": "Walid",
                                "description": "",
                                "amount" : "333.43"
                            }
                         ]';

        $this->mockSaveExpenseController();

        $this->testAction('/saveExpenses', array('data' => $expenseJson, 'method' => 'post'));
        $response = $this->result;
        debug($response);
        $this->saveExpenseShouldFail($response);
    }

    private function mockSaveExpenseController() {
        $this->generate('SaveExpenses', array(
            'methods' => array(
                'saveExpense'
            ),
            'models' => array(
                'Expense' => array('saveOrUpdate')
            )
        ));
    }

    private function saveExpenseShouldFail($response)
    {
        $this->assertContains('Error', $response);
    }

}