<!DOCTYPE HTML>
<html>
<head>
    <title>Beers Index</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet">


</head>
<body>
<header>
    <?php include_once "php_includes/header.php"; ?>
</header>

<!-- container -->
<div class="col-sm-2"></div>
<div class="container col-sm-8" style="margin-top: 150px;">

    <div class="page-header">
        <h1>Beers</h1>
    </div>

    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    // if it was redirected from delete.php
    if($action=='deleted'){
        echo "<div class='alert alert-success'>Record was deleted.</div>";
    }

    $query = "SELECT id, name, description, price FROM products ORDER BY id ASC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();


    $num = $stmt->rowCount();


    echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";


    if($num>0){
        echo "<div class='col-12'>";
        echo "<table class='table table-hover table-responsive table-bordered col-sm-12'>";
        echo "<tr>";
        echo "<th class='col-sm-1'>ID</th>";
        echo "<th class='col-sm-2'>Name</th>";
        echo "<th class='col-sm-5'>Description</th>";
        echo "<th class='col-sm-1'>Price</th>";
        echo "<th class='col-sm-3'>Action</th>";
        echo "</tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$name}</td>";
            echo "<td>{$description}</td>";
            echo "<td>&#36;{$price}</td>";
            echo "<td>";
            echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>View</a>";
            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
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
    // confirm record deletion
    function delete_user( id ){
        var answer = confirm('Are you sure?');
        if (answer){
            window.location = 'delete.php?id=' + id;
        }
    }
</script>

</body>
</html>