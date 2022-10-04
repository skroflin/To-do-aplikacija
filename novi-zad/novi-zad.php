<?php

// Ovdje se pohranjuje sav POST data

//echo "<pre>";
//var_dump($_POST); // Putem POST-a dobivamo ispis array-a te string-a
//echo "</pre>";

$todoName = $_POST['todo_name'] ?? false;
$todoName = trim($todoName);

if ($todoName) {
    if (file_exists("../to-do-json/to-do.json")) {
        $json = file_get_contents("../to-do-json/to-do.json");
        $jsonArray = json_decode($json, true); /* True daje asocijativni array*/
    } else {
        $jsonArray = [];
    }
    $jsonArray[$todoName] = ["completed" => false];

    //echo "<pre>";
    //var_dump($jsonArray);
    //echo "</pre>";
    file_put_contents("../to-do-json/to-do.json", json_encode($jsonArray, JSON_PRETTY_PRINT)); // json_encode uzima asocijativni array i pretvoriti ju u json string i potom sačuvati u file
    //echo "Sačuvan zadatak"; // Ako koristimo get metodu POST je prazan novi to-do neće uzeti POST
}                           // If neće biti zadovoljan, zaključak "Sačuvan zadatak neće biti ispisan"

header("Location: ../index/index.php");
