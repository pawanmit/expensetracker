<?php

require_once 'DataTransferObject.php';

class ExpenseDTO extends DataTransferObject {

    public $date;
    public $category;
    public $subCategory;
    public $vendor;
    public $description;
    public $amount;

    public $textFields = array('category', 'subCategory', 'vendor', 'description');
    public $dateFields = array('date');
    public $numericFields = array('amount');

    private $expense;

    function  __construct() {
        $this->expense = ClassRegistry::init('Expense');
    }

    public function updateExpenseDTOFromStdObject($expenseObject) {
        $this->setTextFields($expenseObject);
        $this->setDateFields($expenseObject);
        $this->setNumericFields($expenseObject);
        if ( !isset($this->amount) || $this->amount == 0) {
            throw new Exception("Amount can not be null or 0");
        }
    }

    public function saveOrUpdate() {
        $fieldValueArray = $this->createFieldValueArray($this->expense->schema());
        $this->expense->save($fieldValueArray);
        $this->expense->create(false);
    }
}