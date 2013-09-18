<?php

class SummaryDTO extends DataTransferObject {

    function  __construct() {
        $this->model = ClassRegistry::init('Expense');
    }

    public $yearAndMonth;
    public $category;
    public $total;

    public function createStdObjectFromResult($result) {
        $summary = new StdClass();
        $summary->yearAndMonth = $result['yearAndMonth'];
        $summary->category = $result['category'];
        $summary->total = $result['total'];
        return $summary;
    }

    public function findUsingConditionsAndVirtualFields($conditions, $virtualFields) {
        $this->model->virtualFields = $virtualFields;
        $result = $this->model->find('all', $conditions);
        return $result;
    }

}