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
    <script type="text/javascript" src="js/jquery.tablesorter.js"></script>

    <script type="text/javascript">

        var baseUrl = "http://localhost/expensetracker"
        //jQuery.ajaxSettings.traditional = true;

        function getSummary() {
            var data = {
            }
            var returndata = {}

            jQuery.ajax({
                async: false,
                type: 'GET',
                cache: false,
                dataType: 'json',
                url: baseUrl + '/getSummary',
                data: data,
                success: function(data){
                    returndata = data;
                },
                error: function(data){
                    returndata = "error";
                }
            });
            return returndata;
        }

        function loadSummary() {
            var summaryJson = getSummary();
            //jQuery("#summary").append(summaryJson);
            jQuery.each(summaryJson, function(i, item) {
                jQuery("#summaryTable").append('<div id="row-' + i + '" class="summary-row" />');
                jQuery("#row-"+i).append("<span class='date'>" + item.yearAndMonth + "</span>");
                jQuery("#row-"+i).append("<span class='category'>" + item.category + "</span>");
                jQuery("#row-"+i).append("<span class='total'>" + item.total + "</span>");
                //jQuery("#summary").append(i + "\n");
                //console.log('<div id="row-' + i + '" class="summary-row" />');

            });
            //alert(summaryJson);
        }
        jQuery(document).ready(function() {
            loadSummary();
            jQuery("#summaryTable").tablesorter();
        });
    </script>

</footer>
</body>

</html>