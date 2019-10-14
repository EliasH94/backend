<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<Link href="style.css" rel="stylesheet">
<title>Webshop</title>
</head>

<body>
<h1 class="header">Webshop</h1>
<hr>

<?php
//visa 10 namn från den här URLn
ini_set('display_errors', '1'); error_reporting(E_ALL);
$url = "http://localhost/backend/Uppgift-03/productapi.php?limit=10";
$data = file_get_contents($url);
$array = json_decode($data, true);



foreach ($array as $key => $value){
    $box = "<div class=value>"; 
    $box .= "<img src='$value[Image]'>" . "<br>";
    $box .= $value["Product"] . "<br>";
    $box .= $value["Info"] . "<br>";
    $box .= $value["Price"] . " kr <br>";
    $box .= "Antal i lager: " . $value["Amount"] . "<br>";
    $box .= "</div> \n";
    echo $box;
}



?>
<hr>
<footer>&copy; 2019 Elias & Sayin</footer>

 
</body>
</html>

