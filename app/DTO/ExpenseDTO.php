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

    function  __construct() {
        $this->model = ClassRegistry::init('Expense');
    }

    public function updateExpenseDTOFromStdObject($expenseObject) {
        $this->setTextFields($expenseObject);
        $this->setDateFields($expenseObject);
        $this->setNumericFields($expenseObject);
        if ( !isset($this->amount) || $this->amount == 0) {
            throw new Exception("Amount can not be null or 0");
        }
    }

    public function updateDTOFromResult($resultArray) {
        $modelSchema = $this->model->schema();
        $modelColumns = array_keys($modelSchema);
        foreach($modelColumns as $column) {
            $propertyName = $this->convertHyphenToCameCase($column);
            $this->$propertyName = $resultArray[$column];
        }
    }

    public function saveOrUpdate() {
        $fieldValueArray = $this->createFieldValueArray();
        $this->model->save($fieldValueArray);
        $this->model->create(false);
    }

    public function findUsingConditions($conditions) {
        $result = $this->model->findUsingConditions($conditions);
        return $result;
    }
}