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
  <title>UPU Online - HUBUNGI KAMI</title>
</head>
<body>

<ul class="ulNav">
  <li class="liNav"><a href="index.php"><i class="fas fa-home"></i> UTAMA</a></li>
  <div class="dropdown" style="float:left">
        <button class="dropbtn" style="height: 58px;  width:180px"> PANDUAN CALON</button>
        <div class="dropdown-content">
            <a href="kategoriSPM.php">KATEGORI LEPASAN<br>SPM</a>
            <a href="kategoriSTPM.php">KATEGORI LEPASAN<br>STPM/SETARAF</a>
            <a href="https://drive.google.com/file/d/1PPyxU7cp8w3PIyVJHqwpVfB9wrKKeC5L/view" target="_blank" style="height:60px">FAQ</a>
        </div>
    </div>
  <li class="liNav"><a href="university.php"><i class="fas fa-university"></i> SENARAI INSTITUSI</a></li>
  <li class="liNav"><a class="active" href="contact.php"><i class="fas fa-phone"></i> HUBUNGI KAMI</a></li>
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
                <h1 style="font-size: 90px; font-weight: 900; margin-bottom:40px; text-align: center;"">
                    HUBUNGI KAMI
                </h1>
                <fieldset style="width: 50%; text-align: center;  margin: auto;">
                    <legend style="font-size: 30px;"><b>APA KHABAR, APA YANG KAMI BOLEH BANTU ANDA?</b></legend>
                    <!--<img src="../image/contactUs.png" alt="upu contact image"><br><br><br>-->
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="../image/address.png" style="width:30%">
                            <h2>ALAMAT RASMI:</h2>
                            <p>Bahagian Kemasukan Pelajar IPTA
                            Jabatan Pendidikan Tinggi,
                            Kementerian Pengajian Tinggi
                            Aras 4, No. 2 Menara 2, Jalan P5/6
                            Presint 5 Pusat Pentadbiran Kerajaan Persekutuan
                            62200 Wilayah Persekutuan Putrajaya</p>
                        </div>
                        <div class="col-sm-6" >  
                        <img src="../image/phone.png" style="width:30%">
                            <h2>ALAMAT RASMI:</h2>
                            <P>TALIAN HOTLINE  : 03 8870 8200<br>
                            FAKS            : 03 8870 6864<br>
                            ALAMAT EMEL     : <a href="mailto:upu@mohe.gov.my">upu@mohe.gov.my</a></p>
                        </div>
                    </div><br>
                    <h4 style="text-align: center;">TEKAN BUTANG DIBAWAH UNTUK MEMBERI MAKLUMBALAS</h4>
                    <button class="slideButton" id="contact" style="width: 20em; height: 8em;">
                        Hantar maklumbalas anda berkenaan UPUonline
                    </button>
                </fieldset>
            </div>
        </div>   
    <?php include "modalLoginRegister.php" ?> <!--FOR MODAL DISPLAY-->
    </div><br><br><br><br>
    <div class="modal-container" id="contact_modal">
        <div class="modal">
            <h1>CONTACT US</h1>
            <form name="contactForm" method="POST">
                <label for="name"><b>NAME</b></label>
                <input type="text" id="nameContact" placeholder="Masukkan Nama" name="name" required>

                <label for="title"><b>Tajuk</b></label>
                <input type="text" id="title" placeholder="Masukkan Tajuk" name="title" required>

                <label for="title"><b>Penyataan Masalah</b></label>
                <textarea id="problem" name="problem" rows="4" cols="50" style="text-align: left" required placeholder="Nyatakan malasah anda"></textarea>

                <button class="buttonForm cancelbtn" id="close_contact">Close</button>
                <button type="submit" onclick="getdetails()" class="buttonForm submitbtn">Submit</button>
            </form>
        </div>
    </div>
  <div id="footer">Syariff Kamil</div>
  <script type="text/javascript" src="../js/modal.js"></script>
  <script>
        //MODAL CONTACT US
        const contact = document.getElementById("contact");
        const contact_modal = document.getElementById("contact_modal");
        const close_contact = document.getElementById("close_contact");

        contact.addEventListener('click', () => {
            contact_modal.classList.add('show');  
        });
        close_contact.addEventListener('click', () => {
            contact_modal.classList.remove('show');
        });
        window.addEventListener('click', () => {
            if (event.target == contact_modal) {
                contact_modal.classList.remove('show');
            }
        });

        //JAVASCRIPT HANDLING CONTACT US FORM
        function getdetails(){
            let name = document.getElementById("nameContact").value;
            let title = document.getElementById("title").value;
            let problem = document.getElementById("problem").value;


            alert("NAMA : " + name + "\nTAJUK : " + title + "\nPENYATAAN MASALAH : " + problem);

            
        }

  </script>
</body>