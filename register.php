<?php

/**
 * Include our MySQL connection.
 */
require 'connect.php';

$error = '';
try {
//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
    if (isset($_POST['register'])) {

        $form = $_POST;
        $username = $form['username'];
        $password = $form['password'];
        $confirmPass = $form['confirmPass'];
        $firstName = $form['firstName'];
        $lastName = $form['lastName'];
        $address = $form['address'];
        $email = $form['email'];
        $age = $form['age'];
        $phone = $form['phone'];
//Retrieve the field values from our registration form.
        $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
        $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

//TO ADD: Error checking (username characters, password length, etc).
//Basically, you will need to add your own error checking BEFORE
//the prepared statement is built and executed.
        //Validations username
        if (strlen($username) < 4 || strlen($username) > 8 || empty($username)) {
            throw new Exception("User name must be between 4 an 8 symbols.");
        }
        $patern = '#^[A-Za-z0-9]+$#';
        if (!preg_match($patern, $username)) {
            throw new Exception("User name must not contains Special characters.");
        }
        //Validation password
        if (strlen($password) < 8 || strlen($password) > 15 || empty($password)) {
            throw new Exception("Password must be between 8 an 15 symbols.");
        }
        $patern = '#^(?=(.*\d){2,})(?=.*[A-Z]{1,})(?=.*[a-zA-Z]{2,})(?=.*[!@~#$%^&?]{1,})[0-9a-zA-Z!@~#?$^%&`]+$#';
        if (preg_match($patern, $password)) {
            throw new Exception("Password must contains at least 1 special symbol at least 1 uppercase letter at least 2 numbers at least 3 letters.");
        }
        if ($password != $confirmPass) {
            throw new Exception("Password do not match.");
        }

         $patern = '#^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$#';
         //Validation email
         if (!preg_match($patern, $email)) {
             throw new Exception("Please fill valid email.");
         }

        if (strlen($phone) != 10) {
            throw new Exception("Phone must be 10 numbers.");
        }

        if($_POST('age') > 18){
             throw new Exception("You must be at least 18 years old");
        }

        if(!isset($_POST['gdpr']))
        {
            throw new Exception("You must agree with GDPR.");
        }

        if(!isset($_POST['agreement']))
        {
            throw new Exception("You must agree with the terms and conditions.");
        }


//Now, we need to check if the supplied username already exists.

//Construct the SQL statement and prepare it.
        $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);

//Bind the provided username to our prepared statement.
        $stmt->bindValue(':username', $username);

//Execute.
        $stmt->execute();

//Fetch the row.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

//If the provided username already exists - display error.
//TO ADD - Your own method of handling this error. For example purposes,
//I'm just going to kill the script completely, as error handling is outside
//the scope of this tutorial.
        if ($row['num'] > 0) {
            throw new Exception('That username already exists!');
        }
        $sql = "SELECT COUNT(email) AS test FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);

//Bind the provided username to our prepared statement.
        $stmt->bindValue(':email', $email);

//Execute.
        $stmt->execute();

//Fetch the row.
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

//If the provided username already exists - display error.
//TO ADD - Your own method of handling this error. For example purposes,
//I'm just going to kill the script completely, as error handling is outside
//the scope of this tutorial.
        if ($result['test'] > 0) {
            throw new Exception('That email already exists!');
        }
//Hash the password as we do NOT want to store our passwords in plain text.
        $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

//Prepare our INSERT statement.
//Remember: We are inserting a new row into our users table.
        $sql = "INSERT INTO users (username, password, email, phone, address, first_name, last_name, age) 
VALUES (:username, :password,:email, :phone, :address, :first_name, :last_name, :age)";
        $stmt = $pdo->prepare($sql);

//Bind our variables.
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $passwordHash);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':first_name', $firstName);
        $stmt->bindValue(':last_name', $lastName);
        $stmt->bindValue(':age', $age);

//Execute the statement and insert the new account.
        $result = $stmt->execute();

