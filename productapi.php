<?php
//Tillåter filen att läsas som json.
header("Content-Type: application/json; charset=UTF-8");

//Arrayer för produkterna.
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

//Läser in antal produktnamn i $limit.
$limit = count($productName);
if(isset($_GET["limit"])){
    //Ändrar specialtecken man har skrivit i GET-requesten till HTML-element.
    $limit = htmlspecialchars($_GET["limit"]);
}

//Visar felmeddelande om det inte är endast siffror och ifall de är mindre än 1 och högre än antal produktnamn.
if (!filter_var($limit, FILTER_VALIDATE_INT) === true) {
    echo '{ "error":"Måste innehålla endast siffror"}';
} else {
    if($limit < 1 or $limit > count($productName)){
        echo '{ "error":"Får ej vara mindre än 1 och mer än ' . count($productName) . '"}';
    } else {

        $product = [];
        //Lägger till en kategori från tidigare arrayer i en ny array
        for($i=0; $i<$limit; $i++){

            $storage = rand(0,50);

            $info = array(
                "Product" => $productName[$i],
                "Price" => $productPrice[$i],
                "Info" => $productInfo[$i],
                "Image" => $productImage[$i],
                "Amount" => $storage
            );
            //Adderar $info arrayen i en annan array.    
            $product[]=$info;
            
            }
            //Konverterar $product till json.
            $json =json_encode($product);
            echo $json;
        
        }
}
?>