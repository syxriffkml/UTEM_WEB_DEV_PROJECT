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
    <title>UPU Online - KATEGORI STPM/SETARAF</title>
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
                    <h1 style="font-size: 90px; font-weight: 900; margin-bottom: -25px;">LEPASAN STPM / SETARAF</h1>
                    <h3>PILIHAN KATEGORI PERMOHONAN DI DALAM UPUOnline</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="glass" style="height: 600px;">
                    <img src="../image/panduan page/1.png" class="centerImage">
                    <div style="margin : 15px">
                        <h2 style="text-align: center;">KATEGORI A,S</h2>
                        <p>
                            STPM (Kategori A, S) Pemohon yang menggunakan kelayakan STPM tahun semasa sahaja:
                        </p>
                        <ul>
                            <li>Kategori A : Aliran Sastera</li>
                            <li>Kategori S : Aliran Sains</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="glass" style="height: 600px;">
                    <img src="../image/panduan page/2.png" class="centerImage">
                    <div style="margin : 15px;">
                        <h2 style="text-align: center;">KATEGORI N, P, U, L, K, J</h2>
                        <p>
                            Pelajar Matrikulasi KPM/ Asasi PASUM/ ASASIpintar UKM / Asasi UiTM tahun semasa seperti pecahan berikut:
                        </p>
                        <ul>
                            <li>Kategori N : Aliran Sains Calon Matrikulasi KPM, Asasi PASUM , ASASIpintar UKM dan Asasi UiTM.</li>
                            <li>Kategori P : Aliran Perakaunan Calon Matrikulasi KPM.</li>
                            <li>Kategori U : Aliran Undang-Undang Calon Asasi UiTM.</li>
                            <li>Kategori L : Aliran Bahasa Inggeris Calon Asasi UiTM (TESL).</li>
                            <li>Kategori K : Aliran Kejuruteraan Calon Asasi UiTM.</li>
                            <li>Kategori J : Aliran Kejuruteraan Calon Matrikulasi KPM</li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="col-sm-4">
                <div class="glass" style="height: 600px;">
                    <img src="../image/panduan page/3.png" class="centerImage">
                    <div style="margin : 15px;">
                        <h2 style="text-align: center;">KATEGORI T</h2>
                        <p>
                            Calon Sijil Tinggi Agama Malaysia (STAM):
                        </p>
                        <ul>
                            <li>STAM Tahun 2019</li>
                            <li>STAM Tahun 2020</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="glass" style="height: 600px;">
                    <img src="../image/panduan page/4.png" class="centerImage">
                    <div style="margin : 15px;">
                        <h2 style="text-align: center;">KATEGORI E</h2>
                        <p>
                            DKM / DLKMK / DVM / DIPLOMA IPTS / LUAR NEGARA / LAIN-LAIN KELAYAKAN :
                        </p>
                        <ul>
                            <li>Diploma Kemahiran Awam (DKM)</li>
                            <li>Diploma Lanjutan Kemahiran Malaysia (DLKM)</li>
                            <li>Diploma Vokasional Malaysia</li>
                            <li>Diploma IPTS/ Luar negara / Lain-lain Kelayakan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="glass" style="height: 600px;">
                    <img src="../image/panduan page/2.png" class="centerImage">
                    <div style="margin : 15px;">
                        <h2 style="text-align: center;">KATEGORI F</h2>
                        <p>
                            Kelayakan Setaraf :
                        </p>
                        <ul>
                            <li>A Level</li>
                            <li>International Baccalaureate Diploma (IBD)</li>
                            <li>Sekolah Sukan (SSBJ/SSTMI/SSMP)</li>
                            <li>STPM (BUKAN TAHUN SEMASA)</li>
                            <li>Matrikulasi KPM (BUKAN TAHUN SEMASA)</li>
                            <li>STAM (Dua (2) Tahun Sebelum Tahun Semasa)</li>
                            <li>AUSMAT/ SAM / ADFP</li>
                            <li>Asasi IPTS</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="glass" style="height: 600px;">
                    <img src="../image/panduan page/3.png" class="centerImage">
                    <div style="margin : 15px;">
                        <h2 style="text-align: center;">KATEGORI G</h2>
                        <p>
                            Diploma (Universiti Awam/Politeknik):
                        </p>
                        <ul>
                            <li>Diploma Universiti Awam</li>
                            <li>Diploma Politeknik</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php include "modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->
    </div><br><br><br><br>
    <div id="footer">Syariff Kamil</div>
    <script type="text/javascript" src="../js/modal.js"></script>

</body>