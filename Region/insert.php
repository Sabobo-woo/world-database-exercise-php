<?php

require_once 'DB.php';
require_once 'DB_functions.php';
require_once 'Region.php';

//connect to database:
connect('localhost', 'world', 'root', '' );


$myRegion = new Region();
$myRegion->name = 'My new region';
$myRegion->slug = 'my_new_region';
$myRegion->save();

header('Content-type: application/json');
echo json_encode($myRegion);