<?php

require_once 'DB.php';
require_once 'DB_functions.php';
require_once 'Region.php';

//connect to database:
connect('localhost', 'world', 'root', '' );

$id = 11;
$query = "SELECT * FROM `regions` WHERE `id` = ?";
$region = select_one($query, [$id], Region::class);


$region->delete();

// header('Content-type: application/json');
// echo json_encode($deletedOne);