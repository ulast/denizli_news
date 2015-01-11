$(document).ready(function() {
    $('#news_list').dataTable( {
        "iDisplayLength"    : 10,
        "bProcessing"       : true,
        "bServerSide"       : false,
        "sServerMethod"     : "POST",
        "sAjaxSource"       : "administrator/news/datatable_list"
    });
} );

$('#news_search').submit(function(){
    $('#news').html('<img src="assets/img/loader.gif">');
    $.ajax({
        type: "POST",
        url: "administrator/news/view_news",
        data: $(this).serializeArray(),
        success: function (sonuc) {
            $('#news').html(sonuc);
        }
    });
    return false;
});

$( "#source" ).change(function() {
    var val =   $(this).val();
    if(val == 'hizmetgazetesi')
    {
        $('#cat').load('administrator/news/hizmet_cat');
    }
    else
    {
        $('#cat').empty();
    }
});