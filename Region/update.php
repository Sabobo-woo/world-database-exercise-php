<?php

require_once 'DB.php';
require_once 'DB_functions.php';
require_once 'Region.php';

//connect to database:
connect('localhost', 'world', 'root', '' );

$id = 5;
$query = "SELECT * FROM `regions` WHERE `id` = ?";
$sAmerica = select_one($query, [$id], Region::class);

$sAmerica->slug = 'new_slug';
// $sAmerica->update();
$sAmerica->save();

header('Content-type: application/json');
echo json_encode($sAmerica);