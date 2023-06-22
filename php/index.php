<?php

header('Content-Type: application/json');

$students = [
    [
        'name' => 'mario',
        'last_name' => 'rossi',
    ],
    [
        'name' => 'giovanna',
        'last_name' => 'bianchi'
    ],
];

echo json_encode($students)