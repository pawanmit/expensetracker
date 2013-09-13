<?php

App::uses('Controller', 'Controller');
App::uses('AppController', 'Controller');

class SaveExpensesControllerTest extends ControllerTestCase {


    public function testSaveExpenseJson() {
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
                                "vendor": "Walid",
                                "description": "",
                                "amount": "$105.00"
                            }
                         ]';

        $this->generate('SaveExpenses', array(
            'methods' => array(
                'saveExpense'
            ),
            'models' => array(
                'Expense' => array('saveOrUpdate')
            )
        ));

        //error_log('JSON:' . $expenseJson);
        $ids = $this->testAction('/saveExpenses', array('data' => $expenseJson, 'method' => 'post') );
        debug($ids);
        $numberOfRowsInserted = count(explode(",", $ids));
        $this->assertEquals($expectedNumberOfRowsInserted, $numberOfRowsInserted);
    }

}