<?php

class ExpenseViewController extends AppController {

    public function summary() {
        $this->view = '/ExpenseTracker/summary';
    }
}