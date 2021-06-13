<?php
  include "db_connect.php";
  session_start();
  $id = $_SESSION['user_id'];

  $sql = "SELECT * FROM application WHERE user_id='$id'";
  $result = mysqli_query($connect,$sql);
  $documentResult = mysqli_query($connect, "SELECT * FROM document WHERE user_id='$id'") or die(mysqli_query($connect)); 
  $userDetailResult = mysqli_query($connect, "SELECT * FROM userdetail WHERE user_id='$id'") or die(mysqli_query($connect));

  if(is_null($id)){ //USER YANG TAK LOGIN TAK BOLEH VIEW PAGE NI, SO DIA AKAN REDIRECT TERUS KE INDEX.PHP
    header ("location: index.php");
  }else if(mysqli_num_rows($result) >0){ //IF USER YANG DAH LOGIN DAH PERNAH BUAT PERMOHONAN, DIA PERGI KAT viewApplication.php
    header ("location: viewApplication.php");
  }else if( (mysqli_num_rows($documentResult) ==0) || (mysqli_num_rows($userDetailResult) ==0)){ //IF USER YANG BELUM SETUP ACCOUNT, DIA AKAN PERGI SETUP DULU
    $message = "SILA ISI MAKLUMAT PERIBADI & AKADEMIK DAHULU SEBELUM MEMBUAT PERMOHONAN"; 
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
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>UPU Online - PILIHAN PROGRAM</title>
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
        <li class="liNav"><a class="active" href="application.php"><i class="fas fa-clipboard-list"></i> PERMOHONAN</a></li>
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
                    <h1 class="bigText">PILIHAN PROGRAM</h1>
                    <h3>Maklumat Pilihan</h3>
                </div>
            </div>
        </div>     
        <div class="row">  
            <div class="col-sm-12" style="padding : 30px 100px;">
                <div class="glass" style="padding : 30px 50px; text-align:center;">
                    <form method="POST" action="saveApplication.php">
                        <!-- PILIHAN 1 -->
                        <label for="pilihan1"><b>Pilihan 1 </b></label>&nbsp;
                        <select id="uni1" name="uni1" style="width:34%" required>
                            <option value="" disabled selected>Pilih University</option>
                            <option value="(UiTM) UNIVERSITI TEKNOLOGI MARA">(UiTM) UNIVERSITI TEKNOLOGI MARA</option>
                            <option value="(UM) UNIVERSITI MALAYA">(UM) UNIVERSITI MALAYA</option>
                            <option value="(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA">(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA</option>
                            <option value="(USM) UNIVERSITI SAINS MALAYSIA">(USM) UNIVERSITI SAINS MALAYSIA</option>
                            <option value="(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA">(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA</option>
                            <option value="(UPM) UNIVERSITI PUTRA MALAYSIA">(UPM) UNIVERSITI PUTRA MALAYSIA</option>
                            <option value="(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS">(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS</option>
                            <option value="(UKM) UNIVERSITI KEBANGSAAN MALAYSIA">(UKM) UNIVERSITI KEBANGSAAN MALAYSIA</option>
                            <option value="(UTM) UNIVERSITI TEKNOLOGI MALAYSIA">(UTM) UNIVERSITI TEKNOLOGI MALAYSIA</option>
                            <option value="(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA">(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA</option>
                        </select>&nbsp; &nbsp;
                        <select id="course1" name="course1" style="width:45%">
                            <option value="" >Pilih Courses</option>
                            <!--<option value="Bujang">Bujang</option>
                            <option value="Berkahwin">Berkahwin</option>
                            <option value="Duda/Janda">Duda/Janda</option>-->
                        </select><br>
                        <script>
                            $(document).ready(function () {
                                $("#uni1").change(function () {
                                    switch($(this).val()) {
                                        case '(UiTM) UNIVERSITI TEKNOLOGI MARA':
                                            $("#course1").html("<option value='SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)'>SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)</option><option value='SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)'>SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)</option>");
                                            break;
                                        case '(UM) UNIVERSITI MALAYA':
                                            $("#course1").html("<option value='SARJANA MUDA SAINS (SAINS BAHAN)'>SARJANA MUDA SAINS (SAINS BAHAN)</option><option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)</option><option value='SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)'>SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)</option>");
                                            break;
                                        case '(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA':
                                            $("#course1").html("<option value='SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB'>SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB</option><option value='SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM'>SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM</option><option value='SARJANA MUDA SAINS KEMANUSIAAN'>SARJANA MUDA SAINS KEMANUSIAAN</option>");
                                            break;
                                        case '(USM) UNIVERSITI SAINS MALAYSIA':
                                            $("#course1").html("<option value='SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)'>SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)</option><option value='SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)'>SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)</option>");
                                            break;
                                        case '(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA':
                                            $("#course1").html("<option value='SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)'>SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)</option><option value='SARJANA MUDA KEJURUTERAAN MEKANIKAL'>SARJANA MUDA KEJURUTERAAN MEKANIKAL</option><option value='SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)'>SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)</option><option value='SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)'>SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)</option>");
                                            break;
                                        case '(UPM) UNIVERSITI PUTRA MALAYSIA':
                                            $("#course1").html("<option value='SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR'>SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR</option><option value='SARJANA MUDA PENGURUSAN ALAM SEKITAR'>SARJANA MUDA PENGURUSAN ALAM SEKITAR</option>");
                                            break;
                                        case '(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS':
                                            $("#course1").html("<option value='SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)'>SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)</option><option value='SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)'>SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)</option><option value='SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)'>SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)</option>");
                                            break;
                                        case '(UKM) UNIVERSITI KEBANGSAAN MALAYSIA':
                                            $("#course1").html("<option value='SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)'>SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)</option><option value='SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)'>SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)</option>");
                                            break;
                                        case '(UTM) UNIVERSITI TEKNOLOGI MALAYSIA':
                                            $("#course1").html("<option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)</option><option value='SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)'>SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)</option><option value='SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)'>SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)</option>");
                                            break;
                                        case '(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA':
                                            $("#course1").html("<option value='SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) '>SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) </option><option value='SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN '>SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN </option><option value='SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM '>SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM </option>");
                                            break;
                                        default:
                                            $("#course1").html("<option value='' >Pilih Courses</option>");
                                    }
                                });
                                });
                        </script>
                        <!-- PILIHAN 2 -->
                        <label for="pilihan2"><b>Pilihan 2 </b></label>&nbsp;
                        <select id="uni2" name="uni2" style="width:34%" required>
                            <option value="" disabled selected>Pilih University</option>
                            <option value="(UiTM) UNIVERSITI TEKNOLOGI MARA">(UiTM) UNIVERSITI TEKNOLOGI MARA</option>
                            <option value="(UM) UNIVERSITI MALAYA">(UM) UNIVERSITI MALAYA</option>
                            <option value="(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA">(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA</option>
                            <option value="(USM) UNIVERSITI SAINS MALAYSIA">(USM) UNIVERSITI SAINS MALAYSIA</option>
                            <option value="(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA">(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA</option>
                            <option value="(UPM) UNIVERSITI PUTRA MALAYSIA">(UPM) UNIVERSITI PUTRA MALAYSIA</option>
                            <option value="(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS">(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS</option>
                            <option value="(UKM) UNIVERSITI KEBANGSAAN MALAYSIA">(UKM) UNIVERSITI KEBANGSAAN MALAYSIA</option>
                            <option value="(UTM) UNIVERSITI TEKNOLOGI MALAYSIA">(UTM) UNIVERSITI TEKNOLOGI MALAYSIA</option>
                            <option value="(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA">(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA</option>
                        </select>&nbsp; &nbsp;
                        <select id="course2" name="course2" style="width:45%">
                            <option value="" >Pilih Courses</option>
                            <!--<option value="Bujang">Bujang</option>
                            <option value="Berkahwin">Berkahwin</option>
                            <option value="Duda/Janda">Duda/Janda</option>-->
                        </select><br>
                        <script>
                            $(document).ready(function () {
                                $("#uni2").change(function () {
                                    switch($(this).val()) {
                                        case '(UiTM) UNIVERSITI TEKNOLOGI MARA':
                                            $("#course2").html("<option value='SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)'>SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)</option><option value='SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)'>SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)</option>");
                                            break;
                                        case '(UM) UNIVERSITI MALAYA':
                                            $("#course2").html("<option value='SARJANA MUDA SAINS (SAINS BAHAN)'>SARJANA MUDA SAINS (SAINS BAHAN)</option><option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)</option><option value='SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)'>SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)</option>");
                                            break;
                                        case '(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA':
                                            $("#course2").html("<option value='SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB'>SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB</option><option value='SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM'>SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM</option><option value='SARJANA MUDA SAINS KEMANUSIAAN'>SARJANA MUDA SAINS KEMANUSIAAN</option>");
                                            break;
                                        case '(USM) UNIVERSITI SAINS MALAYSIA':
                                            $("#course2").html("<option value='SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)'>SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)</option><option value='SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)'>SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)</option>");
                                            break;
                                        case '(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA':
                                            $("#course2").html("<option value='SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)'>SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)</option><option value='SARJANA MUDA KEJURUTERAAN MEKANIKAL'>SARJANA MUDA KEJURUTERAAN MEKANIKAL</option><option value='SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)'>SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)</option><option value='SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)'>SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)</option>");
                                            break;
                                        case '(UPM) UNIVERSITI PUTRA MALAYSIA':
                                            $("#course2").html("<option value='SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR'>SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR</option><option value='SARJANA MUDA PENGURUSAN ALAM SEKITAR'>SARJANA MUDA PENGURUSAN ALAM SEKITAR</option>");
                                            break;
                                        case '(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS':
                                            $("#course2").html("<option value='SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)'>SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)</option><option value='SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)'>SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)</option><option value='SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)'>SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)</option>");
                                            break;
                                        case '(UKM) UNIVERSITI KEBANGSAAN MALAYSIA':
                                            $("#course2").html("<option value='SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)'>SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)</option><option value='SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)'>SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)</option>");
                                            break;
                                        case '(UTM) UNIVERSITI TEKNOLOGI MALAYSIA':
                                            $("#course2").html("<option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)</option><option value='SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)'>SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)</option><option value='SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)'>SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)</option>");
                                            break;
                                        case '(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA':
                                            $("#course2").html("<option value='SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) '>SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) </option><option value='SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN '>SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN </option><option value='SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM '>SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM </option>");
                                            break;
                                        default:
                                            $("#course2").html("<option value='' >Pilih Courses</option>");
                                    }
                                });
                                });
                        </script>
                        <!-- PILIHAN 3 -->
                        <label for="pilihan3"><b>Pilihan 3 </b></label>&nbsp;
                        <select id="uni3" name="uni3" style="width:34%" required>
                            <option value="" disabled selected>Pilih University</option>
                            <option value="(UiTM) UNIVERSITI TEKNOLOGI MARA">(UiTM) UNIVERSITI TEKNOLOGI MARA</option>
                            <option value="(UM) UNIVERSITI MALAYA">(UM) UNIVERSITI MALAYA</option>
                            <option value="(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA">(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA</option>
                            <option value="(USM) UNIVERSITI SAINS MALAYSIA">(USM) UNIVERSITI SAINS MALAYSIA</option>
                            <option value="(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA">(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA</option>
                            <option value="(UPM) UNIVERSITI PUTRA MALAYSIA">(UPM) UNIVERSITI PUTRA MALAYSIA</option>
                            <option value="(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS">(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS</option>
                            <option value="(UKM) UNIVERSITI KEBANGSAAN MALAYSIA">(UKM) UNIVERSITI KEBANGSAAN MALAYSIA</option>
                            <option value="(UTM) UNIVERSITI TEKNOLOGI MALAYSIA">(UTM) UNIVERSITI TEKNOLOGI MALAYSIA</option>
                            <option value="(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA">(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA</option>
                        </select>&nbsp; &nbsp;
                        <select id="course3" name="course3" style="width:45%">
                            <option value="" >Pilih Courses</option>
                            <!--<option value="Bujang">Bujang</option>
                            <option value="Berkahwin">Berkahwin</option>
                            <option value="Duda/Janda">Duda/Janda</option>-->
                        </select><br>
                        <script>
                            $(document).ready(function () {
                                $("#uni3").change(function () {
                                    switch($(this).val()) {
                                        case '(UiTM) UNIVERSITI TEKNOLOGI MARA':
                                            $("#course3").html("<option value='SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)'>SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)</option><option value='SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)'>SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)</option>");
                                            break;
                                        case '(UM) UNIVERSITI MALAYA':
                                            $("#course3").html("<option value='SARJANA MUDA SAINS (SAINS BAHAN)'>SARJANA MUDA SAINS (SAINS BAHAN)</option><option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)</option><option value='SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)'>SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)</option>");
                                            break;
                                        case '(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA':
                                            $("#course3").html("<option value='SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB'>SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB</option><option value='SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM'>SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM</option><option value='SARJANA MUDA SAINS KEMANUSIAAN'>SARJANA MUDA SAINS KEMANUSIAAN</option>");
                                            break;
                                        case '(USM) UNIVERSITI SAINS MALAYSIA':
                                            $("#course3").html("<option value='SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)'>SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)</option><option value='SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)'>SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)</option>");
                                            break;
                                        case '(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA':
                                            $("#course3").html("<option value='SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)'>SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)</option><option value='SARJANA MUDA KEJURUTERAAN MEKANIKAL'>SARJANA MUDA KEJURUTERAAN MEKANIKAL</option><option value='SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)'>SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)</option><option value='SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)'>SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)</option>");
                                            break;
                                        case '(UPM) UNIVERSITI PUTRA MALAYSIA':
                                            $("#course3").html("<option value='SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR'>SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR</option><option value='SARJANA MUDA PENGURUSAN ALAM SEKITAR'>SARJANA MUDA PENGURUSAN ALAM SEKITAR</option>");
                                            break;
                                        case '(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS':
                                            $("#course3").html("<option value='SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)'>SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)</option><option value='SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)'>SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)</option><option value='SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)'>SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)</option>");
                                            break;
                                        case '(UKM) UNIVERSITI KEBANGSAAN MALAYSIA':
                                            $("#course3").html("<option value='SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)'>SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)</option><option value='SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)'>SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)</option>");
                                            break;
                                        case '(UTM) UNIVERSITI TEKNOLOGI MALAYSIA':
                                            $("#course3").html("<option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)</option><option value='SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)'>SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)</option><option value='SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)'>SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)</option>");
                                            break;
                                        case '(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA':
                                            $("#course3").html("<option value='SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) '>SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) </option><option value='SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN '>SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN </option><option value='SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM '>SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM </option>");
                                            break;
                                        default:
                                            $("#course3").html("<option value='' >Pilih Courses</option>");
                                    }
                                });
                                });
                        </script>
                        <!-- PILIHAN 4 -->
                        <label for="pilihan4"><b>Pilihan 4 </b></label>&nbsp;
                        <select id="uni4" name="uni4" style="width:34%" required>
                            <option value="" disabled selected>Pilih University</option>
                            <option value="(UiTM) UNIVERSITI TEKNOLOGI MARA">(UiTM) UNIVERSITI TEKNOLOGI MARA</option>
                            <option value="(UM) UNIVERSITI MALAYA">(UM) UNIVERSITI MALAYA</option>
                            <option value="(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA">(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA</option>
                            <option value="(USM) UNIVERSITI SAINS MALAYSIA">(USM) UNIVERSITI SAINS MALAYSIA</option>
                            <option value="(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA">(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA</option>
                            <option value="(UPM) UNIVERSITI PUTRA MALAYSIA">(UPM) UNIVERSITI PUTRA MALAYSIA</option>
                            <option value="(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS">(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS</option>
                            <option value="(UKM) UNIVERSITI KEBANGSAAN MALAYSIA">(UKM) UNIVERSITI KEBANGSAAN MALAYSIA</option>
                            <option value="(UTM) UNIVERSITI TEKNOLOGI MALAYSIA">(UTM) UNIVERSITI TEKNOLOGI MALAYSIA</option>
                            <option value="(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA">(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA</option>
                        </select>&nbsp; &nbsp;
                        <select id="course4" name="course4" style="width:45%">
                            <option value="" >Pilih Courses</option>
                            <!--<option value="Bujang">Bujang</option>
                            <option value="Berkahwin">Berkahwin</option>
                            <option value="Duda/Janda">Duda/Janda</option>-->
                        </select><br>
                        <script>
                            $(document).ready(function () {
                                $("#uni4").change(function () {
                                    switch($(this).val()) {
                                        case '(UiTM) UNIVERSITI TEKNOLOGI MARA':
                                            $("#course4").html("<option value='SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)'>SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)</option><option value='SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)'>SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)</option>");
                                            break;
                                        case '(UM) UNIVERSITI MALAYA':
                                            $("#course4").html("<option value='SARJANA MUDA SAINS (SAINS BAHAN)'>SARJANA MUDA SAINS (SAINS BAHAN)</option><option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)</option><option value='SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)'>SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)</option>");
                                            break;
                                        case '(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA':
                                            $("#course4").html("<option value='SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB'>SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB</option><option value='SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM'>SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM</option><option value='SARJANA MUDA SAINS KEMANUSIAAN'>SARJANA MUDA SAINS KEMANUSIAAN</option>");
                                            break;
                                        case '(USM) UNIVERSITI SAINS MALAYSIA':
                                            $("#course4").html("<option value='SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)'>SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)</option><option value='SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)'>SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)</option>");
                                            break;
                                        case '(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA':
                                            $("#course4").html("<option value='SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)'>SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)</option><option value='SARJANA MUDA KEJURUTERAAN MEKANIKAL'>SARJANA MUDA KEJURUTERAAN MEKANIKAL</option><option value='SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)'>SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)</option><option value='SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)'>SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)</option>");
                                            break;
                                        case '(UPM) UNIVERSITI PUTRA MALAYSIA':
                                            $("#course4").html("<option value='SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR'>SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR</option><option value='SARJANA MUDA PENGURUSAN ALAM SEKITAR'>SARJANA MUDA PENGURUSAN ALAM SEKITAR</option>");
                                            break;
                                        case '(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS':
                                            $("#course4").html("<option value='SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)'>SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)</option><option value='SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)'>SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)</option><option value='SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)'>SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)</option>");
                                            break;
                                        case '(UKM) UNIVERSITI KEBANGSAAN MALAYSIA':
                                            $("#course4").html("<option value='SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)'>SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)</option><option value='SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)'>SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)</option>");
                                            break;
                                        case '(UTM) UNIVERSITI TEKNOLOGI MALAYSIA':
                                            $("#course4").html("<option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)</option><option value='SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)'>SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)</option><option value='SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)'>SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)</option>");
                                            break;
                                        case '(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA':
                                            $("#course4").html("<option value='SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) '>SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) </option><option value='SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN '>SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN </option><option value='SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM '>SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM </option>");
                                            break;
                                        default:
                                            $("#course4").html("<option value='' >Pilih Courses</option>");
                                    }
                                });
                                });
                        </script>
                        <!-- PILIHAN 5 -->
                        <label for="pilihan5"><b>Pilihan 5 </b></label>&nbsp;
                        <select id="uni5" name="uni5" style="width:34%" required>
                            <option value="" disabled selected>Pilih University</option>
                            <option value="(UiTM) UNIVERSITI TEKNOLOGI MARA">(UiTM) UNIVERSITI TEKNOLOGI MARA</option>
                            <option value="(UM) UNIVERSITI MALAYA">(UM) UNIVERSITI MALAYA</option>
                            <option value="(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA">(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA</option>
                            <option value="(USM) UNIVERSITI SAINS MALAYSIA">(USM) UNIVERSITI SAINS MALAYSIA</option>
                            <option value="(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA">(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA</option>
                            <option value="(UPM) UNIVERSITI PUTRA MALAYSIA">(UPM) UNIVERSITI PUTRA MALAYSIA</option>
                            <option value="(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS">(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS</option>
                            <option value="(UKM) UNIVERSITI KEBANGSAAN MALAYSIA">(UKM) UNIVERSITI KEBANGSAAN MALAYSIA</option>
                            <option value="(UTM) UNIVERSITI TEKNOLOGI MALAYSIA">(UTM) UNIVERSITI TEKNOLOGI MALAYSIA</option>
                            <option value="(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA">(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA</option>
                        </select>&nbsp; &nbsp;
                        <select id="course5" name="course5" style="width:45%">
                            <option value="" >Pilih Courses</option>
                            <!--<option value="Bujang">Bujang</option>
                            <option value="Berkahwin">Berkahwin</option>
                            <option value="Duda/Janda">Duda/Janda</option>-->
                        </select><br>
                        <script>
                            $(document).ready(function () {
                                $("#uni5").change(function () {
                                    switch($(this).val()) {
                                        case '(UiTM) UNIVERSITI TEKNOLOGI MARA':
                                            $("#course5").html("<option value='SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)'>SARJANA MUDA SENI REKA GERAK KREATIF (KEPUJIAN)</option><option value='SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)'>SARJANA MUDA PENGAJIAN BUDAYA VISUAL (KEPUJIAN)</option>");
                                            break;
                                        case '(UM) UNIVERSITI MALAYA':
                                            $("#course5").html("<option value='SARJANA MUDA SAINS (SAINS BAHAN)'>SARJANA MUDA SAINS (SAINS BAHAN)</option><option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (SEJARAH & FALSAFAH SAINS)</option><option value='SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)'>SARJANA MUDA SASTERA (PENULISAN KREATIF & DESKRIPTIF)</option>");
                                            break;
                                        case '(UIA) UNIVERSITI ISLAM ANTARABANGSA MALAYSIA':
                                            $("#course5").html("<option value='SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB'>SARJANA MUDA BAHASA DAN KESUSASTERAAN ARAB</option><option value='SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM'>SARJANA MUDA ILMU WAHYU DAN WARISAN ISLAM</option><option value='SARJANA MUDA SAINS KEMANUSIAAN'>SARJANA MUDA SAINS KEMANUSIAAN</option>");
                                            break;
                                        case '(USM) UNIVERSITI SAINS MALAYSIA':
                                            $("#course5").html("<option value='SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)'>SARJANA MUDA TEKNOLOGI (KEPUJIAN) (BIOSUMBER)</option><option value='SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)'>SARJANA MUDA SAINS (KEPUJIAN) (KIMIA)</option>");
                                            break;
                                        case '(UTeM) UNIVERSITI TEKNIKAL MALAYSIA MELAKA':
                                            $("#course5").html("<option value='SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)'>SARJANA MUDA SAINS KOMPUTER (PEMBANGUNAN PERISIAN)</option><option value='SARJANA MUDA KEJURUTERAAN MEKANIKAL'>SARJANA MUDA KEJURUTERAAN MEKANIKAL</option><option value='SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)'>SARJANA MUDA SAINS KOMPUTER (KEPINTARAN BUATAN)</option><option value='SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)'>SARJANA MUDA SAINS KOMPUTER (PENGURUSAN PANGKALAN DATA)</option>");
                                            break;
                                        case '(UPM) UNIVERSITI PUTRA MALAYSIA':
                                            $("#course5").html("<option value='SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR'>SARJANA MUDA SAINS DAN TEKNOLOGI ALAM SEKITAR</option><option value='SARJANA MUDA PENGURUSAN ALAM SEKITAR'>SARJANA MUDA PENGURUSAN ALAM SEKITAR</option>");
                                            break;
                                        case '(UPSI) UNIVERSITI PENDIDIKAN SULTAN IDRIS':
                                            $("#course5").html("<option value='SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)'>SARJANA MUDA PENDIDIKAN (EKONOMI RUMAHTANGGA)</option><option value='SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)'>SARJANA MUDA PENDIDIKAN (BAHASA MELAYU)</option><option value='SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)'>SARJANA MUDA PENDIDIKAN (BIMBINGAN DAN KAUNSELING)</option>");
                                            break;
                                        case '(UKM) UNIVERSITI KEBANGSAAN MALAYSIA':
                                            $("#course5").html("<option value='SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)'>SARJANA MUDA PENGAJIAN ISLAM DENGAN KEPUJIAN (SYARIAH)</option><option value='SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)'>SARJANA MUDA PENDIDIKAN DENGAN KEPUJIAN (SUKAN DAN REKREASI)</option>");
                                            break;
                                        case '(UTM) UNIVERSITI TEKNOLOGI MALAYSIA':
                                            $("#course5").html("<option value='SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)'>SARJANA MUDA SAINS DENGAN KEPUJIAN (REKABENTUK INDUSTRI)</option><option value='SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)'>SARJANA MUDA TEKNOLOGI DENGAN PENDIDIKAN (BINAAN BANGUNAN)</option><option value='SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)'>SARJANA MUDA TEKNOLOGI (KEJURUTERAAN MEKANIKAL)</option>");
                                            break;
                                        case '(UPNM) UNIVERSITI PERTAHANAN NASIONAL MALAYSIA':
                                            $("#course5").html("<option value='SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) '>SARJANA MUDA SAINS KOMPUTER (KESELAMATAN SISTEM KOMPUTER) </option><option value='SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN '>SARJANA MUDA PENGURUSAN SUMBER MANUSIA PERTAHANAN </option><option value='SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM '>SARJANA MUDA PERTAHANAN DAN KESELAMATAN ISLAM </option>");
                                            break;
                                        default:
                                            $("#course5").html("<option value='' >Pilih Courses</option>");
                                    }
                                });
                                });
                        </script><br>
                        <div style="padding : 0px 400px;">
                            <button type="reset" class="buttonForm cancelbtn">Reset</button>
                            <button type="submit" name="submitApplication" class="buttonForm submitbtn">SIMPAN</button><br><br><br>
                        </div>
                    </form>
                    <!--  FOR FUTURE REFERENCES
                    <label for="pilihan5"><b>Pilihan 5 </b></label>&nbsp;
                        <select id="uni5" name="uni5" style="width:34%">
                            <option value="" disabled selected>Pilih University</option>
                            <option value="(UiTM) UNIVERSITI TEKNOLOGI MARA">(UiTM) UNIVERSITI TEKNOLOGI MARA</option>
                            <option value="(UM) UNIVERSITI MALAYA">(UM) UNIVERSITI MALAYA</option>
                        </select>&nbsp; &nbsp;
                        <select id="course5" name="course5" style="width:45%">
                            <option value="" >Pilih Courses</option>
                        </select><br>
                        <script>
                            $(document).ready(function () {
                                $("#uni5").change(function () {
                                    switch($(this).val()) {
                                        case '(UiTM) UNIVERSITI TEKNOLOGI MARA':
                                            $("#course5").html("<option value=" "> </option><option value=" "> </option>");
                                            break;
                                        case '(UM) UNIVERSITI MALAYA':
                                            $("#course5").html(" <option value=" "> </option><option value=" "> </option>");
                                            break;
                                        default:
                                            $("#course5").html("<option value='' >Pilih Courses</option>");
                                    }
                                });
                                });
                        </script>-->
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