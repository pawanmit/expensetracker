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

        .even {
            background-color:#f2f9f6;
        }

        .expenseTotal {
            font-weight: bold;
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

        </div>
        <div id="content">
            <div id="barchart"></div>
        </div>
        <div id="sidebar-right"></div>
        <div id="footer">test
        <script type="text/javascript" src="js/html5-canvas-bar-graph.js"></script>
        <script>
            (function () {
                var ctx = createCanvas("barchart");
                var graph = new BarGraph(ctx);
                graph.maxValue = 1000;
                graph.margin = 5;
                graph.colors = ["#0263AE", "#A858A3", "#FBAE2C", "#DF4C27"];
                graph.xAxisLabelArr = ["Painting", "Sculpture", "Digital", "Studio"];
                graph.update([950, 650, 700, 885]);
            }());
        </script>
        </div>
    </div>
</div>
</body>
</html>
