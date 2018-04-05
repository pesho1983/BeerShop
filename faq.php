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
    <header class="fixed-top">
      <?php include_once "php_includes/header.php"; ?>
    </header>  

<div class="container" style="margin-top: 100px; ">
    <div class="row justify-content-md-center" style="margin-top: 200px; margin-bottom: 150px">

        <div class="col-sm-8 shadow_strokes_faq">
                <ul>
                    <li class=" my-4">
                        <h4 class="text-color-faq">Is it necessary to be registered to buy a beer?</h4>
                        <ul>
                            <li>Yes, it is.</li>
                        </ul>
                    </li>

                    <li class=" my-4">
                        <h4 class="text-color-faq">How do I sign up?</h4>
                        <ol>
                            <li>Go to Register form.</li>
                            <li>Register with valid data.</li>
                            <li>Accept agreement with Terms and Condition and GDPR.</li>
                            <li>Press Register button.</li>
                        </ol>
                    </li>

                    <li class=" my-4">
                        <h4 class="text-color-faq">What are my payment methods?</h4>
                        <ul>
                            <li>...</li>
                        </ul>
                    </li>

                    <li class=" my-4">
                        <h4 class="text-color-faq">Can I place an order by phone?</h4>
                        <ul>
                            <li>...</li>
                        </ul>
                    </li>

                    <li class=" my-4">
                        <h4 class="text-color-faq">How save is it to order online?</h4>
                        <ul>
                            <li>...</li>
                        </ul>
                    </li>

                    <li class=" my-4">
                        <h4 class="text-color-faq">How long it will take to get my order?</h4>
                        <ul>
                            <li>...</li>
                        </ul>
                    </li>

                    <li class=" my-4">
                        <h4 class="text-color-faq">What shipping carriers do you use?</h4>
                        <ul>
                            <li>...</li>
                        </ul>
                    </li>

                    <li class=" my-4">
                        <h4 class="text-color-faq">How can I track my order?</h4>
                        <ul>
                            <li>...</li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>

</div>
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