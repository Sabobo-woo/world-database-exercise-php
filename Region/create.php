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
   
} else {
    $region = new Region;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABASE EDIT</title>
</head>
<body>
     <style>
    .success-message {
      background-color: pink;
      
    }
  </style>

 
  
  <?php if ($id) : ?>
    <form action="save.php?id=<?= $id ?>" method="post">
<?php else : ?>
    <form action="save.php" method="post">
<?php endif; ?>
  

    Name:<br>
    <input type="text" name="name" value="<?= htmlspecialchars((string)$region->name) ?>"><br>
    <br>
    Slug:<br>
    <input type="text" name="slug" value="<?= htmlspecialchars((string)$region->slug) ?>"><br>
    <br>
   
    <button type="submit">Save</button>

    <?php if ($id) : ?>
<button>Edit</button>
<button>Delete</button>
  <?php endif; ?>

    
</form>  
</body>
</html>
