<?php

/**
 * Include our MySQL connection.
 */
require 'connect.php';
$username = '';
$firstName = '';
$lastName = '';
$address = '';
$email = '';
$age = '';
$phone = '';
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
            throw new Exception("User name must not contain special characters.");
        }
        //Validation password
        if (strlen($password) < 8 || strlen($password) > 15 || empty($password)) {
            throw new Exception("Password must be between 8 an 15 symbols.");
        }
        $patern = '#^(?=(.*\d){2,})(?=.*[A-Z]{1,})(?=.*[a-zA-Z]{2,})(?=.*[!@~#$%^&?]{1,})[0-9a-zA-Z!@~#?$^%&`]+$#';
        if (preg_match($patern, $password)) {
            throw new Exception("Password must contains at least 1 special symbol, 1 uppercase letter, 2 numbers and 3 letters.");
        }
        if ($password != $confirmPass) {
            throw new Exception("Passwords do not match.");
        }
        //Validation email
        $patern = '#^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$#';
        if (!preg_match($patern, $email)) {
            throw new Exception("Please fill valid email.");
        }
        //Validation phone
        if (strlen($phone) != 10) {
            throw new Exception("Phone must be 10 digits.");
        }
        //Validation age
        if (intval($age) < 18) {
            throw new Exception("You must be at least 18 years old");
        }
        //Validation check
        if (!isset($_POST['gdpr'])) {
            throw new Exception("You must agree with GDPR.");
        }

        if (!isset($_POST['agreement'])) {
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" media="screen"
          href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet">
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

<article style="position: relative; margin-top: 100px">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form id="registration" action="#" method="post" novalidate="novalidate">
            <fieldset>
                <legend class="extraPlace center">Register</legend>
                <?php if ($error) : ?>
                    <h2 style="color:red">   <?= $error ?></h2>
                <?php endif; ?>
                <?php $error = ''; ?>
                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control" id="username" name="username" type="text" value="<?= $username != null ? $username : ""; ?>" placeholder="Username"
                           maxlength="8" minlength="4" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>

                <div class="container col-md-12">
                    <div class="row">
                        <div class="input-group margin col-md-6">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" id="password" name="password" type="password" placeholder="Password"  maxlength="15" minlength="8" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                        </div>

                        <div class="input-group margin col-md-6">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" id="confirmPass" name="confirmPass" type="password" placeholder="Confirm Password" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                        </div>
                    </div>
                </div>

                <div class="container col-md-12">
                    <div class="row">
                        <div class="input-group margin col-md-6">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" id="firstName" name="firstName" type="text" value="<?= $firstName != null ? $firstName : ""; ?>" placeholder="First Name" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                        </div>

                        <div class="input-group margin col-md-6">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" id="lastName" name="lastName" type="text" value="<?= $lastName != null ? $lastName : ""; ?>" placeholder="Last Name " required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                        </div>
                    </div>
                </div>

                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input class="form-control" id="email" name="email" type="email" value="<?= $email != null ? $email : ""; ?>" placeholder="Email" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>

                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                    <input class="form-control" id="phone" name="phone" type="number" value="<?= $phone != null ? $phone : ""; ?>" maxlength="10" placeholder="Phone Number" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>

                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input class="form-control" id="address" name="address" type="text" value="<?= $address != null ? $address : ""; ?>" placeholder="Address" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>

                <div class="input-group margin col-lg-6">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    <input class="form-control" id="age" name="age" type="number" value="<?= $age != null ? $age : ""; ?>" placeholder="Age" min="18" required>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-heatr form-control-feedback"><div class="simple-linear"> </div></i></span>
                </div>

                <div class="checkbox alignLeftContent">
                    <label>
                        <input type="checkbox" name="agreement" value="1" required> I have read and agree to the <a href="https://www.un.org/Depts/ptd/terms-and-conditions-agreement">Terms and Conditions
                            <img src="images/heart.png"></a>
                    </label><br>
                    <label>
                        <input type="checkbox" name="gdpr" value="1" required> GDPR Agreement <img src="images/heart.png">
                    </label>
                    <div class="margin"><img src="images/heart.png"> &nbsp;Mandatory field</div>
                </div>

                <input id="register_submit" class="btn btn-success " type="submit" name="register" value="Register">
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
<script rel="script" type="text/javascript" src="js/validationFE.js"></script>

</body>

</html>