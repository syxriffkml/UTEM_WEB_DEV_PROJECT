<?php
  include "db_connect.php";
  session_start();
  $id = $_SESSION['user_id'];

    $query1 = mysqli_query($connect, "SELECT * FROM document WHERE user_id='$id'") or die(mysqli_query($connect)); 
    $uploads = mysqli_fetch_array($query1);
    $query2 = mysqli_query($connect, "SELECT * FROM userdetail WHERE user_id='$id'") or die(mysqli_query($connect));
    $row = mysqli_fetch_array($query2); 

  if(is_null($id)){ //USER YANG TAK LOGIN TAK BOLEH VIEW PAGE NI, SO DIA AKAN REDIRECT TERUS KE INDEX.PHP
    header ("location: index.php");
  }else if( (mysqli_num_rows($query1) ==0) || (mysqli_num_rows($query2) ==0)){ //IF USER YANG BELUM SETUP ACCOUNT, DIA AKAN PERGI SETUP DULU
    $message = "SILA ISI MAKLUMAT PERIBADI & AKADEMIK DAHULU SEBELUM MELIHAT INFO ANDA"; 
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
    <title>UPU Online - PAPARAN MAKLUMAT</title>
    <style>
        table{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
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
                    <h1 class="bigText">MAKLUMAT PENTING</h1>
                </div>
            </div>
        </div>     
        <div class="row">  
            <div class="col-sm-12" style="padding : 30px 50px;">
                <div class="glass" style="padding : 30px 50px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1  style="text-align: center;">Maklumat Peribadi</h1>
                            <table class="styled-table" style="width: 50%; margin-left: auto; margin-right: auto;">
                                <tbody>
                                    <tr>
                                        <td style="width:40%"> Nama Penuh : </td>
                                        <td><?php echo $row['fullname'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Rumah :</td>
                                        <td><?php echo $row['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Telefon :</td>
                                        <td><?php echo $row['phone1'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Telefon Bapa/Ibu/Penjaga :</td>
                                        <td><?php echo $row['phone2'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir :</td>
                                        <td><?php echo $row['birthplace'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Taraf Perkahwinan : </td>
                                        <td><?php echo $row['marital_status'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <h1 style="text-align: center;">Maklumat Akademik</h1>
                            <table class="styled-table" style="width: 30%; margin-left: auto; margin-right: auto;">
                                <tbody>
                                    <tr>
                                        <td style="width:35%">Transcript :</td>
                                        <td>
                                            <a href="../image/user documents/<?php echo $uploads['transcript'] ?>" target="_blank"><button>VIEW TRANSCRIPT</button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Result SPM :</td>
                                        <td>
                                            <a href="../image/user documents/<?php echo $uploads['transcript'] ?>" target="_blank"><button>VIEW RESULT SPM</button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Result MUET :</td>
                                        <td>
                                            <a href="../image/user documents/<?php echo $uploads['transcript'] ?>" target="_blank"><button>VIEW RESULT MUET</button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>IC Photo : </td>
                                        <td>
                                            <a href="../image/user documents/<?php echo $uploads['transcript'] ?>" target="_blank"><button>VIEW IC PHOTO</button></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include "modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->
    </div><br><br><br><br>

    <div id="footer">Syariff Kamil</div>
    <script type="text/javascript" src="../js/modal.js"></script>

</body>

<?php
} // TUTUP CURLYBRACES if(is_null($id))
?>