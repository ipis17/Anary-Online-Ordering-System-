<?php

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblaw";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "<script>console.log('connected');</script>";
}*/

$host =  'localhost';
$user = 'root';
$password = '';
$dbname = 'dbanary';
// Set DSN
$dsn = 'mysql:host='. $host .';dbname='. $dbname;
// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>