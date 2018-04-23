$(document).ready(function () {


    $('#search_id').on('keyup', function (e) {
        $('#main_container').hide();
        var text = $(this).value();

        $.ajax({
            type: 'GET',
            url: 'search.php',
            data: 'txt=' + text,
            success: function (data) {
                $('#container_search').html(data).show();
            }

        })

    })

});