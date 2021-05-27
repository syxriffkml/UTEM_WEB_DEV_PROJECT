<?php
  include "userPage/db_connect.php";
  session_start();
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/user.css" /> 
    <link rel="stylesheet" href="css/bootstrap-grid.css" /> 

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>UPU Online - UTAMA</title>
</head>
<body>

<ul class="ulNav">
<li class="liNav"><a class="active" href="index.php"><i class="fas fa-tachometer-alt fa-lg fa-secondary"></i> UTAMA</a></li>
<li class="liNav"><a href="userPage/panduan.php"><i class="far fa-user-circle fa-lg fa-secondary"></i> PANDUAN CALON</a></li>
<li class="liNav"><a href="userPage/university.php"> SENARAI INSTITUSI</a></li>
<li class="liNav"><a href="userPage/contact.php"><i class="fas fa-phone fa-lg fa-secondary"></i> HUBUNGI KAMI</a></li>
<li></li>
<?php
    if(isset($_SESSION['username'])):?>

        <li class="liNav" style="float:right"><a href="userPage/logout.php"> LOGOUT</a></li>
        <div class="dropdown" style="float:right">
            <button class="dropbtn" style="height: 55px;"><?php echo $_SESSION['username'] ."'s PROFILE";?></button>
            <div class="dropdown-content">
                <a href="userPage/#">Profile Setting</a>
                <a href="userPage/#">Button 2</a>
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
            <div class="slideshow-container">             
                <div class="mySlides fade">
                  <div class="numbertext">1 / 2</div>
                  <img src="image/a.jpg" style="height: 100vh; width : 100% ;object-fit: fill; ">
                  <div class="centeredContainer">
                    <img src="image/upu logo.jpg" style="width: 12rem; border-radius: 50%; border: 6px solid rgb(0, 0, 0); " alt="UPU LOGO" class="centerImage">
                    <h1>WELCOME TO UPU ONLINE</h1><br>
                  </div>
                </div>
                
                <div class="mySlides fade">
                  <div class="numbertext">2 / 2</div>
                  <img src="image/vector.jpg" style="height: 100vh; width : 100% ;object-fit: fill; ">
                  <div class="centeredContainer glass">
                    <img src="image/upu logo.jpg" style="width: 12rem; border-radius: 50%; border: 6px solid rgb(0, 0, 0); " alt="UPU LOGO" class="centerImage">
                    <h1>WELCOME TO UPU ONLINE</h1><br>

                    <button class="slideButton" id="registerHomepage">
                      REGISTER
                    </button> &nbsp;                   
                    <button class="slideButton" id="loginHomepage">
                      LOG IN
                    </button>
                  </div>
                </div>
                
                <?php include "userPage/modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->

                </div>
                <br>
            </div>
        </div>
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