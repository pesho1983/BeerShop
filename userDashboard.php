<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/test.css">
</head>


<body class="text-center" style="background-color:#eee">

<header>
    <?php include_once "php_includes/header.php"; ?>
</header>

<article style="position: relative; margin-top: 100px">

    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="text-align:center;">
        <div >
            <p>Profile</p>
            <p><img src="images/avatar.jpg" alt="Avatar" width="10%" height="10%"></p>

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
        <div class="col-sm-4"></div>
</article>
</body>
</html>