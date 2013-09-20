var baseUrl = "http://localhost/expensetracker"


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

function getExpensesByCategoryAndDate(category, yyyymm) {
    var data = {
    }
    var returndata = {}

    jQuery.ajax({
        async: false,
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/getExpenses/'+ yyyymm + '/' + category ,
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