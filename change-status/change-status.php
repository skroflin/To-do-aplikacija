<?php

/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/

$json = file_get_contents("../to-do-json/to-do.json");
$jsonArray = json_decode($json, true);

$todoName = $_POST["todo_name"];

//unset($jsonArray[$todoName]);

$jsonArray[$todoName]['completed'] = !$jsonArray[$todoName]['completed'];

file_put_contents("../to-do-json/to-do.json", json_encode($jsonArray, JSON_PRETTY_PRINT));

header("Location: ../index/index.php");