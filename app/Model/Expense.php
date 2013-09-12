<?php
require_once '../DTO/ExpenseDTO.php';

class Expense extends AppModel {

    public $useTable = 'expense';

    public function saveOrUpdate(ExpenseDTO $expenseDTO) {
        try {
            $fieldValueArray = $this->createFieldValueArray($expenseDTO);
            AppModel::set($fieldValueArray);
            AppModel::save();
            return $this->id;
        } catch (Exception $e){
            throw new Exception ('Error saving CmsDocument with id ' . $expenseDTO->id );
        }
    }

}