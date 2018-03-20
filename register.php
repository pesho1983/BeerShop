
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet">

  </head>

  <body class="text-center" style="background-color:#eee">
    <header>
      <?php include_once "php_includes/header.php"; ?>
    </header>

    <article style="position: relative; margin-top: 150px">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="#">
                <fieldset>
                    <legend class="extraPlace">Register</legend>

                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Username *" maxlength="8" minlength="4">

                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password *" maxlength="15" minlength="8">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control"  name="confirmPass" type="password" placeholder="Confirm Password *">

                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="firstName" name="firstName" type="text" placeholder="First Name *">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Last Name *">
                    </div>

                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email *">
                    </div>

                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone Number *" maxlength="10" minlength="10">
                    </div>

                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="form-control" id="address" name="address" type="text" placeholder="Address *">
                    </div>

                    <div class="input-group margin col-lg-6">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        <input class="form-control" id="age" name="age" type="number" placeholder="Age *" min="18">
                    </div>

                    <div class="checkbox alignLeftContent">
                        <label>
                            <input type="checkbox" name="agreement" value="1"> I have read and agree to the <a
                                    href="https://www.un.org/Depts/ptd/terms-and-conditions-agreement">Terms and Conditions *</a>
                        </label><br>
                        <label>
                            <input type="checkbox" name="gdpr" value="1"> GDPR Agreement *
                        </label>
                        <div class="margin"><span >* &nbsp;&nbsp; Mandatory fields</span></div>
                    </div>

                    <button class="btn btn-success " type="submit">Register</button>
                </fieldset>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </article>

    <footer class="container fixed-bottom">
      <?php include_once "php_includes/footer.php"; ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#register").addClass('text_shadow');
        });
    </script>

  </body>
</html>