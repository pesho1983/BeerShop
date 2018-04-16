<?php
require_once 'connect.php';
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// beers per page
$records_per_page = 12;
$from_record_num = ($records_per_page * $page) - $records_per_page;

?>
<!doctype html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="images/logoNew_bubbles.png"/>
        <link type="text/css" rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/catalog.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.2.4/css/simple-line-icons.min.css'>
        <link href="css/styles.css" rel="stylesheet">

        <title>Catalog</title>
    </head>
    
    <body style="background-color:#eee">

    <header>
      <?php include_once "php_includes/header.php"; ?>
    </header>

<div class='container' style="margin-bottom: 150px; padding: 20px; padding-top: 100px;
  text-align: center;">
<?php
    $query = "SELECT id, name, description, price, picture, quantity FROM products ORDER BY id DESC
    LIMIT :from_record_num, :records_per_page";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
    $stmt->execute();

    echo "";
    $num = $stmt->rowCount();
    if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "<div class='product'>";
            echo "<img src='beers/{$picture}' style='height:50%; width: 50%;'>";
                echo "<h2 class='header'>{$name}</h2>";
                echo "<p class='description'></p>";
                echo "<p class='price'>{$price}</p>";
                echo "<div class='btn'>Add to cart</div>";
                echo "<div class='quickview'>Quickview</div>";
            echo "</div>";
        }
    }




    echo "<div class='quickviewContainer' style='margin-top: 50px;'>";
    echo "<div class='close'></div>";
    echo "<h2 class='headline'>{$name}</h2>";
    echo "<p class='description'>{$description}</p>";
    echo "<img src='beers/{$picture}'>";
    echo "</div>";

    echo "<br>";
    $query = "SELECT COUNT(*) as total_rows FROM products";
    $stmt = $pdo->prepare($query);
    // execute query
    $stmt->execute();
    // get total rows
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_rows = $row['total_rows'];
    // paginate records
    $page_url="catalog.php?";
    include_once "php_includes/paging.php";
echo "</div>";
?>


    <footer class="container fixed-bottom">
      <?php include_once "php_includes/footer.php"; ?>
    </footer>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="js/catalog.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>0
    </body>
</html>
