<?php
header("Content-Type: application/json; charset=UTF-8");

$productName = [
    "Redbull", 
    "Monster", 
    "Loka", 
    "Coca Cola", 
    "Fanta", 
    "Sprite", 
    "7-Up", 
    "Trocadero", 
    "Vatten", 
    "Mountain Dew"
];

$productPrice = [
    25, 30, 15, 20, 10, 5, 125, 50, 45, 90
];

$productInfo = [
    "Energidryck. 250ml",
    "Energidryck. 450ml",
    "Kolsyrat vatten. 0,5l",
    "Läsk med smak av cola. 330ml",
    "Läsk med smak av apelsin. 330ml",
    "Läsk med smak av citron. 330ml",
    "Läsk med smak av citron. 330ml",
    "Läsk med smak av apelsin och äpple.  330ml",
    "Mineralvatten. 0,5l",
    "Läsk med smak av citrus. 0,5",
];

$productImage = [
    "http://flummig.eu/api/backend/RedBull.jpg",
    "http://flummig.eu/api/backend/Monster.jpg",
    "http://flummig.eu/api/backend/Loka.jpg",
    "http://flummig.eu/api/backend/CocaCola.jpg",
    "http://flummig.eu/api/backend/Fanta.jpg",
    "http://flummig.eu/api/backend/Sprite.jpg",
    "http://flummig.eu/api/backend/7-Up.jpg",
    "http://flummig.eu/api/backend/Trocadero.jpg",
    "http://flummig.eu/api/backend/Vatten.jpg",
    "http://flummig.eu/api/backend/MountainDew.jpg",
];


$limit = count($productName);
if(isset($_GET["limit"])){
    $limit = htmlspecialchars($_GET["limit"]);
}

if (!filter_var($limit, FILTER_VALIDATE_INT) === true) {
    echo '{ "error":"Måste innehålla endast siffror"}';
} else {
    if($limit < 1 or $limit > count($productName)){
        echo '{ "error":"Får ej vara mindre än 1 och mer än ' . count($productName) . '"}';
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
        
        }
}
?>