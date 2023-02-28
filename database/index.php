<?php
header('Access-Control-Allow-Origin: *');    
header("Access-Control-Allow-Headers:*");
header('Access-Control-Allow-Methods: *');

$host = 'localhost';
$user = 'root';
$DB_NAME = 'goals_tracker';
$dsn = "mysql:host=$host;dbname=$DB_NAME";
$conn = new PDO($dsn, $user);
