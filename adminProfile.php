
?>
<!doctype html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>


</head>


<body class="text-center" style="background-color:#eee">

<header class="fixed-top">
    <?php include_once "php_includes/header.php"; ?>
</header>

<div class="container col-sm-12" style="margin-top: 100px; margin-bottom: 150px;">
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="text-align:center; margin-top: 50px">
        <div class="row">
            <div id="avatarDiv" class="col-lg-12">
                <h3 class="font-weight-bold">Admin panel</h3>                
            </div>

    <div class="col-lg-12" style="margin-top: 5%">
            <div class="row justify-content-md-center my-3 py-3">
                <div class="col-sm-4"><a href="addBeer.php"><img src="images/add_beer.png"><p>ADD BEER</p></a></div>
                
                <div class="col-sm-4"><a href="listAllBeers.php"><img src="images/edit_beer.png"><p>EDIT BEER</p></a></div>

                <div class="col-sm-4"><a href="#"><img src="images/user_acc.png"><p>USER ACCOUNTS</p></a></div>
            </div>        
    </div>

<footer class="container fixed-bottom">

        <div>
            <h2>Quality House Beer</h2>
            <h6>phone: +359 123 123 123</h6>
    </div>
    <h4>CREATED BY QUALITY HOUSE TEAM &#174; - 2018</h4>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#profile").addClass('text_shadow');
    });
</script>


</body>

</html>