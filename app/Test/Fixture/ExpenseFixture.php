<?php


class ExpenseFixture extends CakeTestFixture {

    //public $useDbConfig = 'test';

    public $import = 'Expense';

    public function init() {
        $this->records = array(
            array('date' => '2012-01-01', 'category' => 'Food', 'sub_category'=>'Restaurants', 'vendor' => 'Wired Cafe', 'description' => 'Breakfast', 'amount' => '3.00'),
            array('date' => '2012-05-01', 'category' => 'Food', 'sub_category'=>'Restaurants', 'vendor' => 'Wired Cafe', 'description' => 'Breakfast', 'amount' => '3.00'),
            array('date' => '2012-12-01', 'category' => 'Food', 'sub_category'=>'Groceries', 'vendor' => 'Cafe', 'description' => 'Dinner', 'amount' => '3.00'),
            array('date' => '2012-12-31', 'category' => 'Food', 'sub_category'=>'Restaurants', 'vendor' => 'Wired Cafe', 'description' => 'Breakfast', 'amount' => '3.00'),
            //testGetExpensesByMonthAndCategoryReturnsCorrectNumberOfRows - START
            array('date' => '2013-06-01', 'category' => 'Food', 'sub_category'=>'Restaurants', 'vendor' => 'Wired Cafe', 'description' => 'Breakfast', 'amount' => '3.00'),
            array('date' => '2013-06-03', 'category' => 'Food', 'sub_category'=>'Groceries', 'vendor' => 'Wholefoods', 'description' => '', 'amount' => '23.03'),
            //testGetExpensesByMonthAndCategoryReturnsCorrectNumberOfRows - END
            //testGetExpenseSummaryReturnsCorrectTotal - START
            array('date' => '2013-06-11', 'category' => 'Health', 'sub_category' => 'Preventive Care', 'vendor' => 'Walid', 'description' =>'',  'amount' => '105.00'),
            array('date' => '2013-06-12', 'category' => 'Health', 'sub_category' => 'Eye', 'vendor' => 'Optometric Images', 'description' =>'',  'amount' => '45.00'),
            //testGetExpenseSummaryReturnsCorrectTotal - END
            //testGetExpenseSummaryByCategoryAndDateReturnsCorrectTotal - START
            array('date' => '2013-7-9', 'category' => 'Shopping', 'sub_category' => 'Clothes', 'vendor' => 'Target', 'description' => 'Credit card bill', 'amount' => '27.00'),
            array('date' => '2013-7-15', 'category' => 'Shopping', 'sub_category' => 'Clothes', 'vendor' => 'McDonalds', 'description' =>'',  'amount' => '6.00' ),
            array('date' => '2013-7-15', 'category' => 'Shopping', 'sub_category' => 'Gift', 'vendor' => 'Alexander Gardening Supplies', 'description' =>'',  'amount' => '22.00'),
            array('date' => '2013-7-17', 'category' => 'Miscellaneous', 'sub_category' => 'Business', 'vendor' => 'creative-solutions.in', 'description' =>'',  'amount' => '50.00'),
            //testGetExpenseSummaryByCategoryAndDateReturnsCorrectTotal - END
            /*     array('date' => '2013-6-17', 'category' => 'Entertainment', 'sub_category' => 'Travel', 'vendor' => 'http:www.gotwhitewater.com-', 'description' =>'',  'amount' => '387.00'),
                 array('date' => '2013-6-27', 'category' => 'Entertainment', 'sub_category' => 'Misc. Activities', 'vendor' => 'NorCal Swimming', 'description' =>'',  'amount' => '330.00'),
                 array('date' => '2013-7-5', 'category' => 'Food', 'sub_category' => 'Restaurants', 'vendor' => 'Panera Bread', 'description' => 'Pasta,Muffin', 'amount' => '13.00' ),
                 array('date' => '2013-7-5', 'category' => 'Food', 'sub_category' => 'Restaurants', 'vendor' => 'Chipotle', 'description' => 'Tacos', 'amount' => '6.00' ),
                 array('date' => '2013-7-5', 'category' => 'Shopping', 'sub_category' => 'Clothes', 'vendor' => 'Sports Authority', 'description' =>'',  'amount' => '268.00' ),
                 array('date' => '2013-7-6', 'category' => 'Shopping', 'sub_category' => 'Personal Care', 'vendor' => 'BATH & BODY WORKS', 'description' =>'',  'amount' => '5.97') */
        );
            parent::init();
    }


}