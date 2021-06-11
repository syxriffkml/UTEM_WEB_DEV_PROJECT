<?php
    include "db_connect.php";
    session_start();
        
    if(isset($_POST['submitSetup1'])){
        $id = $_SESSION['user_id'];
        $fullname = $_POST["fullname"]; //value from php
        $address = $_POST["address"];
        $phone1 = $_POST["phone1"];
        $phone2 = $_POST["phone2"];
        $birthplace = $_POST["birthplace"];
        $marital_status = $_POST["marital_status"];
        

        $sql = "INSERT INTO userdetail (user_id,fullname,address,phone1,phone2,birthplace,marital_status) VALUES ('$id','$fullname','$address','$phone1','$phone2','$birthplace','$marital_status')"; //value from database
        
        $sendsql = mysqli_query($connect , $sql);
        if($sendsql){
            header ("location: accountSetup2.php");
        }else{
            echo "TAK JADI HAHA";
        }
    }

?>