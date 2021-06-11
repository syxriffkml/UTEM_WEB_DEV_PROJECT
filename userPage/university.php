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
    <title>UPU Online - SENARAI INSTITUSI</title>
</head>
<body>

<ul class="ulNav">
    <li class="liNav"><a href="index.php"><i class="fas fa-tachometer-alt fa-lg fa-secondary"></i> UTAMA</a></li>

    <!--<li class="liNav"><a href="panduan.php"><i class="far fa-user-circle fa-lg fa-secondary"></i> PANDUAN CALON</a></li>-->

    <div class="dropdown" style="float:left">
        <button class="dropbtn" style="height: 55px;  width:180px"> PANDUAN CALON</button>
        <div class="dropdown-content">
            <a href="kategoriSPM.php">KATEGORI LEPASAN<br>SPM</a>
            <a href="kategoriSTPM.php">KATEGORI LEPASAN<br>STPM/SETARAF</a>
            <a href="https://drive.google.com/file/d/1PPyxU7cp8w3PIyVJHqwpVfB9wrKKeC5L/view" target="_blank" style="height:60px">FAQ</a>
        </div>
    </div>
    <li class="liNav"><a class="active" href="university.php">SENARAI INSTITUSI</a></li>
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
                <div style="margin : 2px; text-align: center;">
                    <h1 class="bigText">
                        SENARAI INSTITUSI / AGENSI
                    </h1>
                    <br><br>

                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Carian Institusi..." title="Senarai Universiti">
                    <ul id="myUL">
                        <li><a href="#">(UiTM) UNIVERSITI TEKNOLOGI MARA</a></li>
                        <li><a href="#">(UM) UNIVERSITI MALAYA</a></li>
                        <li><a href="#">(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA</a></li>
                        <li><a href="#">(USM) UNIVERSITI SAINS MALAYSIA</a></li>
                        <li><a href="#">(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA</a></li>
                        <li><a href="#">(UPM) UNIVERSITI PUTRA MALAYSIA</a></li>
                        <li><a href="#">(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS</a></li>
                        <li><a href="#">(UKM) UNIVERSITI KEBANGSAAN MALAYSIA</a></li>
                        <li><a href="#">(UTM) UNIVERSITI TEKNOLOGI MALAYSIA</a></li>
                        <li><a href="#">(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <br><br><br>
        <?php include "modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->
    </div>
    
    <div id="footer">Syariff Kamil</div>

    <script type="text/javascript" src="../js/modal.js"></script>
    <script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
    
</body>