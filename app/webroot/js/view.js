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

function initLoadExpenseByCategoryAndDate() {
    jQuery(".category").click(function() {
        $categoryElement = jQuery(this);
        var topCatID = $categoryElement.parent().attr('id');
        var numSubCats = jQuery("#"+topCatID+" > div").size();
        //alert(topCatID + ":" + numSubCats);
        if (numSubCats == 0) {
            loadExpenseSummaryForCategoryByDate($categoryElement)
        } else {
            jQuery("#"+topCatID+" > div").toggle('show');
        }
    });
}
function loadExpenseSummaryForCategoryByDate($categoryElement) {
    var category = $categoryElement.parent().children(".category").text();
    var yyyymm = $categoryElement.parent().children(".date").text();
    var expenses = getExpenseSummaryForCategoryByDate(category, yyyymm);
    jQuery.each(expenses, function(i, item) {
        console.log(item);
        var subCatDiv = yyyymm + '-' +  category + '-' + item.subCategory + '-' + i;
        $categoryElement.parent().append('<div id="' + subCatDiv + '"/>');
        jQuery("#"+subCatDiv).append('<span class="subcat">' + item.subCategory + '</span>');
        jQuery("#"+subCatDiv).append('<span class="subcatTotal">' + item.total + '</span>');
    });
}


jQuery(document).ready(function() {
    loadSummary();
    initLoadExpenseByCategoryAndDate();
});
