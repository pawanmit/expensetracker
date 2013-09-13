<?php

require_once '../DTO/ExpenseDTO.php';

class SaveExpensesController extends AppController {

    var $uses = array('Expense');

    public function saveFile() {
        $this->view = '/ExpenseTracker/fileUpload';
        $file = '../Test/Client/daily_expenses.csv';
        $this->Expense->getCategories();
        $expenseObjects = $this->getFileContents($file);
        foreach($expenseObjects as $expenseObject) {
            $expenseDTO = new ExpenseDTO();
            $expenseDTO->updateExpenseDTOFromStdObject($expenseObject);
            //$expenseId = $this->Expense->saveOrUpdate($expenseDTO);
            //$this->Expense->create(false);
            //print_r('Expense saved with id ' . $expenseId . "<BR>");
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
            return json_encode($expenseIds);
            } catch (Exception $e) {
                $this->handleException($e);
            }
    }

    private function saveExpense(StdClass $expense) {
        $expenseDTO = new ExpenseDTO();
        $expenseDTO->updateExpenseDTOFromStdObject($expense);
        $expenseId = $this->Expense->saveOrUpdate($expenseDTO);
        $this->Expense->create(false);
        return $expenseId;
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
                array_push($expenseObjects, $expenseObject);
            }
        }
        return $expenseObjects;
    }
}