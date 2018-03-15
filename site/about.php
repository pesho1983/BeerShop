<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>About us</title>

    <!-- Bootstrap core CSS -->
      <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->

      <link type="text/css" rel="stylesheet" href="css/styles.css">

  </head>

  <body class="text-center">
      <div class="container" style="width: 80%; margin-top: 20px">
          <header>
              <?php
                include_once ('php/header.php')
              ?>
          </header>
          <div class="container">
            <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAOg2JT3f84wW301rsizycf61k4ypzxbzw"></script>
                <div id="map_canvas" style="height: 550px; width: 100%; position: relative; top: 100px">
                    <script type="text/javascript">
                        function init_map() {
                             var lat = 42.6810000;
                             var lng = 23.3107544;
                             var textOfInfoWindow = "QH Beer Shop" + '<br>' + "ул.„Балша“ 1, кв. Иван Вазов, София 1408" + '<br>' + "етаж 3";
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
  </body>
</html>