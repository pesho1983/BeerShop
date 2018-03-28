<!doctype html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>
    <link type="text/css" rel="stylesheet" media="screen"
          href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="text-align:center; margin-top: 50px">
        <div class="row">
            <div class="col-lg-12">
                <h2>Profile</h2>
                <p><img src="images/avatar.jpg" alt="Avatar" width="10%" height="10%"></p>
            </div>
        </div>
        <div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="row justify-content-md-center mb-1">
                    <div class="col-md-3">tr</div>
                    <div class=" col-md-auto">
                        <input class="form-control-file" type="file" name="file" id="file">
                    </div>
                    <div class="col-md-1">ty</div>
                </div>
<!--                <input class="btn btn-success mb-1" type="submit" value="Upload Image" name="submit">-->
                <div class="border rounded my-5 py-3 ">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                    an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries,
                </div>
                <div class="form-group">
                    <label> Info about me </label>
                    <textarea id="infoAboutMe" name="infoAboutMe" class="form-control" rows="5"></textarea>
                </div>



            </form>

        </div>
        <div>
            <h2 class="welcome mt-5 ">My Favorite Beers</h2>
        </div>
        <div class="row justify-content-md-center my-3 py-3">
            <div class="polaroid rounded col-sm-4">
                <div class="col-md">
                    <img src="images/heineken.png">
                    <p>Beer 1</p>
                </div>
            </div>
            <div class="polaroid rounded col-sm-4">
                <div class="col-md">
                    <img src="images/heineken.png">
                    <p>Beer 2</p>

                </div>
            </div>
            <div class="polaroid rounded col-sm-4 ">
                <div class="col-md">
                    <img src="images/heineken.png">
                    <p>Beer 3</p>
                </div>
            </div>
        </div>
        <div>
            <div class="row my-3">
                <button class="btn btn-warning shanoClass">Save Changes</button>
            </div>
        </div>
        <div class="justify-content-md-center row my-3">
            <button class="btn btn-warning mx-3">Change info</button>
            <button class="btn btn-warning mx-3">My orders</button>
        </div>
        <div class="justify-content-md-center row my-3">
            <button class="btn btn-warning mx-3">My wallet</button>
            <button class="btn btn-warning mx-3">Basket</button>
        </div>
    </div>
    <div class="col-sm-1"></div>
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