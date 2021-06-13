<?php
  include "db_connect.php";
  session_start();
  $id = $_SESSION['user_id'];

  $query = mysqli_query($connect, "SELECT * FROM userdetail WHERE user_id='$id'") or die(mysqli_query($connect));
  $sql = "SELECT * FROM document WHERE user_id='$id'";
  $result = mysqli_query($connect,$sql);

  if(is_null($id)){ //USER YANG TAK LOGIN TAK BOLEH VIEW PAGE NI, SO DIA AKAN REDIRECT TERUS KE INDEX.PHP
    header ("location: index.php");
  }else if(mysqli_num_rows($result) >0){ //IF USER YANG DAH LOGIN DAH  BUAT SETUP2, DIA PERGI KAT displayDoc.php
    header ("location: displayDoc.php");
  }else if((mysqli_num_rows($query) ==0)){ //IF USER YANG BELUM SETUP ACCOUNT, DIA AKAN PERGI SETUP DULU
    $message = "SILA ISI MAKLUMAT PERIBADI DAHULU DAHULU SEBELUM MENGISI MAKLUMAT AKADEMIK"; 
    echo "<script>
            alert('$message')
            window.location.replace('accountSetup.php');
        </script>";
  }else{  //ELSE
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
            <button class="dropbtn" style="height: 55px;"><?php echo $_SESSION['username'] ."'s PROFILE";?></button>
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
                    <h1 class="bigText">Account Setup 2</h1>
                    <h3>Maklumat Akademik</h3>
                </div>
            </div>
        </div>     
        <div class="row">  
            <div class="col-sm-12" style="padding : 30px 400px;">
                <div class="glass" style="padding : 30px 50px;">
                    <form name="setup2" method="POST" action="setup2.php" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>
                                    <label for="fullname"><b>Transcript : </b></label> <br><br><br>
                                    <label for="fullname"><b>Keputusan SPM : </b></label> <br><br><br>
                                    <label for="fullname"><b>Keputusan MUET : </b></label><br><br><br>
                                    <label for="fullname"><b>Gambar IC : </b></label><br>
                                </td>
                                <td>
                                    <input type="file" name ="transcript" required><br><br><br>
                                    <input type="file" name ="result_spm" required><br><br><br>
                                    <input type="file" name ="result_muet" required><br><br><br>
                                    <input type="file" name ="ic_photo" required><br>
                                </td>
                            </tr>
                        </table>
                        <h4>*size file tidak melebihi dari 9mb</h4>
                        <div style="padding : 0px 100px;">
                            <button type="reset" class="buttonForm cancelbtn">Reset</button>
                            <button type="submit" name="submitSetup2" class="buttonForm submitbtn">Simpan</button><br><br>
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
}  // TUTUP CURLYBRACES if(is_null($id))
?>