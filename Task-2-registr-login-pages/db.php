<?php
$hostName = "localhost";
$dbuser = "root";  
$password = "";
$dbname = "login_register";

$conn = mysqli_connect($hostName, $dbuser, $password, $dbname);
if(!$conn)
{
    die("Something went wrong;");
}
?>