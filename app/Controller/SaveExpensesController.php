<?php

require_once '../DTO/ExpenseDTO.php';

class SaveExpensesController extends AppController {

    var $uses = array('Expense');

    public function index() {
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