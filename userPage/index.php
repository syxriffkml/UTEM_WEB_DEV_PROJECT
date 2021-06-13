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
    <title>UPU Online - UTAMA</title>
</head>
<body>

<ul class="ulNav">
  <li class="liNav"><a class="active" href="index.php"><i class="fas fa-home"></i> UTAMA</a></li>
  <div class="dropdown" style="float:left">
    <button class="dropbtn" style="height: 58px;  width:180px"> PANDUAN CALON</button>
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
    <li style="float:right"><button class="slideButton" id="loginNav" style="padding : 10px">LOG IN</button></li> <!-- Homepage je pakai id loginNav and registerNav-->
    <li style="float:right"><button class="slideButton" id="registerNav" style="padding : 10px">REGISTER</button></li> <!-- Page lain pakai id login and register-->
    <?php
    endif;
    ?>
</ul>
    

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
          <?php 
            if(isset($_SESSION['username'])){ ?>
              <img src="../image/graduate.jpg" style="height: 100vh; width : 100% ;object-fit: fill;filter: brightness(30%); ">
              <div class="centeredContainer">
                <img src="../image/upu logo.jpg" style="width: 10rem; border-radius: 50%; border: 6px solid rgb(0, 0, 0); " alt="UPU LOGO" class="centerImage">
                <h1 style="color:white; font-size:40px">SELAMAT DATANG <span style="color:rgb(255, 0, 179)"><?php echo $_SESSION['username'] ?></span></h1>
                <h3 class="link"><a href="application.php">CLICK DI SINI UNTUK MEMOHON</a> </h3>
              </div>
          <?php 
            }else{
          ?>
            <div class="slideshow-container">             
                <div class="mySlides fade">
                  <div class="numbertext">1 / 2</div>
                  <img src="../image/graduate.jpg" style="height: 100vh; width : 100% ;object-fit: fill;filter: brightness(40%); ">
                  <div class="centeredContainer">
                    <img src="../image/upu logo.jpg" style="width: 12rem; border-radius: 50%; border: 6px solid rgb(0, 0, 0); " alt="UPU LOGO" class="centerImage">
                    <h1 style="color:white; font-size:60px">SELAMAT DATANG KE <span style="color:rgb(255, 0, 179)">UPU</span>online</h1>
                  </div>
                </div>
                
                <div class="mySlides fade">
                  <div class="numbertext">2 / 2</div>
                  <img src="../image/tablecofee.jpg" style="height: 100vh; width : 100% ;object-fit: fill;">
                  <div class="centeredContainer glass">
                    <img src="../image/upu logo.jpg" style="width: 12rem; border-radius: 50%; border: 6px solid rgb(0, 0, 0); " alt="UPU LOGO" class="centerImage">
                    <h1>DAFTAR SEKARANG!</h1><br>

                    <button class="slideButton" id="registerHomepage" style="width:200px">
                      REGISTER
                    </button>                   
                    <button class="slideButton" id="loginHomepage" style="width:200px">
                      LOG IN
                    </button>
                  </div>
                </div>
                
                <?php include "modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->

                </div>
                <br>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div id="footer">Syariff Kamil</div>


<script>
  var slideIndex = 0;
  var active = true;
  showSlides();
  /* SLIDESHOW */
  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    
    slides[slideIndex-1].style.display = "block";  
    
    var id = setTimeout(showSlides, 6000); // Change image every 2 seconds
  }

  /* MODAL FOR HOMEPAGE */
  const registerNav = document.getElementById("registerNav");
  const loginNav = document.getElementById("loginNav");
  const registerHomepage = document.getElementById("registerHomepage");
  const loginHomepage = document.getElementById("loginHomepage");

  const register_modal = document.getElementById('register_modal');
  const login_modal = document.getElementById('login_modal');

  const closeRegister = document.getElementById('closeRegister');
  const closeLogin = document.getElementById('closeLogin');

  registerNav.addEventListener('click', () => {
      register_modal.classList.add('show');
  });
  registerHomepage.addEventListener('click', () => {
      register_modal.classList.add('show');
  });

  loginNav.addEventListener('click', () => {
      login_modal.classList.add('show');
  });
  loginHomepage.addEventListener('click', () => {
      login_modal.classList.add('show');
  });


  closeRegister.addEventListener('click', () => {
      register_modal.classList.remove('show');
  });
  closeLogin.addEventListener('click', () => {
      login_modal.classList.remove('show');
  });
  window.addEventListener('click', () => {
      if (event.target == register_modal) {
          register_modal.classList.remove('show');
      }else if(event.target == login_modal){
          login_modal.classList.remove('show');
      }
  });

</script>
</body>