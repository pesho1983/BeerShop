
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../../../Vendor/css/styles.css" rel="stylesheet">

  </head>

  <body class="text-center" style="background-color:#eee">
    <header>
      <?php include_once "../beer/header.php"; ?>
    </header>       

    <article style="position: relative; margin-top: 200px">
            <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="#">
                <fieldset>
                    <legend class="extraPlace">Register</legend>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Username" maxlength="8" minlength="4">

                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" maxlength="15" minlength="8">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control"  name="confirmPass" type="password" placeholder="Confirm Password">

                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="firstName" name="firstName" type="text" placeholder="First Name">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Last Name">
                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input class="form-control" id="email" name="email" type="email" placeholder="Email">
                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                        <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone Number" maxlength="10" minlength="10">
                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="form-control" id="address" name="address" type="text" placeholder="Address">
                    </div>

                    <div class="input-group margin">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        <input class="form-control" id="age" name="age" type="number" placeholder="Age" min="18">
                    </div>

                    <div class="checkbox alignLeftContent">
                        <label>
                            <input type="checkbox" name="agreement" value="1"> I have read and agree to the <a
                            href="https://www.un.org/Depts/ptd/terms-and-conditions-agreement">Terms and Conditions</a>
                        </label><br>
                        <label>
                            <input type="checkbox" name="gdpr" value="1"> GDPR Agreement
                        </label>
                    </div>

                    <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
                </fieldset>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </article>

    <footer>
      <?php include_once "../beer/footer.php"; ?>
    </footer>
  
  </body>
</html>