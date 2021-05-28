<!-- REGISTER -->
<?php
    if (isset($_POST['submitRegister'])) {
        $username = $_POST["username"]; //value from php
        $ic_num = $_POST["ic_num"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $password = $_POST["pass"];
        $sql = mysqli_query($connect," SELECT * FROM user WHERE ic_num = '$ic_num' ");        
        if (mysqli_num_rows($sql)>0) {  
            $message = "NO KAD PENGENALAN ANDA SUDAH DIPAKAI, SILA REGISTER SEMULA MENGGUNAKAN NO KAD PENGENALAN YANG BAHARU"; 
            echo "<script>
                    alert('$message')
                    window.location.replace('index.php');
                </script>";
        }else{
            $sql = "INSERT INTO user (username , ic_num , gender , email , password) VALUES ('$username', '$ic_num', '$gender', '$email', '$password')"; //value from database
            $sendsql = mysqli_query($connect , $sql);
            if ($sendsql){//other way to display alert box + header
                $message = 'TAHNIAH, ANDA BERJAYA REGISTER AKAUN ANDA \n\nSILA LOG IN MENGGUNAKAN NO KAD PENGENALAN DAN PASSWORD ANDA'; 
                echo "<script>
                        alert('$message')
                        window.location.replace('index.php'); 
                    </script>";
            }
        }
    }
?>

<!-- LOG IN -->
<?php
    if (isset($_POST["submitLogin"])){
        if(($_POST['ic_num']) ||  ($_POST['pass'])){
            $ic_num = mysqli_real_escape_string($connect, $_POST['ic_num']);
            $password = mysqli_real_escape_string($connect, $_POST['pass']);
            $sql = mysqli_query($connect," SELECT * FROM user WHERE ic_num = '$ic_num' AND password ='$password' ");        
            if (mysqli_num_rows($sql)>0) {  
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['username'] = $row['username'];
                $_SESSION['ic_num'] = $row['ic_num'];
                $_SESSION['user_id'] = $row['user_id'];
                header("location:index.php",true,301);exit;
            }
            else{
                $message = "invalid ic number or password";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }
?>


<!-- REGISTER -->
<div class="modal-container" id="register_modal">
    <div class="modal">
        <h1>REGISTER</h1>
        <form name="registerForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div style="overflow: auto; width: 100%; height: 40%;">
                <label for="username"><b>Username</b></label>
                <input type="text" id="username" placeholder="Masukkan Username" name="username" required>

                <label for="ic_num"><b>No Kad Pengenalan</b></label>
                <input type="text" id="ic_num" placeholder="No Kad Pengenalan tanpa '-' " name="ic_num" oninput="inputNumber(this.id);" maxlength="12" required/>


                <label for="email"><b>Alamat Email</b></label>
                <input type="email" id="email" placeholder="Masukkan Alamat Email" name="email" required>

                <b>Jantina</b><br>
                <input type="radio" id="Lelaki" name="gender" value="Lelaki" required> Lelaki &nbsp;
                <input type="radio" id="Perempuan" name="gender" value="Perempuan"> Perempuan &nbsp;
                <input type="radio" id="Lain-lain" name="gender" value="Lain-lain"> Lain-lain
                <br><br>
                
                <label for="pass"><b>Password</b></label>
                <input type="password" id="pass" placeholder="Masukkan Password" name="pass" required>

                <label for="pass-repeat"><b>Sahkan Password</b></label>
                <input type="password" id="pass-repeat" placeholder="Ulang Semula Password" name="pass-repeat" required>
            </div>
            
            <button class="buttonForm cancelbtn" id="closeRegister">Close</button>
            <button type="submit" name="submitRegister" class="buttonForm submitbtn">Sign Up</button>
        </form>
    </div>
</div>




<!-- LOGIN -->
<div class="modal-container" id="login_modal">
    <div class="modal">
        <h1>LOG IN</h1>
        <form name="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="username"><b>No Kad Pengenalan</b></label>
            <input type="text" id="ic_num" placeholder="Masukkan No Kad Pengenalan tanpa '-' " name="ic_num" oninput="inputNumber(this.id);" maxlength="12" required>

            <label for="pass"><b>Password</b></label>
            <input type="password" id="pass" placeholder="Enter Password" name="pass" required>

            <button class="buttonForm cancelbtn" id="closeLogin">Close</button>
            <button type="submit" name="submitLogin" class="buttonForm submitbtn">LOG IN</button>
        </form>
    </div>
</div>


<script> 
//Script to use number on input[type=text] , input[type=number] can't use maxlength
function inputNumber(id) {
    // Get element by id which passed as parameter within HTML element event
    var element = document.getElementById(id);
    // This removes any other character but numbers as entered by user
    element.value = element.value.replace(/[^0-9]/gi, "");
}

//PASSWORD MATCH
let password = document.getElementById("pass")
let confirm_password = document.getElementById("pass-repeat");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
