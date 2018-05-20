<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: partner.php"); // Redirecting To Home Page
}
?>