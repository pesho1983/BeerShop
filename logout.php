
<?php
require_once 'connect.php';
session_destroy();
setcookie("ID_my_site", $_POST['username'], time()-(60*60*24));
header("Location: index.php");
exit;