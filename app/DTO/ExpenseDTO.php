<?php

require_once 'DataTransferObject.php';

class ExpenseDTO extends DataTransferObject {

    public $date;
    public $category;
    public $subCategory;
    public $vendor;
    public $descripton;
    public $amount;

    public $textFields = array('category', 'subCategory', 'vendor', 'description');
    public $dateFields = array('date');
    public $numericFields = array('amount');

    public function updateExpenseDTOFromStdObject($expenseObject) {
        $this->setTextFields($expenseObject);
        $this->setDateFields($expenseObject);
        $this->setNumericFields($expenseObject);
    }

}