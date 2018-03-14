<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin</title>
      <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
      <link rel="stylesheet" href="css/styles.css">
  </head>


  <body class="text-center">


  <div class="container" style="width: 80%">
    <header>
      <?php
      include ('php/header.php')
      ?>
    </header>

    <div class="container" style="margin-top: 150px">
        <div class="col-sm-4"></div>
        <div class="jumbotron col-sm-4">
          <form action="#">
            <fieldset>
              <legend class="extraPlace"> Please sign in</legend>

              <div class="input-group margin">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
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
              <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
            </fieldset>
          </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
  </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
          crossorigin="anonymous"></script>
  <!--<script>-->
      <!--$(document).ready(function(){-->
          <!--$("button").addClass("btn-danger")-->
          <!--;-->
      <!--});-->
  <!--</script>-->
</html>