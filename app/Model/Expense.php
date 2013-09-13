<?php
require_once '../DTO/ExpenseDTO.php';

class Expense extends AppModel {

    public $useTable = 'expense';

    public function saveOrUpdate(ExpenseDTO $expenseDTO) {
        try {
            $fieldValueArray = $this->createFieldValueArray($expenseDTO);
            AppModel::set($fieldValueArray);
            //print_r($fieldValueArray);
            AppModel::save();
            return $this->id;
        } catch (Exception $e){
            throw new Exception ('Error saving CmsDocument with id ' . $expenseDTO->id );
        }

        }

    public function getCategories() {
        $results = AppModel::find('all', array('fields' => array('DISTINCT category')));
        print_r($results);
    }

}