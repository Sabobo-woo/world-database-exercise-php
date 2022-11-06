<?php

require_once 'DB.php'; 
require_once 'DB_functions.php';
require_once 'Region.php';


connect('localhost', 'world', 'root', '' );

session_start();



$id = $_GET['id'] ?? null;

if (isset($id)) {
  $query = 'SELECT * FROM `regions` WHERE `id`=?';
  $region = select_one($query, [$id], Region::class);
 
  $region->name = $_POST['name'];
  $region->slug = $_POST['slug'];
   $region->save();
  $_SESSION['id'] = $region->id;
  header('Location: create.php?id='.$region->id);
  exit();
} else {
  
  $myRegion = new Region;
  $myRegion->name = $_POST['name'];
  $myRegion->slug = $_POST['slug'];
  $myRegion->save();
  $_SESSION['id'] = $myRegion->id;
}

// $myRegion = new Region();
// $myRegion->name = $_POST['name'];

// $myRegion->slug = $_POST['slug'];
// $myRegion->save();

header('Location: create.php');
echo json_encode($myRegion);











