<?php
  include "./control/conn.php";
    if (isset($_SESSION['id'])) {
      
      header("Location: ./dashboard/");
    }
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MEGA</title>
    <link rel="stylesheet" href="vendor/bootstrap.css" />
    <link rel="stylesheet" href="vendor/style.css" />
  </head>