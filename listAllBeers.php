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
    <title>Beers Index</title>

    <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" type="text/css">


</head>
<body>
<header>
    <?php include_once "php_includes/header.php"; ?>
</header>

<!-- container -->
<div class="col-sm-2"></div>
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-md-center">
        <div class="page-header col-lg-10 text-center">
            <h1>Beers</h1>
        </div>
    </div>
    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    // if it was redirected from delete.php
    if($action=='deleted'){
        echo "<div class='alert alert-success'>Record was deleted.</div>";
    }

    $query = "SELECT id, name, description, price, quantity FROM products ORDER BY id ASC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();


    $num = $stmt->rowCount();


    echo "    
           <div class='row'>
            <div class='col-lg-1'></div>
            <a href='addBeer.php' class='btn btn-primary mb-3 ml-4'>Create New Product</a>
          </div>";


    if($num>0){
        echo "<div class='row justify-content-md-center'>";
//            echo "<div class='col-lg-1'></div>";
            echo "<div class='table-responsive col-lg-10'>";
                echo "<table class='table table-hover table-responsive table-fixed'>";
                echo "<thead>";
                    echo "<tr class='bg-warning'>";
                //        echo "<th class='col-sm-1'>ID</th>";
                        echo "<th class='col-sm-2'>Name</th>";
                        echo "<th class='col-sm-4'>Description</th>";
                        echo "<th class='col-sm-1'>Price</th>";
                        echo "<th class='col-sm-1'>Quantity</th>";
                        echo "<th class='col-sm-4 text-center'>Action</th>";
                    echo "</tr>";
                echo "</thead>";
                    echo "<tbody>";
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row);

                        echo "<tr>";
                //            echo "<td>{$id}</td>";
                            echo "<th class='align-middle'>{$name}</th>";
                            echo "<td class='align-middle ' >{$description}</td>";
                            echo "<td class='align-middle'>{$price} lv.</td>";
                            echo "<td class='align-middle'>{$quantity}</td>";
                            echo "<td class='align-middle'>";
                                echo "<div class='row justify-content-md-center align-middle'>";
                        //          echo "<a href='read_one.php?id={$id}' class='btn btn-info mr-1'>View</a>";
                                    echo "<a href='update.php?id={$id}' class='btn btn-success mx-4 my-1 col-lg-4'>Edit</a>";
                                    echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger mx-4 my-1 col-lg-4'>Delete</a>";
                                echo "</div>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                echo "</table>";
            echo "</div>";
//            echo "<div class='col-lg-1'></div>";
        echo "</div>";
    }

    else{
        echo "<div class='alert alert-danger'>No records found.</div>";
    }
    ?>

</div>
<footer class="footer navbar-fixed-bottom">
    <?php include_once "php_includes/footer.php"; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function() {
        $("#BeerIndex").addClass('text_shadow');
    });
    function delete_user( id ){
        var answer = confirm('Are you sure?');
        if (answer){
            window.location = 'delete.php?id=' + id;
        }
    }

</script>

</body>
</html>
