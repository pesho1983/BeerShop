
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../favicon.ico">

    <title>About us</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet">

  </head>

  <body class="text-center" style="background-color:#eee">
    
    <header>
      <?php include_once "php_includes/header.php"; ?>
    </header>

    <div class="container" style="position: relative; top: 150px ">
        <div class="row">
            <div class="col-lg-6">
                <h3><b>Our story:</b></h3>
                <p style="text-align: justify; text-indent: 25px">
                    We are Quality House Beer Company and we started our beer production business in 2015.
                    Our mission is to provide the customer with the desired pleasure of consuming quality beer.
                    That's why we started this project with enthusiasm and over the years we have made efforts to improve the taste of our beer.
                </p>
                <p style="text-align: justify; text-indent: 25px">
                    We strive not to compromise on quality by using raw materials from proven suppliers and manufacturers. Our technologists are
                    following the process of craft beer producing and they are guarantee of the finished product quality.
                </p>

                <h3><b>Our contact details:</b></h3>
                <p style="text-align: justify">
                    Address: <br>
                    &nbsp; &nbsp;„Balsha“ 1 Str., Dist. "Ivan Vazov", 3 floor, Sofia 1408, Bulgaria<br>
                    Phone:<br>
                    &nbsp; &nbsp;+359 2 439 0635, +359 2 958 3306<br>
                    Business Hours:<br>
                    &nbsp; &nbsp;Monday - Friday, 9am - 6pm
                </p>
            </div>


            <div class="col-lg-6">
                <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAOg2JT3f84wW301rsizycf61k4ypzxbzw">
                </script>
                <div id="map_canvas" style="height: 430px">
                    <script type="text/javascript">
                        function init_map() {
                            var lat = 42.6810000;
                            var lng = 23.3107544;
                            var textOfInfoWindow = "QH Beer Shop" + '<br>' + "„Balsha“ 1 Str., Dist. \"Ivan Vazov\"" + '<br>' + "Sofia 1408, Bulgaria";
                            var myOptions = {
                                zoom: 17,
                                center: new google.maps.LatLng(lat, lng),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                            marker = new google.maps.Marker({
                                map: map,
                                position: new google.maps.LatLng(lat, lng)
                            });
                            infowindow = new google.maps.InfoWindow({
                                content: textOfInfoWindow
                            });
                            google.maps.event.addListener(marker, "click", function () {
                                infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);
                    </script>
                </div>
            </div>
        </div>
    </div>

    <footer class="container fixed-bottom">
      <?php include_once "php_includes/footer.php"; ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#about").addClass('text_shadow');
        });
    </script>

  </body>
</html>