<?php 
session_start();
ob_start();
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'pls';

$conn = mysqli_connect($host, $username, $password, $db);
if(!$conn){
    echo "UNABLE TO CONNECT";
}
