
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link href="../../../Vendor/css/styles.css" rel="stylesheet">

  </head>

  <body class="text-center" style="background-color:#eee">
    
    <header>
      <?php include_once "../beer/header.php"; ?>
    </header>       

    <article style="position: relative; margin-top: 250px">
            <div class="col-sm-5" style="width: 50%; height: 50%; position: relative; margin-top:-70px;">
                <h3><strong>Our story:</strong></h3>
                <p>We are Quality House Beer Company and we started our beer production business in 2015. </p>
                <p>Our mission is to provide the customer with the desired pleasure of consuming quality beer. </p>
                <p>That's why we started this project with enthusiasm and over the years we have made efforts to improve the taste of our beer. </p>
                <p>We strive not to compromise on quality by using raw materials from proven suppliers and manufacturers. Our technologists are 
                following the process of craft beer producing and they are guarantee of the finished product quality.</p>
                <br/>
                <h3><strong>Our contact details:</strong></h3>
                <p>Address: Ivan Vazov Dist., 1 Balsha Str., Fl. 3, 1408, Sofia, Bulgaria</p>
                <p>Phone: +359 2 439 0635, +359 2 958 3306</p>
                <p>Business Hours: Monday - Friday, 9am - 6pm</p>              
            </div>
                

            <div class="col-sm-7">
                <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAOg2JT3f84wW301rsizycf61k4ypzxbzw">                
                    </script>
                <div id="map_canvas" style="height: 300px; width: 75%;">
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
                            content: textOfInfoWindow,
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
    </article>

    <footer>
      <?php include_once "../beer/footer.php"; ?>
    </footer> 
  </body>
</html>