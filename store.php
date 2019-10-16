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

<!--Dropdown meny-->
<div class="dropdown">
  <button class="dropbtn">Antal</button>
  <div class="dropdown-content">
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=1">1</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=2">2</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=3">3</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=4">4</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=5">5</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=6">6</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=7">7</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=8">8</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=9">9</a>
    <a href="http://localhost/backend/Uppgift-03/store.php?limit=10">10</a>
    </div>
</div> 

<hr>

<?php
ini_set('display_errors', '1'); error_reporting(E_ALL);

//Hämtar data från API
$url = "http://localhost/backend/Uppgift-03/productapi.php";
$data = file_get_contents($url);
$array = json_decode($data, true);

//Hämtar limit via API och GET-request
$limit = count($array);
if(isset($_GET["limit"])){
    $limit = htmlspecialchars($_GET["limit"]);
}

//Kontrollerar vad man har skrivit i GET request och visar felmeddelande ifall man har skrivit fel.
if (!filter_var($limit, FILTER_VALIDATE_INT) === true) {
    echo "error: Måste innehålla endast siffror";
} else {
    if($limit < 1 or $limit > count($array)){
        echo "error: Får ej vara mindre än 1 och mer än "  . count($array);
    } else {

//Hämtar data från API och anger $limit som limit för antal produkter.
$url = "http://localhost/backend/Uppgift-03/productapi.php?limit=$limit";
$data = file_get_contents($url);
$array = json_decode($data, true);

        //Lägger till $value i variabeln $box som skrivs ut.
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
    }
}
?>
<hr>
<footer>&copy; 2019 Elias & Sayin</footer>

 
</body>
</html>