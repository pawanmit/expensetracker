<?php

class SummaryDTO extends DataTransferObject {

    function  __construct() {
        $this->model = ClassRegistry::init('Expense');
    }

    public function createStdObjectFromResult($result) {
        $summary = new StdClass();
        if (isset($result['yearAndMonth'])) {
            $summary->yearAndMonth = $result['yearAndMonth'];
        }
        if (isset($result['category'])) {
            $summary->category = $result['category'];
        }
        if (isset($result['sub_category'])) {
            $summary->subCategory = $result['sub_category'];
        }
        if (isset($result['total'])) {
            $summary->total = $result['total'];
        }
        return $summary;
    }

    public function findUsingConditionsAndVirtualFields($conditions, $virtualFields) {
        $this->model->virtualFields = $virtualFields;
        $result = $this->model->find('all', $conditions);
        return $result;
    }

}