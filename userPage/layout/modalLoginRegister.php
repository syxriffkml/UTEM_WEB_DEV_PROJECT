<!-- REGISTER -->
<?php
    if (isset($_POST['submitRegister'])) {
        $username = $_POST["username"]; //value from php
        $ic_num = $_POST["ic_num"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $password = $_POST["pass"];

        $sql = "INSERT INTO user (username , ic_num , gender , email , password) VALUES ('$username', '$ic_num', '$gender', '$email', '$password')"; //value from database
	
        $sendsql = mysqli_query($connect , $sql);

        if ($sendsql){
            header ("location: index.php",true,  301 );  exit;
        }
    }
?>


<!-- LOG IN -->
<?php
    if (isset($_POST["submitLogin"])){
        if(($_POST['username']) ||  ($_POST['pass'])){
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $password = mysqli_real_escape_string($connect, $_POST['pass']);
            $sql = mysqli_query($connect," SELECT * FROM user WHERE username = '$username' AND password ='$password' ");        
            if (mysqli_num_rows($sql)>0) {  
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['username'] = $row['username'];
                $_SESSION['ic_num'] = $row['ic_num'];
                //for session
                header ("location: index.php",true,  301 );  exit;
            }
            else{
                $message = "invalid username or password";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }
?>


<!-- REGISTER -->
<div class="modal-container" id="register_modal">
    <div class="modal">
        <h1>REGISTER</h1>
        <form name="registerForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div style="overflow: auto; width: 100%; height: 40%;">
                <label for="username"><b>Username</b></label>
                <input type="text" id="username" placeholder="Masukkan Username" name="username" required>

                <label for="ic_num"><b>No Kad Pengenalan</b></label>
                <input type="text" id="ic_num" placeholder="No Kad Pengenalan tanpa '-' " name="ic_num" oninput="inputNumber(this.id);" maxlength="12" required/>


                <labe for="email"><b>Alamat Email</b></labe>
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
            <button type="submit" name="submitRegister" class="buttonForm signupbtn">Sign Up</button>
        </form>
    </div>
</div>




<!-- LOGIN -->
<div class="modal-container" id="login_modal">
    <div class="modal">
        <h1>LOG IN</h1>
        <form name="loginForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username"><b>Username</b></label>
            <input type="text" id="username" placeholder="Masukkan Nama" name="username" required>

            <labe for="pass"><b>Password</b></labe>
            <input type="password" id="pass" placeholder="Enter Password" name="pass" required>

            <button class="buttonForm cancelbtn" id="closeLogin">Close</button>
            <button type="submit" name="submitLogin" class="buttonForm signupbtn">LOG IN</button>
        </form>
    </div>
</div>




<script type="text/javascript" src="../js/modal.js"></script>

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
