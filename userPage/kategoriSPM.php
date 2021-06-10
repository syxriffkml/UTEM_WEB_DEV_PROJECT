<?php
  include "db_connect.php";
  session_start();
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/user.css" /> 
    <link rel="stylesheet" href="../css/bootstrap-grid.css" /> 

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="icon" type="image/gif/png" href="../image/upu logo.jpg">
    <title>UPU Online - KATEGORI SPM</title>
</head>
<body>

<ul class="ulNav">
    <li class="liNav"><a href="index.php"><i class="fas fa-tachometer-alt fa-lg fa-secondary"></i> UTAMA</a></li>
    <div class="dropdown" style="float:left">
        <button class="dropbtn" style="height: 55px; background-color: rgb(20, 20, 24); color: rgb(255, 0, 179); width:180px"> PANDUAN CALON</button>
        <div class="dropdown-content">
            <a href="kategoriSPM.php">KATEROGI LEPASAN<br>SPM</a>
            <a href="kategoriSTPM.php">KATEGORI LEPASAN<br>STPM/SETARAF</a>
            <a href="https://drive.google.com/file/d/1PPyxU7cp8w3PIyVJHqwpVfB9wrKKeC5L/view" target="_blank" style="height:60px">FAQ</a>
        </div>
    </div>
    <li class="liNav"><a href="university.php"> SENARAI INSTITUSI</a></li>
    <li class="liNav"><a href="contact.php"><i class="fas fa-phone fa-lg fa-secondary"></i> HUBUNGI KAMI</a></li>
    <li></li>
    <?php
    if(isset($_SESSION['username'])):?>

        <li class="liNav" style="float:right"><a href="logout.php"> LOGOUT</a></li>
        <div class="dropdown" style="float:right">
            <button class="dropbtn" style="height: 55px;"><?php echo $_SESSION['username'] ."'s PROFILE";?></button>
            <div class="dropdown-content">
                <a href="#">Profile Setting</a>
                <a href="#">Button 2</a>
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
                <div style="margin : 2px; text-align:center;">
                    <h1 class="bigText">LEPASAN SPM</h1>
                    <h3>PILIHAN KATEGORI PERMOHONAN DI DALAM UPUOnline</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="glass" style="height: 400px;">
                    <img src="../image/panduan page/1.png" class="centerImage">
                    <div style="margin : 15px; text-align: center;">
                        <h2>KATEGORI A</h2>
                        <p>
                            Pemohon yang menggunakan kelayakan SPM tahun semasa sahaja.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="glass" style="height: 400px;">
                    <img src="../image/panduan page/2.png" class="centerImage">
                    <div style="margin : 15px; text-align: center;">
                        <h2>KATEGORI B</h2>
                        <p>
                            Pemohon yang menggunakan keputusan SPM bukan tahun semasa;
                        </p>
                        <b>-SPM 2018- -SPM 2019-</b>
                    </div>
                </div>
                
            </div>
        </div>
        <?php include "modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->
    </div><br><br><br><br>
    <div id="footer">Syariff Kamil</div>
    <script type="text/javascript" src="../js/modal.js"></script>

</body>