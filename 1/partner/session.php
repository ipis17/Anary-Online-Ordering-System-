<?php

/*
include '../connection/connection.php';
session_start(); // Starting Session

// Storing Session
$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
//$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
//$row = mysql_fetch_assoc($ses_sql);

$sql_session = "SELECT business_username AS username FROM tbl_partner WHERE business_username = :business_username";
$stmt = $pdo->prepare($sql_session);
$stmt->bindValue(':business_username', $user_check);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$login_session = $row['business_username'];*/


$name = 'root';
$password = '';
$database = 'dbanary';

if(@mysqli_connect($host, $name, $password)) {
$mysql_conn = @mysqli_connect($host, $name, $password);

if(@mysqli_select_db($mysql_conn, $database)) {

} else {
die('Could not find database.');
}
} else {
die('Could not connect.');
}

session_start();
$user_check=$_SESSION['login_user'];

$session_query = " SELECT business_username from tbl_partner where business_username = '$user_check' ";
$query_run = mysqli_query($mysql_conn, $session_query);
$query_row = mysqli_fetch_assoc($query_run);
$login_session = $query_row['business_username'];




?>