<?php
    include "db_connect.php";
    session_start();
        
    if(isset($_POST['submitApplication'])){
        $id = $_SESSION['user_id'];
        $uni1 = $_POST["uni1"]; //value from php
        $course1 = $_POST["course1"];

        $uni2 = $_POST["uni2"];
        $course2 = $_POST["course2"];

        $uni3 = $_POST["uni3"];
        $course3 = $_POST["course3"];

        $uni4 = $_POST["uni4"];
        $course4 = $_POST["course4"];

        $uni5 = $_POST["uni5"];
        $course5 = $_POST["course5"];
        

        $sql = "INSERT INTO application (user_id,uni1,course1,uni2,course2,uni3,course3,uni4,course4,uni5,course5) VALUES ('$id','$uni1','$course1','$uni2','$course2','$uni3','$course3','$uni4','$course4','$uni5','$course5')"; //value from database
        
        $sendsql = mysqli_query($connect , $sql);
        if($sendsql){
            $message = "PERMOHONAN ANDA DITERIMA"; 
            echo "<script>
                    alert('$message')
                    window.location.replace('viewApplication.php');
                </script>";
        }else{
            echo "TAK JADI HAHA";
        }
    }

?>