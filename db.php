<?php
session_start();
    $hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'galerifoto';
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('gagal terhubung ke database');
?>

