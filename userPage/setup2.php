<?php
    include "db_connect.php";
    session_start();
        
    if(isset($_POST['submitSetup2'])){
        $id = $_SESSION['user_id'];
        $transcript = $_FILES['transcript'];
        $result_spm = $_FILES['result_spm'];
        $result_muet = $_FILES['result_muet'];
        $ic_photo = $_FILES['ic_photo'];

        $transcriptName = $_FILES['transcript']['name'];
        $transcriptTempName = $_FILES['transcript']['tmp_name'];
        $transcriptFileSize = $_FILES['transcript']['size'];
        $transcriptError = $_FILES['transcript']['error'];
        $transcriptType = $_FILES['transcript']['type'];

        $result_spmName = $_FILES['result_spm']['name'];
        $result_spmTempName = $_FILES['result_spm']['tmp_name'];
        $result_spmFileSize = $_FILES['result_spm']['size'];
        $result_spmError = $_FILES['result_spm']['error'];
        $result_spmType = $_FILES['result_spm']['type'];

        $result_muetName = $_FILES['result_muet']['name'];
        $result_muetTempName = $_FILES['result_muet']['tmp_name'];
        $result_muetFileSize = $_FILES['result_muet']['size'];
        $result_muetError = $_FILES['result_muet']['error'];
        $result_muetType = $_FILES['result_muet']['type'];

        $ic_photoName = $_FILES['ic_photo']['name'];
        $ic_photoTempName = $_FILES['ic_photo']['tmp_name'];
        $ic_photoFileSize = $_FILES['ic_photo']['size'];
        $ic_photoError = $_FILES['ic_photo']['error'];
        $ic_photoType = $_FILES['ic_photo']['type'];

        $transcriptExt = explode('.', $transcriptName);
        $result_spmExt = explode('.', $result_spmName);
        $result_muetExt = explode('.', $result_muetName);
        $ic_photoExt = explode('.', $ic_photoName);


        $transcriptActualExt = strtolower(end($transcriptExt));
        $result_spmlActualExt = strtolower(end($result_spmExt));
        $result_muetActualExt = strtolower(end($result_muetExt));
        $ic_photoActualExt = strtolower(end($ic_photoExt));

        $allowed = array('jpg','jpeg','png','pdf');
        
        if( (in_array($transcriptActualExt, $allowed)) && (in_array($result_spmlActualExt, $allowed)) && (in_array($result_muetActualExt, $allowed)) && (in_array($ic_photoActualExt, $allowed)) ){
            if( ($transcriptError === 0) && ($result_spmError === 0) && ($result_muetError === 0) && ($ic_photoError === 0) ){
                if( ($transcriptFileSize < 9000000) && ($result_spmFileSize < 9000000) && ($result_muetFileSize < 9000000) && ($ic_photoFileSize < 9000000) ){
                    $transcriptNameNew = "transcript".$id.".".$transcriptActualExt;
                    $transcriptDestination = '../image/user documents/'.$transcriptNameNew;

                    $result_spmNameNew = "result_spm".$id.".".$result_spmlActualExt;
                    $result_spmDestination = '../image/user documents/'.$result_spmNameNew;

                    $result_muetNameNew = "result_muet".$id.".".$result_muetActualExt;
                    $result_muetDestination = '../image/user documents/'.$result_muetNameNew;

                    $ic_photoNameNew = "ic_photo".$id.".".$ic_photoActualExt;
                    $ic_photoDestination = '../image/user documents/'.$ic_photoNameNew;

                    move_uploaded_file($transcriptTempName, $transcriptDestination);
                    move_uploaded_file($result_spmTempName, $result_spmDestination);
                    move_uploaded_file($result_muetTempName, $result_muetDestination);
                    move_uploaded_file($ic_photoTempName, $ic_photoDestination);

                    //insert sql here
                    $sql = "INSERT INTO document(user_id,transcript,result_spm,result_muet,ic_photo) VALUES ('$id','$transcriptNameNew','$result_spmNameNew','$result_muetNameNew','$ic_photoNameNew')"; //value from database
                    $sendsql = mysqli_query($connect,$sql);
                    if($sendsql){
                        header ("location:displayDoc.php");
                    }else{
                        echo "TAKLEH UPLOAD FILE KE DATABASE";
                    }
                }else{
                    $message = "SAIZ FILE ANDA TERLALU BESAR DAN MELEBIHI 9MB"; //$FileSize < 9000000
                    echo "<script>
                            alert('$message')
                            window.location.replace('accountSetup2.php');
                        </script>";
                }
            }else{
                $message = "ADA ERROR KETIKA MENG-UPLOAD FILE TU"; 
                echo "<script>
                        alert('$message')
                        window.location.replace('accountSetup2.php');
                    </script>";
            }
        }else{
            $message = "SILA UPLOAD FILE BERFORMAT JPG / JPEG / PNG / PDF"; 
            echo "<script>
                    alert('$message')
                    window.location.replace('accountSetup2.php');
                </script>";
        }
    }

?>