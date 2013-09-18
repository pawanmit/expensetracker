<?php

class SummaryDTO extends DataTransferObject {

    function  __construct() {
        $this->model = ClassRegistry::init('Expense');
//        $this->model->virtualFields = array(
//            'yearAndMonth' => "CONCAT( year(date), '-', month(date) )",
//            'total' => 'SUM(amount)'
//        );
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

}