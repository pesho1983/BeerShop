<!doctype html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>
        <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet">

        <title>FAQ</title>
    </head>
    
    <body style="background-color:#eee">
    <header>
      <?php include_once "php_includes/header.php"; ?>
    </header>  

    <p></br></p>
    <p></br></p>

    <div class="col-sm-4"></div>
    <div class="col-sm-4">
            <ul>
                <li>
                    <p style="color: orangered;">Is it necessary to be registered to buy a beer?</p>
                    <ul style="color: darkgreen;">
                        <li>Yes, it is.</li>
                    </ul>
                </li>
                <p></p>
                <li>
                    <p style="color: orangered;">How do I sign up?</p>
                    <ol style="color: darkgreen;">
                        <li>Go to Register form.</li>
                        <li>Register with valid data.</li>
                        <li>Accept agreement with Terms and Condition and GDPR.</li>
                        <li>Press Register button.</li>
                    </ol>
                </li>
                <p></p>
                <li>
                    <p style="color: orangered;">What are my payment methods?</p>
                    <ul style="color: darkgreen;">
                        <li>...</li>
                    </ul>
                </li>
                <p></p>
                <li>
                    <p style="color: orangered;">Can I place an order by phone?</p>
                    <ul style="color: darkgreen;">
                        <li>...</li>
                    </ul>
                </li>
                <p></p>
                <li>
                    <p style="color: orangered;">How save is it to order online?</p>
                    <ul style="color: darkgreen;">
                        <li>...</li>
                    </ul>
                </li>
                <p></p>
                <li>
                    <p style="color: orangered;">How long it will take to get my order?</p>
                    <ul style="color: darkgreen;">
                        <li>...</li>
                    </ul>
                </li>
                <p></p>
                <li>
                    <p style="color: orangered;">What shipping carriers do you use?</p>
                    <ul style="color: darkgreen;">
                        <li>...</li>
                    </ul>
                </li>
                <p></p>
                <li>
                    <p style="color: orangered;">How can I track my order?</p>
                    <ul style="color: darkgreen;">
                        <li>...</li>
                    </ul>
                </li>
            </ul>
    </div>
    <div class="col-sm-4"></div>
    <footer class="container fixed-bottom">
      <?php include_once "php_includes/footer.php"; ?>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#faq").addClass('text_shadow');
        });
    </script>

    </body>
</html>