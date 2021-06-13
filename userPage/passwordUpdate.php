<?php
  include "db_connect.php";
  session_start();
  $id = $_SESSION['user_id'];


?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/user.css" /> 
    <link rel="stylesheet" href="../css/bootstrap-grid.css" /> 

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="icon" type="image/gif/png" href="../image/upu logo.jpg">
    <title>UPU Online - MAKLUMAT AKADEMIK</title>
</head>
<body>

<ul class="ulNav">
    <li class="liNav"><a href="index.php"><i class="fas fa-home"></i> UTAMA</a></li>
    <div class="dropdown" style="float:left">
        <button class="dropbtn" style="height: 58px; width:180px"> PANDUAN CALON</button>
        <div class="dropdown-content">
            <a href="kategoriSPM.php">KATEGORI LEPASAN<br>SPM</a>
            <a href="kategoriSTPM.php">KATEGORI LEPASAN<br>STPM/SETARAF</a>
            <a href="https://drive.google.com/file/d/1PPyxU7cp8w3PIyVJHqwpVfB9wrKKeC5L/view" target="_blank" style="height:60px">FAQ</a>
        </div>
    </div>
    <li class="liNav"><a href="university.php"><i class="fas fa-university"></i> SENARAI INSTITUSI</a></li>
    <li class="liNav"><a href="contact.php"><i class="fas fa-phone"></i> HUBUNGI KAMI</a></li>
    <li></li>
    <?php
    if(isset($_SESSION['username'])):?>
        <li class="liNav"><a href="application.php"><i class="fas fa-clipboard-list"></i> PERMOHONAN</a></li>
        <!-- Navbar button below will display on right -->
        <li class="liNav" style="float:right"><a href="logout.php"> LOGOUT</a></li>
        <div class="dropdown" style="float:right">
            <button class="dropbtn" style="height: 55px; background-color: rgb(20, 20, 24); color: rgb(255, 0, 179);"><?php echo $_SESSION['username'] ."'s PROFILE";?></button>
            <div class="dropdown-content">
                <a href="profile.php">Profile Setting</a>
                <a href="passwordUpdate.php">Kemaskini Password</a>
                <a href="displayDoc.php">Maklumat Peribadi<br>dan Akademik</a>
                <a href="viewApplication.php">Semak Permohonan</a>
            </div>
        </div>
    <?php
    else:?>
    <li style="float:right"><button class="slideButton" id="login" style="padding : 10px">LOG IN</button></li>
    <li style="float:right"><button class="slideButton" id="register" style="padding : 10px">REGISTER</button></li>
    <?php
    endif;
    ?>
</ul>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div style="margin : 2px; text-align: center;">
                    <h1 class="bigText">UPDATE PASSWORD</h1>
                </div>
            </div>
        </div>     
        <div class="row">  
            <div class="col-sm-12" style="padding : 30px 400px;">
                <div class="glass" style="padding : 30px 50px;">
                    <form name="passwordUpdate" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="old_pass"><b>Password Lama :</b></label>
                                </td>
                                <td style="width: 60%;">
                                    <input type="text" id="old_pass" placeholder="Masukkan Password Lama Anda" name="old_pass" required ><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="pass"><b>Password Baharu :</b></label> &nbsp; &nbsp;
                                </td>
                                <td>
                                    <input type="password" id="pass" placeholder="Masukkan Password Baharu Anda" name="pass" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="pass-repeat"><b>Sahkan Password Baharu :</b></label> &nbsp; &nbsp;
                                </td>
                                <td>
                                <input type="password" id="pass-repeat" placeholder="Ulang Password Baharu Anda" name="pass-repeat" required>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <div style="width: 30%; margin-left: auto; margin-right: auto;;">
                            <button type="submit" name="updatePass" class="buttonForm">KEMASKINI</button><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php include "modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->
    </div><br><br><br><br>

    <div id="footer">Syariff Kamil</div>
    <script type="text/javascript" src="../js/modal.js"></script>
</body>

<script> 
//PASSWORD MATCH
let password = document.getElementById("pass")
let confirm_password = document.getElementById("pass-repeat");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

<?php
    if (isset($_POST['updatePass'])) {
        $old_pass = $_POST["old_pass"]; //value from php
        $new_pass = $_POST["pass"];
        
        $sql = "SELECT * FROM user WHERE user_id='$id'";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($result);
        if($old_pass == $row['password']){
            //proceed
            $sql2 = "UPDATE user SET password = '$new_pass' WHERE user_id = '$id'";
            $sendsql = mysqli_query($connect , $sql2);
            if($sendsql){
                $message = 'PASSWORD ANDA TELAH DIKEMASKINI'; 
                echo "<script>
                        alert('$message')
                        window.location.replace('index.php'); 
                    </script>";
            }
        }else{
            $message = 'ERROR : PASSWORD LAMA ANDA TIDAK SAMA SEPERTI DI DALAM DATABASE'; 
            echo "<script>
                    alert('$message')
                    window.location.replace('passwordUpdate.php'); 
                </script>";
        }
    }
?>

