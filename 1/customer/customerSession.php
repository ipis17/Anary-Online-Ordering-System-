<?php

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

$user_check=$_SESSION['login_user1'];

$session_query = " SELECT username from tbl_customers where username = '$user_check' ";
$query_run = mysqli_query($mysql_conn, $session_query);
$query_row = mysqli_fetch_assoc($query_run);
$login_session = $query_row['username'];



?>