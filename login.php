<?php
require 'connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" media="screen"
          href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body class="text-center" style="background-color:#eee">
<header>
    <?php include_once "php_includes/header.php"; ?>
</header>

<article style="position: relative; margin-top: 250px">
    <?php if (isset($_SESSION['username'])): ?>
        <h2 style="color:green">Registration completed successfully, <?= htmlspecialchars($_SESSION['username']); ?>.Please Login in :) and buy some BEER.</h2>
    <?php endif; ?>
    <?php unset($_SESSION['username']); ?>

    <div class="col-sm-5">
    </div>
    <div class="col-sm-2">

        <form action="#">
            <fieldset>
                <legend class="extraPlace"> Please sign in</legend>

                <div class="input-group margin">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                </div>

                <div class="input-group margin">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>

                <div class="checkbox alignLeftContent">
                    <label>
                        <input type="checkbox" value="remember-me" name="remember"> Remember me
                    </label>
                </div>
                <button class="btn btn-md btn-success btn-block" type="submit">Sign in</button>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-5"></div>
</article>

<footer class="container fixed-bottom">
    <?php include_once "php_includes/footer.php"; ?>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("#login").addClass('text_shadow');
    });
</script>

</body>
</html>