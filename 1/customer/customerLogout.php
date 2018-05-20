<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../storehome.php"); // Redirecting To Home Page
}
?>