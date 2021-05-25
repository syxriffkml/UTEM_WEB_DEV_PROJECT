<?php
    include "db_connect.php";
    if (isset($_POST['submitRegister'])) {
        $username = $_POST["username"]; //value from php
        $ic_num = $_POST["ic_num"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $password = $_POST["pass"];

        $sql = "INSERT INTO user (username , ic_num , gender , email , password) VALUES ('$username', '$ic_num', '$gender', '$email', '$password')"; //value from database
	
        $sendsql = mysqli_query($connect , $sql);

        if ($sendsql){
            header ("location: index.php",true,  301 );  exit;
        }
    }
?>