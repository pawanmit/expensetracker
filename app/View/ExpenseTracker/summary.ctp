<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Summary of Expenses</title>

    <style type="text/css">
        html {
            height: 100%;
            width: 100%;
        }

        body {
            background: #f2f9f6 none top center no-repeat;
            color: #262c26;
            font-family: "Helvetica Neue","HelveticaNeue",Helvetica,sans-serif;
            font-size: 11px;
            height: auto;
        }

        #container {
            margin: auto;
            padding: 0px;
            height: auto;
            width: 960px;
            background-color: #FFFFFF;
            text-align: left;
            font-family: "Century Gothic", Century, Verdana, Geneva, sans-serif;
            font-size: 1.2em;
            color: #313030;
        }

        #header {
            height: 75px;
            background-color: #eee;
            font-family: Century, "Century Gothic", Verdana;
            position:relative;
            margin-right: auto;
            margin-left: auto;
            border-bottom:thick solid #006ea4;
        }

        #header h1 {
            font-size: 2em;
            color: #006ea4;
            padding-top: 10px;
        }

        #main {
            height: 600px;
            background-color: #eee;
            margin-right: auto;
            margin-left: auto;
            margin-bottom:0;
        }

        #sidebar-left {
            width:20%;
            height: 600px;
            float:left;
            border-right:thick solid #006ea4;
        }

        #sidebar-right {
            width:20%;
            height: 600px;
            float:right;
            border-left:thick solid #006ea4;
        }

        #content {
            width:50%;
            height: 600px;
            float:left;
        }

        #footer {
            background-color: #bbb;
            clear: both;
        }

        ul {
            list-style-type: none;
        }


        .months-list {
            margin-top:50px;
        }
        .month-li {
            text-transform:uppercase;
            margin:0 39px 0 27px;
            padding: 8px 0;
        }

        .category {
            margin-left:20px;
        }

        .odd {
            background-color:#f2f9f6;
        }

        a {
            text-decoration:none;
            color: #006ea4;
        }

        a:hover
        {
            font-weight: bold;
        }

        #expense-list {
            margin-top:50px;
            margin-left:50px;
        }


        #expense-list-table {
            width:100%;
        }

        .category, .total{
            text-align:left;
            padding-left:2em;
            padding-top:.5em;
            padding-bottom:.5em;
            font-size: 14px;
        }

        h4 {
            color: #006ea4;
        }


    </style>

</head>

<body>
<div id="container">
    <div id="header">
        <h1>ExpenseTracker</h1>
    </div>
    <div id="main">
        <div id="sidebar-left">
            <ul class="months-list">
                <?php
                foreach ($yearAndMonths as $yearAndMonth) {
                    //Adding 15 as date, otherwise createFromFormat returns incorrect outout
                    $monthYear = DateTime::createFromFormat('Y-n-d', $yearAndMonth . '-15')->format('M, Y');
                    echo '<li class="month-li"><a href="' . $yearAndMonth . '">' . $monthYear . '</a></li>';
                }
                ?>
                <li class="month-li" id="2013-05"><a href="#">May, 2013</a></li>
                <li class="month-li" id="2013-06"><a href="#">Jun, 2013</a></li>
                <li class="month-li" id="2013-07"><a href="#">Jul, 2013</a></li>
                <li class="month-li" id="2013-08"><a href="#">Aug, 2013</a></li>
                <li class="month-li" id="2013-09"><a href="#">Sep, 2013</a></li>
                <li class="month-li" id="2013-10"><a href="#">Oct, 2013</a></li>
                <li class="month-li" id="2013-11"><a href="#">Nov, 2013</a></li>
            </ul>
        </div>
        <div id="content">
            <div id="expense-list">
                <h4 class="expense-summary-desc">Expense Summary for Jun, 2013</h4>
                <table id="expense-list-table">
                    <thead class="expense-list-header">
                    <tr>
                        <th class="category">Category</th>
                        <th class="total">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="expense odd">
                        <td class="category">Transportation</td>
                        <td class="total">85.00</td>
                    </tr>
                    <tr class="expense even">
                        <td class="category">Utilities</td>
                        <td class="total">285.00</td>
                    </tr>
                    <tr class="expense odd">
                        <td class="category">Food</td>
                        <td class="total">937.00</td>
                    </tr>
                    <tr class="expense even">
                        <td class="category">Entertainlent</td>
                        <td class="total">404.00</td>
                    </tr>
                    <tr class="expense odd">
                        <td class="category">Miscellaneous</td>
                        <td class="total">44.00</td>
                    </tr>
                    <tr class="expense even">
                        <td class="category">Utilities</td>
                        <td class="total">285.00</td>
                    </tr>
                    <tr class="expense odd">
                        <td class="category">Home</td>
                        <td class="total">757.31</td>
                    </tr>
                    <tr class="expense even">
                        <td class="category">Timmy</td>
                        <td class="total">100.45</td>
                    </tr>
                    <tr class="expense odd">
                        <td class="category">Shopping</td>
                        <td class="total">636.05</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="sidebar-right"></div>
        <div id="footer">test</div>
    </div>
</div>
</body>
</html>
