<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM foruser WHERE id_user = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash($row['username']) ) {
		$_SESSION['login'] = true;
	
}

}

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
  $_SESSION["username"]=$username;
	$password = $_POST["password"];

	

	$result = mysqli_query($conn, "SELECT * FROM foruser WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
      
  if ($username == 'admin'){
    header("Location: indexadmin.php");
    exit();
  }else{
    header("Location: index.php");
    exit();
  }

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash($row['username']), time()+60);
			}
		

			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./style.css"/>
	<title>Halaman Login</title>
</head>
<body>
<?php if( isset($error) ) : ?>
  <script>
				alert('wrong password/username');
			  </script>
<?php endif; ?>


<main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action=""method="post" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                <img src="./img/shopping.png"  alt="urcrushie" />
                <h4>Login</h4>
              </div>
			
              <div class="actual-form">
                <div class="input-wrap">
                  <!-- <label for="">Username</label> -->
                  <input
                    type="text"
                    minlength="2"
                    class="input-field"
                    autocomplete="off" name="username" placeholder="Username"
                    required
                  />
                 
                </div>

                <div class="input-wrap">
                  <!-- <label for="">Password</label> -->
                  <input
                    type="password"
                    minlength="3"
                    class="input-field" id="password"
                    autocomplete="off" name="password" placeholder="Password"
                    required
                  />
                  <div id="toggle" onclick="showHide();"></div>
                  
                </div>

                <input type="submit" value="Sign In" class="submit" name="login">
                
              </div>
            </div>
            <a class="registrasi" href="./registrasi.php">Don't have an account?</a>
             
            </form>

           
          </div>

          <div class="groce">
              
    

           
          </div>
        </div>
      </div>
    </main>

	
</form>


<script src="script.js"></script>
  </body>
  <script type="text/javascript">
    const password = document.getElementById('password');
    const toggle = document.getElementById('toggle');
    
    function showHide(){
        if(password.type === 'password'){
            password.setAttribute('type', 'text');
            toggle.classList.add('hide')
        } else{
            password.setAttribute('type', 'password');
            toggle.classList.remove('hide')
        }
    }
</script>
</html>