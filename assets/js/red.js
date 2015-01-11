$(document).ready(function(){
    $(function () {
        $('.marquee').marquee({
            duration: 15000,
            pauseOnHover: true
        });
    });

    $('.last_news').hover(
        function() {
            var ID = $(this).attr("id");
            $('.last_news_image').hide();
            $('#image_'+ ID).show();
        }
    );

    $('#category_news a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });

    $('.videos > .item').click(function(){
        var href    =   $(this).attr('data-href');
        var title   =   $(this).attr('data-title');
        var ID      =   href.split("watch?v=");
        $('.modal-body').load('video/load/' + ID[1]);
        $('#myModalLabel').html(title);
    });

    $('#video').on('hidden.bs.modal', function () {
        $('.modal-body').empty();
        $('#myModalLabel').html('');
    });
});
