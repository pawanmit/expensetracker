<html>
<head>

    <style>
        #summaryTable
        {
            display:  table;
            width:auto;
            background-color:#eee;
            border:1px solid  #666666;
            border-spacing:5px;/*cellspacing:poor IE support for  this*/
            /* border-collapse:separate;*/
        }

        #summary-row
        {
            display:table-row;
            width:auto;

        }
        .date
        {
            float:left;/*fix for  buggy browsers*/
            display:table-cell;
            width:200px;
            background-color:#ccc;

        }

        .category
        {
            float:left;/*fix for  buggy browsers*/
            display:table-cell;
            width:200px;
            background-color:#ccc;

        }

        .total
        {
            float:left;/*fix for  buggy browsers*/
            display:table-cell;
            width:200px;
            background-color:#ccc;

        }
    </style>
</head>

<body>

<div id="summaryTable" />

<footer>
    <script type="text/javascript" src="http://www.resumescanner.net/static/scripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/rest.js"></script>
    <script type="text/javascript" src="js/view.js"></script>
</footer>
</body>

</html>