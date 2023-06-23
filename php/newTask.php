<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$task = $_POST;

$itemsStr = file_get_contents("data.json");
$tasks = json_decode($itemsStr);

$tasks[] = $task;

$itemsStr = json_encode($tasks);

file_put_contents("data.json", $itemsStr);
echo $itemsStr;
