<?php
require_once 'connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
} ?>
<?php
$username = $_SESSION['user'];

$sql = "SELECT
            username,
            first_name,
            age,
            picture
        FROM
            users
        WHERE
             username = ?

         ";

$stmt = $pdo->prepare($sql);

$stmt->execute([$username]);

$user = $stmt->fetch();

?>

<!doctype html>
<html lang="en">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>

    <title>User Profile</title>

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

<header class="fixed-top">
    <?php include_once "php_includes/header.php"; ?>
</header>

<div class="container" style="margin-top: 100px; margin-bottom: 150px;">
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="text-align:center; margin-top: 50px">
        <div class="row">
            <div id="avatarDiv" class="col-lg-12">
                <h3 class="font-weight-bold">Profile</h3>
                <p><img id="avatar" src="<?= $user['picture'] != null ? $user['picture'] : "images/avatar.jpg"; ?>" alt="Avatar"  "></p>
            </div>
        </div>
        <div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="row justify-content-md-center mb-1">
                    <!--                    <div class="col-md-3">tr</div>-->
                    <div class=" col-md-auto">
                        <label class="btn btn-warning btn-md justify-content-md-center">
                            Browse<input type="file" name="file" id="file" style="display: none">
                        </label>
                    </div>
                    <!--                    <div class="col-md-1">ty</div>-->
                </div>
                <!--                <input class="btn btn-success mb-1" type="submit" value="Upload Image" name="submit">-->
                <div class="border rounded my-5 pt-4 pb-3" style="width: 100%">
                    <div class="row justify-content-md-center ">
                        <p class="col-lg-6 text-right px-2"> User name: </p>
                        <p class="col-lg-6 text-left px-2"> <?= $user['username'] ?> </p>
                    </div>
                    <div class="row justify-content-md-center">
                        <p class="col-lg-6 text-right px-2"> First name: </p>
                        <p class="col-lg-6 text-left px-2"> <?= $user['first_name'] ?> </p>
                    </div>
                    <div class="row justify-content-md-center">
                        <p class="col-lg-6 text-right px-2"> Age: </p>
                        <p class="col-lg-6 text-left px-2"> <?= $user['age'] ?> </p>
                    </div>
                </div>
                <div class="form-group">
                    <label> Info about me </label>
                    <textarea id="infoAboutMe" name="infoAboutMe" class="form-control" rows="3" maxlength="200"
                              style="resize: none"></textarea>
                </div>
            </form>
        </div>
        <div>
            <h3 class="welcome mt-5 font-weight-bold">My Favorite Beers</h3>
        </div>
        <div class="row justify-content-md-center my-3 py-3">
            <div class="polaroid rounded col-sm-4 border" style="box-shadow: 3px 3px 3px rgba(0,0,0,0.38)">
                <div class="col-md py-4">
                    <img src="images/qh_beer.png">
                    <p>Beer 1</p>
                </div>
            </div>
            <div class="polaroid rounded col-sm-4 border " style="box-shadow: 3px 3px 3px rgba(0,0,0,0.38)">
                <div class=" col-md py-4">
                    <img src="images/qh_beer.png">
                    <p>Beer 2</p>
                </div>
            </div>
            <div class=" polaroid rounded col-sm-4 border" style="box-shadow: 3px 3px 3px rgba(0,0,0,0.38)">
                <div class="col-md py-4">
                    <img src="images/qh_beer.png">
                    <p>Beer 3</p>
                </div>
            </div>
        </div>
        <div>
            <div class="row my-3">
                <button class="btn btn-warning ">Save Changes</button>
            </div>
        </div>

        <div class="justify-content-md-center row my-3">
            <a href="#" class="btn btn-warning mx-3 col-lg-2">Change info</a>
            <a href="#" class="btn btn-warning mx-3 col-lg-2">My orders</a>
        </div>
        <div class="justify-content-md-center row my-3">
            <a href="#" class="btn btn-warning mx-3 col-lg-2">My wallet</a>
            <a href="#" class="btn btn-warning mx-3 col-lg-2">Basket</a>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>


<footer class="container fixed-bottom">

    <?php include_once "php_includes/footer.php"; ?>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#profile").addClass('text_shadow');
    });
</script>


</body>

</html>