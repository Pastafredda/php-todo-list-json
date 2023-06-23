<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$index = $_POST['index'];
$itemsStr = file_get_contents("data.json");
$tasks = json_decode($itemsStr);

if($tasks[$index]->done === true){
    $tasks[$index]->done = false;
}else{
    $tasks[$index]->done = true;
}

$itemsStr = json_encode($tasks);

file_put_contents("data.json", $itemsStr);
echo $itemsStr;