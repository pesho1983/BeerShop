<!doctype html>
<html lang="en">
    <head>
        <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet">

        <title>Catalog</title>
    </head>
    
    <body style="background:url(images/beer_background-Copy2.jpg); width: 100%; min-height:100%; background-size: cover;  overflow: hidden; ">
    <header>
      <?php include_once "php_includes/header.php"; ?>
    </header>  
    
    <img src="images/page-is-under-construction.png">

    <footer class="container fixed-bottom">
      <?php include_once "php_includes/footer.php"; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#catalog").addClass('text_shadow');
        });
    </script>
    
    </body>
</html>