//If the signup process is successful.
        if ($result) {
            $_SESSION['username'] = $firstName;

            header('Location: login.php');

        }

    }
} catch (Exception $exception) {
    $error = $exception->getMessage();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>


    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet" >
<!--      <style type="text/css" rel="stylesheet">-->
<!--          placeholder: after {-->
<!--              content:"*";-->
<!--              color:red;-->
<!--          }-->
<!--      </style>-->
 </head>


<body class="text-center" style="background-color:#eee">
<header>
    <?php include_once "php_includes/header.php"; ?>
</header>

<article style="position: relative; margin-top: 150px">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form id="registration" novalidate="novalidate">
            <fieldset>
                <legend class="extraPlace center">Register</legend>
                <?php if ($error) : ?>
                    <h2 style="color:red">   <?= $error ?></h2>
                <?php endif; ?>
                <?php $error = ''; ?>
                <div>
                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Username *"
                               maxlength="8" minlength="4" required>

                    </div>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password *"
                               maxlength="15" minlength="8" required>

                <div class="container col-md-12">
                <div class="row">
                    <div class="input-group margin col-md-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password *"
                           maxlength="15" minlength="8" required>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" id="confirmPass" name="confirmPass" type="password" placeholder="Confirm Password *" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                    </div>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <div class="input-group margin col-md-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" id="confirm_password" name="confirmPass" type="password" placeholder="Confirm Password *" required>
                    </div>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="firstName" name="firstName" type="text" placeholder="First Name *" required>
                </div>

                <div class="container col-md-12">
                <div class="row">
                    <div class="input-group margin col-md-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" id="firstName" name="firstName" type="text" placeholder="First Name *" required>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Last Name *" required>
                    </div>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                    </div>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <div class="input-group margin col-md-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Last Name *" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                    </div>

                </div>
                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email *" required>
                    </div>
                </div>

                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email *" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>
                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input class="form-control" id="phone" name="phone" type="text" maxlength="10" placeholder="Phone Number *" required>
                    </div>

                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                    <input class="form-control" id="phone" name="phone" type="number" maxlength="10" placeholder="Phone Number *" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>
                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="form-control" id="address" name="address" type="text" placeholder="Address *" required>
                    </div>

                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input class="form-control" id="address" name="address" type="text" placeholder="Address *" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>
                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        <input class="form-control" id="age" name="age" type="number" placeholder="Age *" min="18" required>
                    </div>

                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    <input class="form-control" id="age" name="age" type="number" placeholder="Age *" min="18" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>
                    <div class="checkbox alignLeftContent">
                        <label>
                            <input type="checkbox" name="agreement" id="agreement" value="1" > I have read and agree to the <a
                                    href="https://www.un.org/Depts/ptd/terms-and-conditions-agreement">Terms and Conditions
                                *</a>
                        </label><br>
                        <label>
                            <input type="checkbox" name="gdpr" id="gdpr" value="1" > GDPR Agreement *
                        </label>
                        <div class="margin"><span>* &nbsp;&nbsp; Mandatory fields</span></div>
                    </div>

                <div class="checkbox alignLeftContent">
                    <label>
                        <input type="checkbox" name="agreement" value="1" required> I have read and agree to the <a
                                href="https://www.un.org/Depts/ptd/terms-and-conditions-agreement">Terms and Conditions
                            <img src="images/heart.png"></img></a>
                    </label><br>
                    <label>
                        <input type="checkbox" name="gdpr" value="1" required> GDPR Agreement <img src="images/heart.png"></img>
                    </label>
                    <div class="margin"><img src="images/heart.png"></img> Mandatory field</div>
                    <input id="register_submit" class="btn btn-success " type="submit" name="register" value="Register">
                </div>
                <div ></div>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-4"></div>
</article>

<footer class="container fixed-bottom">
    <?php include_once "php_includes/footer.php"; ?>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>


<script type="text/javascript">
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
    })
</script>

<!--<script type="text/javascript">-->
<!--    var password = document.getElementById("password")-->
<!--  , confirm_password = document.getElementById("confirm_password");-->
<!---->
<!--function validatePassword(){-->
<!--  if(password.value != confirm_password.value) {-->
<!--    confirm_password.setCustomValidity("Passwords Don't Match");-->
<!--  } else {-->
<!--    confirm_password.setCustomValidity('');-->
<!--  }-->
<!--}-->
<!---->
<!--password.onchange = validatePassword;-->
<!--confirm_password.onkeyup = validatePassword;-->
<!---->
<!--</script>-->

</body>

</html>