<?php

$hostname="localhost";
$username="root";
$password="";
$dbname="1611c2";


$conn = mysqli_connect($hostname,$username,$password,$dbname);

if(!$conn)
{
	die(mysqli_connect_error($conn));
}


?>


