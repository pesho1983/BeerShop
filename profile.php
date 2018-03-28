<?php
require_once 'connect.php';
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}?>
<!doctype html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Dashboard</title>


</head>


<body class="text-center" style="background-color:#eee">

<header class="fixed-top">
    <?php include_once "php_includes/header.php"; ?>
</header>

<div class="container" style="margin-top: 100px; margin-bottom: 150px;">
<div class="col-sm-3"></div>
<div class="col-sm-6" style="text-align:center;">
    <div>
        <p>Profile</p>
        <p><img src="images/avatar.jpg" alt="Avatar" width="25%" height="25%"></p>

    </div>
    <div >
        <form action="upload.php" method="post" enctype="multipart/form-data">

            <p><input type="file" name="file" id="avatar"></p>
            <p><input type="submit" value="Upload Image" name="submit"></p>
        </form>

    </div>
    <div>
        <p>
            <input class="text" type="text"  placeholder="Self description" >
        </p>
    </div>

    <div>
        <form>
            <textarea class="text">Info about me ...</textarea>
        </form>
    </div>
    <div>
        <div class="dropdown">
            <button class=" btn btn-warning">My Favorite Beers</button>
            <div class="dropdown-content">
                <p><img src="images/staropramen.jpg" width="100p" height="150p"></img></p>
                <p><img src="images/staropramen.jpg" width="100p" height="150p"></img></p>
                <p><img src="images/staropramen.jpg" width="100p" height="150p"></img></p>
            </div>
        </div>
    </div>
    <div>
        <h2 class="welcome">My Favorite Beers</h2>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="polaroid">
                <img src="images/heineken.png" >
                <p>Beer 1</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="polaroid">
                <img src="images/heineken.png" >
                <p>Beer 2</p>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="polaroid">
                <img src="images/heineken.png" >
                <p>Beer 3</p>
            </div>
        </div>
    </div>

    <h1>My Favorite Beers</h1>
    <div>
        <div class="btn-group">
            <button><img src="images/heineken.png" ></button>
            <button><img src="images/heineken.png" ></button>
            <button><img src="images/heineken.png" ></button>
        </div>
    </div>
    <div>
        <div class="btn-group row">
            <button class="btn btn-warning shanoClass">Change info</button>
            <button class="btn btn-warning shanoClass">My orders</button>
        </div>
    </div>
    <div>
        <div class="btn-group">
            <button class="btn btn-warning shanoClass" >My wallet</button>
            <button class="btn btn-warning shanoClass">Basket</button>
        </div>
    </div>
</div>
<div class="col-sm-3"></div>
</div>

<footer class="container fixed-bottom">
    <?php include_once "php_includes/footer.php"; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("#profile").addClass('text_shadow');
    });
</script>


</body>

</html>