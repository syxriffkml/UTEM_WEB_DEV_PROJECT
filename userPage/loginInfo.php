<?php
    include "db_connect.php";
    session_start();

    if (isset($_POST["submitLogin"])){
        if(($_POST['username']) ||  ($_POST['pass'])){
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $password = mysqli_real_escape_string($connect, $_POST['pass']);
            $sql = mysqli_query($connect," SELECT * FROM user WHERE username = '$username' AND password ='$password' ");        
            if (mysqli_num_rows($sql)>0) {  
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['username'] = $row['username'];
                $_SESSION['ic_num'] = $row['ic_num'];
                
                header ("location: index.php",true,  301 );  exit;
            }
            else{
                $message = "invalid username or password";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }
?>