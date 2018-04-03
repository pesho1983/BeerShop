<?php
require_once 'connect.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

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


if(isset($_POST['submit'])) {
    $query = "UPDATE users
            SET picture=:picture
            WHERE username = '$username'";

    $stmt = $pdo->prepare($query);

    $picture = !empty($_FILES["picture"]["name"])
        ? sha1_file($_FILES['picture']['tmp_name']) . "-" . basename($_FILES["picture"]["name"])
        : "";
    $picture = htmlspecialchars(strip_tags($picture));

    $stmt->bindParam(':picture', $picture);
    if ($picture) {

        // sha1_file() function is used to make a unique file name
        $target_directory = "uploads/";
        $target_file = $target_directory . $picture;
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

        // error message is empty
        $file_upload_error_messages = "";

        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($check !== false) {

        } else {
            $file_upload_error_messages .= "<div>Submitted file is not an image.</div>";
        }

        $allowed_file_types = array("jpg", "jpeg", "png");
        if (!in_array($file_type, $allowed_file_types)) {
            $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG files are allowed.</div>";
        }
        if (file_exists($target_file)) {
            $file_upload_error_messages .= "<div>Image already exists. Try to change file name.</div>";
        }

        if ($_FILES['picture']['size'] > (2048000)) {
            $file_upload_error_messages .= "<div>Image must be less than 2 MB in size.</div>";
        }

        if (!is_dir($target_directory)) {
            mkdir($target_directory, 0777, true);
        }

        if (empty($file_upload_error_messages)) {
            // it means there are no errors, so try to upload the file
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                // it means photo was uploaded
            } else {
                echo "<div class='alert alert-danger'>";
                echo "<div>Unable to upload photo.</div>";
                echo "<div>Update the record to upload photo.</div>";
                echo "</div>";
            }
        } // if $file_upload_error_messages is NOT empty
        else {
            // it means there are some errors, so show them to user
            echo "<div class='alert alert-danger'>";
            echo "<div>{$file_upload_error_messages}</div>";
            echo "<div>Update the record to upload photo.</div>";
            echo "</div>";
        }


        $stmt->execute();
        header("Location: Profile.php");


    }
}
else{

    $avatarQuery = "SELECT id, username, picture FROM users WHERE username = '$username'";
    $avatarStmt = $pdo->prepare( $avatarQuery );

    //$stmt->bindParam(1, $id);

    $avatarStmt->execute();

    // store retrieved row to a variable
    $row = $avatarStmt->fetch(PDO::FETCH_ASSOC);
    $avatar = htmlspecialchars($row['picture'], ENT_QUOTES);

}

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
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
                <p><?php echo $avatar ? "<img src='uploads/{$avatar}' style='width:150px; height:150px;' />" : "<img src='images/avatar.jpg' style='width:300px; height:25%;';>"  ?></p>
            </div>
        </div>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                <div class="row justify-content-md-center mb-1">
                    <div class="col-md-3"></div>
                    <div class=" col-md-auto">
                        <input class="form-control-file" type="file" name="picture" id="image">
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <input class="btn btn-success mb-1" type="submit" value="Upload Image" name="submit">
            </form>

            <form>
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
            </form>

            <form class="well well lg">
                <div class="form-group">
                    <label> Info about me </label>
                    <textarea id="infoAboutMe" name="infoAboutMe" class="form-control" rows="3" maxlength="200"
                              style="resize: none"></textarea>
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
                        <button class="btn btn-warning" type="submit" name="submit">Save Changes</button>
                    </div>
                </div>
            </form>

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


<footer class="container fixed-bottom" >

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