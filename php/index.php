<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

    $items = [
        [
            'text'=> "HTML",
            'done'=>  true
        ],
        [
            'text'=> "CSS",
            'done'=>  false
        ],
        [
            'text'=> "Responsive Design",
            'done'=>  true
        ],
        [
            'text'=> "Javascript",
            'done'=>  false
        ],
];

echo json_encode($items);