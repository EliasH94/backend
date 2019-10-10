<?php
header("Content-Type: application/json; charset=UTF-8");

$productName = [
    "Redbull", 
    "Monster", 
    "Loka", 
    "Cola", 
    "Fanta", 
    "Sprite", 
    "7Up", 
    "Trocadero", 
    "Vatten", 
    "Grappo"
];

$productPrice = [
    25, 30, 15, 20, 10, 5, 125, 50, 45, 90
];

$productInfo = [
    "Energi dricka 250ml",
    "Energi dricka 450ml",
    "Kolsyrad vatten 0,5l",
    "Läsk cola-smak 330ml",
    "Läsk apelsin-smak 330ml",
    "Läsk citron-smak 330ml",
    "Läsk citron-smak 330ml",
    "Läsk passionfrukt-smak 330ml",
    "Vatten flaska 0,5ml",
    "Läsk grapefrukt 0,5",
];

$productImage = [
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
    "http://flummig.eu/api/backend/bild.jpg",
];


$limit = 10;
if(isset($_GET["limit"])){
$limit = $_GET["limit"];
}

if($limit < 1 or $limit > 10){
    echo "Error";
} else {

$product = [];

for($i=0; $i<$limit; $i++){

$storage = rand(0,50);

$info = array(
    "Product" => $productName[$i],
    "Price" => $productPrice[$i],
    "Info" => $productInfo[$i],
    "Image" => $productImage[$i],
    "Amount" => $storage
);
$product[]=$info;
}

$json =json_encode($product);

    echo $json;

//print_r($productPrice);
//echo $productPrice["Produkt 1"] . "kr";
}
?>