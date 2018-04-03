<?php
require_once 'connect.php';
if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {

}
else{
    header('HTTP/1.0 401 Unauthorized');
    echo 'You are not authorized to be here!';
    exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Create a new beer</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet">

</head>
<body>
<header>
    <?php include_once "php_includes/header.php"; ?>
</header>
<!-- container -->
<div class="container" style="margin-top: 150px;">

    <div class="page-header">
        <h1>Create Product</h1>
    </div>

    <?php
    if($_POST){

        try{


            $query = "INSERT INTO products
            SET name=:name, description=:description,
                price=:price, quantity=:quantity, picture=:picture";

            $stmt = $pdo->prepare($query);

            $name=htmlspecialchars(strip_tags($_POST['name']));
            $description=htmlspecialchars(strip_tags($_POST['description']));
            $price=htmlspecialchars(strip_tags($_POST['price']));
            $quantity=htmlspecialchars(strip_tags($_POST['quantity']));

            $picture=!empty($_FILES["picture"]["name"])
                ? sha1_file($_FILES['picture']['tmp_name']) . "-" . basename($_FILES["picture"]["name"])
                : "";
            $picture=htmlspecialchars(strip_tags($picture));


            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':picture', $picture);

            if($picture){
                // echo "<div class='alert alert-success'>Record was saved.</div>";
                // sha1_file() function is used to make a unique file name
                $target_directory = "beers/";
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


                if (($_FILES['picture']['size'] >= (5048000)) || ($_FILES["picture"]["size"] == 0)) {
                    $file_upload_error_messages .= "<div>Image must be less than 5 MB in size.</div>";
                }


                if (!is_dir($target_directory)) {
                    mkdir($target_directory, 0777, true);
                }

                if (empty($file_upload_error_messages)) {
                    if(move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)){
                        $stmt->execute();
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
            }else{
                echo "<div class='alert alert-danger'>Unable to save record.</div>";
            }

        }

            // show error
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
    }
    ?>
    <div class="col-sm-12">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Name</td>
                <td><input type='text' name='name' class='form-control' required/></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name='description' class='form-control' required></textarea></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type='number' min=0 name='price' class='form-control'  required/></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type='number' min=0 name='quantity' class='form-control'  required/></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input class="btn btn-default" type="file" name="picture" required /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Save' class='btn btn-primary' />
                    <a href='listAllBeers.php' class='btn btn-danger'>Back to read products</a>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <div class="col-sm-2"></div>
    </div>

</div> <!-- end .container -->

<footer class="footer navbar-fixed-bottom">
    <?php include_once "php_includes/footer.php"; ?>
</footer>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $("#addBeer").addClass('text_shadow');
    });
</script>

</body>
</html>