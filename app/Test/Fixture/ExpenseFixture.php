<?php

class ExpenseFixture extends CakeTestFixture {
    public $fields = array(
        'id' => array('type' => 'integer', 'key' => 'primary'),
        'date' => array('type' => 'datetime', 'null' => false),
        'category' => array('type' => 'string', 'length' => 50, 'null' => false),
        'sub_category' => array('type' => 'string', 'length' => 50, 'null' => false),
        'vendor' => array('type' => 'string', 'length' => 100),
        'description' => array('type' => 'string', 'length' => 100),
        'amount' => array('type' => 'float', 'default' => '0', 'null' => false)
    );

    public $records = array(
        array('date' => '6/01/2013', 'category' => 'Food', 'sub_category'=>'Restaurants', 'vendor' => 'Wired Cafe', 'description' => 'Breakfast', 'amount' => '3.00'),
        array('date' => '6/03/2013', 'category' => 'Food', 'sub_category'=>'Groceries', 'vendor' => 'Wholefoods', 'description' => '', 'amount' => '23.03'),
        array('date' => '06/01/2013', 'category' => 'Health', 'sub_category' => 'Preventive Care', 'vendor' => 'Walid', 'description' =>'',  'amount' => '105.00'),
        array('date' => '6/1/2013' , 'category' => 'Food', 'sub_category' => 'Groceries', 'vendor' => 'Farmers Market', 'description' =>'',  'amount' => '40.00'),
        array('date' => '6/9/2013', 'category' => 'Shopping', 'sub_category' => 'Clothes', 'vendor' => 'Target', 'description' => 'Credit card bill', 'amount' => '27.00'),
        array('date' => '6/15/2013', 'category' => 'Food', 'sub_category' => 'Restaurants', 'vendor' => 'McDonalds', 'description' =>'',  'amount' => '6.00' ),
        array('date' => '6/15/2013', 'category' => 'Home', 'sub_category' => 'Garden', 'vendor' => 'Alexander Gardening Supplies', 'description' =>'',  'amount' => '22.00'),
        array('date' => '6/17/2013', 'category' => 'Miscellaneous', 'sub_category' => 'Business', 'vendor' => 'creative-solutions.in', 'description' =>'',  'amount' => '50.00'),
        array('date' => '6/17/2013', 'category' => 'Entertainment', 'sub_category' => 'Travel', 'vendor' => 'http:www.gotwhitewater.com/', 'description' =>'',  'amount' => '387.00'),
        array('date' => '6/27/2013', 'category' => 'Entertainment', 'sub_category' => 'Misc. Activities', 'vendor' => 'NorCal Swimming', 'description' =>'',  'amount' => '330.00'),
        array('date' => '7/5/2013', 'category' => 'Food', 'sub_category' => 'Restaurants', 'vendor' => 'Panera Bread', 'description' => 'Pasta,Muffin', 'amount' => '13.00' ),
        array('date' => '7/5/2013', 'category' => 'Food', 'sub_category' => 'Restaurants', 'vendor' => 'Chipotle', 'description' => 'Tacos', 'amount' => '6.00' ),
        array('date' => '7/5/2013', 'category' => 'Shopping', 'sub_category' => 'Clothes', 'vendor' => 'Sports Authority', 'description' =>'',  'amount' => '268.00' ),
        array('date' => '7/6/2013', 'category' => 'Shopping', 'sub_category' => 'Personal Care', 'vendor' => 'BATH & BODY WORKS', 'description' =>'',  'amount' => '5.97')
    );

}