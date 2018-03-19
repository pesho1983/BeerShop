
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login</title>

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

    <article style="position: relative; margin-top: 250px">
        <div class="col-sm-5"></div>
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
              <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
            </fieldset>
          </form>
        </div>
        <div class="col-sm-5"></div>
    </article>

    <footer>
      <?php include_once "../beer/footer.php"; ?>
    </footer>
  </body>
</html>