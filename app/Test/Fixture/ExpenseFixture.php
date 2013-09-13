<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pmittal
 * Date: 9/13/13
 * Time: 10:17 AM
 * To change this template use File | Settings | File Templates.
 */

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
        array('id' => 1, 'date' => '9/12/2013', 'category' => 'Food', 'Restaurants' => '1', 'vendor' => 'Wired Cafe', 'description' => 'Breakfast', 'amount' => '3,00')
    );

}