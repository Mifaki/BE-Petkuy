<?php 

$host = 'localhost';
$username = 'root';
$password = 'admin123';
$dbname = 'petkuy';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {
    die('Database connection failed: ' .mysqli_connect_error());
}

?>