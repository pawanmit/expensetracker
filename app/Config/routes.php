<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

    Router::connect('/saveExpenses', array('controller' => 'saveExpenses', 'action' => 'saveExpenses', '[method]' => 'POST'));

    Router::connect('/getExpenses/:year', array('controller' => 'expenseData', 'action' => 'getExpensesByYear', '[method]' => 'GET'));

    Router::connect('/getExpenses/:yyyymm/:category', array('controller' => 'expenseData', 'action' => 'getExpensesByCategoryAndMonth', '[method]' => 'GET'));
    Router::connect('/getExpenses/:category/:yyyymm', array('controller' => 'expenseData', 'action' => 'getExpensesByCategoryAndMonth', '[method]' => 'GET'));

    Router::connect('/getExpenseSummaryForCategoryByDate/:category/:yyyymm', array('controller' => 'expenseData', 'action' => 'getExpenseSummaryForCategoryByDate', '[method]' => 'GET'));

    Router::connect('/details', array('controller' => 'expenseView', 'action' => 'index', '[method]' => 'GET'));
    Router::connect('/summary', array('controller' => 'expenseView', 'action' => 'summary', '[method]' => 'GET'));

    Router::connect('/getSummary', array('controller' => 'expenseData', 'action' => 'getExpenseSummary', '[method]' => 'GET'));


    /* New Routers */
    Router::connect('/details/:yearAndMonth', array('controller' => 'expenseView', 'action' => 'getExpenseSummaryForYearAndMonth', '[method]' => 'GET'));
    Router::connect('/details/category/:yearAndMonth', array('controller' => 'expenseView', 'action' => 'getExpenseSummaryForCategory', '[method]' => 'GET'));


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
