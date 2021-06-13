<?php
  include "db_connect.php";
  session_start();
  $id = $_SESSION['user_id'];

  $sql = "SELECT * FROM user WHERE user_id='$id'";
  $result = mysqli_query($connect,$sql);
  $row = mysqli_fetch_assoc($result);
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
            <button class="dropbtn" style="height: 55px;background-color: rgb(20, 20, 24); color: rgb(255, 0, 179);"><?php echo $_SESSION['username'] ."'s PROFILE";?></button>
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
                    <h1 class="bigText">PROFILE SETTING</h1>
                </div>
            </div>
        </div>     
        <div class="row">  
            <div class="col-sm-12" style="padding : 30px 400px;">
                <div class="glass" style="padding : 30px 50px;">
                    <form name="profile" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <table>
                            <tr>
                                <td>
                                    <label for="username"><b>Username :</b></label>
                                </td>
                                <td style="width: 70%;">
                                    <input type="text" id="username" value="<?php echo $row['username'] ?>" name="username" required ><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="ic_num"><b>No Kad Pengenalan :</b></label> &nbsp; &nbsp;
                                </td>
                                <td>
                                    <input type="text" id="ic_num" value="<?php echo $row['ic_num'] ?>" name="ic_num" oninput="inputNumber(this.id);" maxlength="12" disabled/><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email"><b>Alamat Email :</b></label> &nbsp; &nbsp;
                                </td>
                                <td>
                                    <input type="email" id="email" value="<?php echo $row['email'] ?>" name="email" required ><br>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <div style="width: 30%; margin-left: auto; margin-right: auto;;">
                            <button type="submit" name="update" class="buttonForm">KEMASKINI</button><br>
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

<?php
    if (isset($_POST['update'])) {
        $username = $_POST["username"]; //value from php
        $email = $_POST["email"];
        $sql2 = "UPDATE user SET username = '$username', email = '$email'  WHERE user_id = '$id'";
        $sendsql = mysqli_query($connect , $sql2);
        if ($sendsql){//other way to display alert box + header
            $sql = mysqli_query($connect," SELECT * FROM user WHERE user_id = '$id'");        
            if (mysqli_num_rows($sql)>0) {  
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['username'] = $row['username']; //new username session
            }
            $message = 'AKAUN ANDA TELAH DIKEMASKINI'; 
            echo "<script>
                    alert('$message')
                    window.location.replace('profile.php'); 
                </script>";
        }
    }
?>

