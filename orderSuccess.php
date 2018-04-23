<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <style>
        .container{width: 100%;padding: 50px;}
        p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<header class="fixed-top">
    <?php include_once "php_includes/header.php"; ?>
</header>
<div class="container" style="margin-top: 100px;">
    <h1>Order Status</h1>
    <p style="text-align: center;">Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
</div>
<footer class="footer navbar-fixed-bottom">
    <?php include_once "php_includes/footer.php"; ?>
</footer>
</body>
</html>