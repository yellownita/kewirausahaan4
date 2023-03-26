<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./style.css"/>
	<title>Halaman Registrasi</title>
	
</head>
<body>



<main>
      <div class="box">
        <div class="inner-box">
        <div class="forms-wrap">
		<form action="" class="sign-in-form" method="post">

		<div class="logo">
                <img src="./img/shopping.png"  alt="urcrushie" />
                <h4>Register</h4>
              </div>
	
			<div class="actual-form">

				<div class="input-wrap">
					
					<input type="text"  class="input-field" 
                    autocomplete="off" placeholder="Nama" name="nama" id="nama">
				</div> 

				<div class="input-wrap">
					
					<input type="text"  class="input-field" 
                    autocomplete="off" placeholder="Email" name="email" id="email">
				</div>

				<div class="input-wrap">
					
					<input type="text"  class="input-field" 
                    autocomplete="off" placeholder="Whatsapp" name="wa" id="wa">
				</div>

            	<div class="input-wrap">
					
					<input type="text"  class="input-field"
                    autocomplete="off" name="username" placeholder="Username"
                    required name="username" id="username">
				</div>

				<div class="input-wrap">
					
					<input type="password" class="input-field" id="password"
                    autocomplete="off" name="password" placeholder="Password"
                    required name="password" id="password">
				</div>
				
				<input type="submit" name="register" class="submit" value=" Register"></input>
			</div>
			<a href="login.php">login</a>
			</div>
		
			
		</form>
</div>
<div class="groce">
              
    

           
			  </div>
			</div>
		  </div>
		</main>
	
		
	</form>
	
</body>
</html>