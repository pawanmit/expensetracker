<?php

class DisplayExpensesController extends AppController {

    public function getExpensesByCategoryAndMonth() {
        try {
            $year = $this->request->params['year'];
            error_log("Year:" . $year);
            if (strlen($year) <> 4 || (!is_numeric($year))) {
                throw new Exception("Invalid Year in params");
            }
        }catch (Exception $e) {
            $this->handleException($e);
        }
        $this->autoRender = false;
    }
}

