<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "student_b032010352";

	//create connection with mysql
	$connect = mysqli_connect($hostname , $username, $password, $dbname) OR DIE ("Connection Failed");

?>