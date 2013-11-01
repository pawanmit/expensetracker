<?php

require_once '../DTO/ExpenseDTO.php';

class SaveExpensesController extends AppController {

    var $uses = array('Expense');

    public function saveFile() {
        $this->view = '/ExpenseTracker/fileUpload';
        $file = '../Test/Client/daily_expenses.csv';
        $expenseObjects = $this->getFileContents($file);
        foreach($expenseObjects as $expense) {
            try {
                $this->saveExpense($expense);
            } catch (Exception $e) {
                throw new InternalErrorException("Error saving expense: " .  $expense->date  . ", " . $expense->category  . ", " . $expense->subCategory  . ", "
                                                . $expense->vendor  . ", "  . $expense->description . ", "  . $expense->amount .  " - " . $e->getMessage());
            }
        }
    }

    public function saveExpenses() {
        try {
            $expenseJson = $this->request->input();
            //$file = '../Test/Client/daily_expenses.json';
            //$expenseJson = file_get_contents($file);
            $expenses = json_decode($expenseJson);
            if (json_last_error() != 0) {
                throw new Exception("Invalid Json.");
            }
            $expenseIds = array();
            foreach($expenses as $expense) {
                $expenseId = $this->saveExpense($expense);
                array_push($expenseIds, $expenseId);
            }
            $this->autoRender = false;
            $this->response->body(json_encode($expenseIds));
            } catch (Exception $e) {
                error_log("Catching Exception 1 " . $e->getMessage());
                $this->handleException($e);
            }
    }

    private function saveExpense(StdClass $expense) {
        $expenseDTO = new ExpenseDTO();
        $expenseDTO->updateExpenseDTOFromStdObject($expense);
        $expenseId = $expenseDTO->saveOrUpdate();
        //$this->Expense->create(false);
        //print_r('Expense saved with id ' . $expenseId . "<BR>");
    }

    private function getFileContents($file) {
        $expenseObjects = array();
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $expenseObject = new StdClass();
                $expenseObject->date = $data[0];
                $expenseObject->category = $data[1];
                $expenseObject->subCategory = $data[2];
                $expenseObject->vendor = $data[3];
                $expenseObject->description = $data[4];
                $expenseObject->amount = $data[5];
                //print_r( (array)$expenseObject ) ;
                array_push($expenseObjects, $expenseObject);
            }
        }
        return $expenseObjects;
    }
}