<?php

App::uses('AppController', 'Controller');

class SaveExpensesControllerTest extends ControllerTestCase {

    public function testIndex() {
        $result = $this->testAction('saveExpenses');
        debug($result);
    }

}