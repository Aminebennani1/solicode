<?php
$host="localhost";
$usernam="root";
$password="";
$dbname="crud";

$conn=mysqli_connect($host,$usernam,$password,$dbname);
if(!$conn)
die("connection failed" . mysqli_connect_error());
?>

