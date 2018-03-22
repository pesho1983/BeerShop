$(document).ready(function () {
        // active page shadow
        $("#register").addClass('text_shadow');


        // Initialize form validation on the registration form.
        // It has the name attribute "registration"


        // $('#register_submit').click(function (e) {
        //     e.preventDefault();
        //     if ($("#registration").valid()) {
        //         alert('valid!');
        //     } else {
        //         alert('invalid!');
        //     }
        // });


        // Custom Method for pass validation, only number of chars
        $.validator.addMethod('strongPass', function(value, element){
            return this.optional(element) || value.length >= 8 && value.length <= 15;
        }, 'Your password must be between 8 and 15 characters');

        // Custom method for phone validation
        $.validator.addMethod('telephone', function(value, element){
            return this.optional(element) || value.length === 8;
        }, 'Your phone number must be 10 digits');

        //
        $.validator.setDefaults({
            highlight: function (element) {
                $(element).closest('.input-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.input-group').removeClass('has-error');
            }

        });

        $('#registration').validate({
            rules: {
                firstName: {
                    required: true,
                    nowhitespace: true,
                    lettersonly: true
                },

                lastName: {
                    required: true,
                    nowhitespace: true,
                    lettersonly: true
                },

                age: {
                    required: true
                },

                address: {
                    required: true
                },

                email: {
                    required: true,
                    email: true
                },

                password: {
                    required: true,
                    strongPass: true
                },

                confirmPass: {
                    required: true,
                    equalTo: "#password"
                },

                username: {
                    alphanumeric: true,
                    length: {
                        minimum: 4,
                        maximum: 8
                    }

                },

                phone: {
                    required: true,
                    telephone: true
                }

            },

            messages: {
                username: {
                    alphanumeric: "Cannot contain special symbols",
                    length: {
                        minimum: "At least 4 symbols required",
                        maximum: "No more than 8 symbols allowed"
                    }

                },
                // firstName: "Please enter your firstname",
                // lastName: "Please enter your lastname",
                age: "Please enter your age",
                // phone: "Pleae enter your phone",
                address: "Please enter your address",
                password: {
                    required: "Please provide a password"
                },
                email:{
                    required: "Please enter an email address",
                    email: "Please enter a <i>valid email</i> address"
                }


            },

            submitHandler: function (form) {
                $(form).submit();

            }
        });
    });
