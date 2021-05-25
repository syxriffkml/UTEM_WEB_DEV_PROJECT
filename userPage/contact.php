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
  <title>UPU Online - HUBUNGI KAMI</title>
  <style>
    .vl {
      border-left: 6px solid rgb(35, 37, 35);
      height: 220px;
      position: absolute;
      left: 50%;
      margin-left: -3px;
      top: 40ox;
    }
    @media only screen and (max-width: 768px) {
      .vl{ 
        display: none;
      }
    }
    
    </style>
</head>
<body>

  <ul class="ulNav">
  <li class="liNav"><a href="index.php"><i class="fas fa-tachometer-alt fa-lg fa-secondary"></i> UTAMA</a></li>
  <li class="liNav"><a href="panduan.php"><i class="far fa-user-circle fa-lg fa-secondary"></i> PANDUAN CALON</a></li>
  <li class="liNav"><a href="university.php"> SENARAI INSTITUSI</a></li>
  <li class="liNav"><a class="active" href="contact.php"><i class="fas fa-phone fa-lg fa-secondary"></i> HUBUNGI KAMI</a></li>
  <li></li>
  <?php
      if(isset($_SESSION['username'])):?>

      <li style="float:right"> <a href="logout.php">Logout</a></li>
          <div class="dropdown" style="float:right">
              <button class="dropbtn"><?php echo $_SESSION['username'] ."'s Profile";?></button>
              <div class="dropdown-content">
                  <a href="Profilesetting.php">Profile Setting</a>
                  <a href="Reservation.php">My Reservation</a>
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
            <h1 style="font-size: 90px; font-weight: 900; margin-bottom: -25px;">
              HUBUNGI KAMI
          </h1><br><br>
          <fieldset class="centerImage" style="width: 30%;">
            <legend style="font-size: 30px;"><b>APA KHABAR, APA YANG KAMI BOLEH BANTU ANDA?</b></legend>
            <img src="../image/contactUs.png">
          </fieldset><br><br>   
          </div>
        </div>
      </div>
      <div class="row" style="text-align: center; ">
        <div class="col-sm-6">
          <button class="slideButton" style="width: 20em; height: 10em;">
            Hantar maklumbalas anda berkenaan UPUonline
          </button>
        </div>
        <div class="vl"></div>
        <div class="col-sm-6">
          <a href="https://drive.google.com/file/d/1PPyxU7cp8w3PIyVJHqwpVfB9wrKKeC5L/view" target="_blank">
            <button class="slideButton" style="width: 20em; height: 10em;">
              Soalan lazim (FAQ)
            </button>
          </a>
        </div>
      </div>
      <?php include "layout/modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->
      
  </div><br><br><br><br>
  <div id="footer">Syariff Kamil</div>
</body>