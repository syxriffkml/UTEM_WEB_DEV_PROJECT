<?php
  include "db_connect.php";
  session_start();
  $id = $_SESSION['user_id'];


  $sql = "SELECT * FROM application WHERE user_id='$id'";
  $result = mysqli_query($connect,$sql);
  $row = mysqli_fetch_assoc($result);

  if(is_null($id)){ //USER YANG TAK LOGIN TAK BOLEH VIEW PAGE NI, SO DIA AKAN REDIRECT TERUS KE INDEX.PHP
    header ("location: index.php");
  }else if( (mysqli_num_rows($result) ==0) ){ //IF USER BELUM MOHON, DIA AKAN PERGI SETUP MOHON DULU BARRU LEH VIEW
    $message = "SILA ISI PERMOHONAN TERLEBIH DAHULU"; 
    echo "<script>
            alert('$message')
            window.location.replace('application.php');
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
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>UPU Online - PILIHAN PROGRAM</title>
    <style>
        ::placeholder {
            color: black;
            font-weight : 700;
        }
    </style>
</head>
<body>

<ul class="ulNav">
    <li class="liNav"><a href="index.php"><i class="fas fa-tachometer-alt fa-lg fa-secondary"></i> UTAMA</a></li>
    <div class="dropdown" style="float:left">
        <button class="dropbtn" style="height: 55px; width:180px"> PANDUAN CALON</button>
        <div class="dropdown-content">
            <a href="kategoriSPM.php">KATEGORI LEPASAN<br>SPM</a>
            <a href="kategoriSTPM.php">KATEGORI LEPASAN<br>STPM/SETARAF</a>
            <a href="https://drive.google.com/file/d/1PPyxU7cp8w3PIyVJHqwpVfB9wrKKeC5L/view" target="_blank" style="height:60px">FAQ</a>
        </div>
    </div>
    <li class="liNav"><a href="university.php"> SENARAI INSTITUSI</a></li>
    <li class="liNav"><a href="contact.php"><i class="fas fa-phone fa-lg fa-secondary"></i> HUBUNGI KAMI</a></li>
    <li class="liNav"><a class="active" href="application.php"><i class="fas fa-phone fa-lg fa-secondary"></i> PERMOHONAN</a></li>
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
                    <h1 class="bigText">PILIHAN PROGRAM</h1>
                    <h3>Maklumat Pilihan</h3>
                </div>
            </div>
        </div>     
        <div class="row">  
            <div class="col-sm-12" style="padding : 30px 100px;">
                <div class="glass" style="padding : 30px 50px; text-align:center;">
                    <!--PILIHAN 1-->
                    <label for="pilihan1"><b>Pilihan 1 </b></label>&nbsp;
                    <input type="text" placeholder="<?php echo $row['uni1'] ?>" disabled style="width:34%; background:#ffffff;">&nbsp; &nbsp;
                    <input type="text" placeholder="<?php echo $row['course1'] ?>" disabled style="width:45%; background:#ffffff"><br>
                    <!--PILIHAN 2-->
                    <label for="pilihan1"><b>Pilihan 2 </b></label>&nbsp;
                    <input type="text" placeholder="<?php echo $row['uni2'] ?>" disabled style="width:34%; background:#ffffff">&nbsp; &nbsp;
                    <input type="text" placeholder="<?php echo $row['course2'] ?>" disabled style="width:45%; background:#ffffff"><br>
                    <!--PILIHAN 3-->
                    <label for="pilihan1"><b>Pilihan 3 </b></label>&nbsp;
                    <input type="text" placeholder="<?php echo $row['uni3'] ?>" disabled style="width:34%; background:#ffffff">&nbsp; &nbsp;
                    <input type="text" placeholder="<?php echo $row['course3'] ?>" disabled style="width:45%;background:#ffffff"><br>
                    <!--PILIHAN 4-->
                    <label for="pilihan1"><b>Pilihan 4 </b></label>&nbsp;
                    <input type="text" placeholder="<?php echo $row['uni4'] ?>" disabled style="width:34%; background:#ffffff">&nbsp; &nbsp;
                    <input type="text" placeholder="<?php echo $row['course4'] ?>" disabled style="width:45%; background:#ffffff"><br>
                    <!--PILIHAN 5-->
                    <label for="pilihan1"><b>Pilihan 5 </b></label>&nbsp;
                    <input type="text" placeholder="<?php echo $row['uni5'] ?>" disabled style="width:34%; background:#ffffff">&nbsp; &nbsp;
                    <input type="text" placeholder="<?php echo $row['course5'] ?>" disabled style="width:45%; background:#ffffff"><br>
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