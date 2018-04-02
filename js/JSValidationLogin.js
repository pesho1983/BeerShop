$(document).ready(function () {

    $("#login").addClass('text_shadow');

    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function(element){
            $(element).closest('.input-group').addClass('has-error');
        },
        unhighlight: function(element){
            $(element).closest('.input-group').removeClass('has-error');
        },
        errorPlacement: function (error, element) {

                error.insertAfter(element.parent());
                $('.help-block').addClass('text-danger');
        }
    });

    $('#loginForm').validate({
        rules: {
            username: {
                required: true
            },

            password: {
                required: true
            }
        }
    });

});

