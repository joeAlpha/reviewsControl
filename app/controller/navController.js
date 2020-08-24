$(document).ready(function(e) {
    $("#returnHome").on("click", function(e) {
        e.preventDefault();

        $.ajax({ 
            type: 'POST',
            url: 'app/model/includeReviewTable.php',
            data: '',
            success: function(result) {
                if (result != 0) {
                    // $('#tableContainer').remove();
                    // $('#mainSection').remove();
                    $('#mainSection').html(result);
                    console.log("o k");
                } else console.error('');
            }
        });
    });
});


/* jQuery("#returnHome").on("click", function(e) {
    var href = $(this).attr('href');
    e.preventDefault();
    jQuery.ajax({
        async    : false,
        dataType : "json",
        url      : "app/model/includeReviewTable.php",
        success  : function(result) {
            if(result) {
                $('#mainSection').remove();
                $('#mainSection').html(result);
                console.log("o k");
            }
        }
    });
}); */