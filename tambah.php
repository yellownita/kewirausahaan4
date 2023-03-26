<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data added successfully!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data failed to add!');
				document.location.href = 'index.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./plus.css">
	<title>Tambah data </title>
</head>
<body>
	<form action="" method="post"  enctype="multipart/form-data" id="ubah">
    <div class="container">
      <h1 class="form-title">Create Product</h1>
      <div action="#">
        <div class="main-user-info">
          <div class="user-input-box">
            
            <input type="text"
                    id="nama_barang"
                    name="nama_barang"
                    placeholder="Enter name product" required/>
          </div>
          <div class="user-input-box">
          
            <input type="number"
                    id="harga"
                    name="harga"
                    placeholder="Enter price " required/>
          </div>
          <div class="user-input-box">
           
            <input type="number"
                    id="number"
                    name="stok"
                    placeholder="Enter stock "/>
          </div>
          <div class="text-center">
    <div class="preview_img">
      <div class="main_img">
        <picture>
               <img src="" id="preview" class="preview" alt="Not Image Selected">
        </picture>
      </div>
    </div>
          <div class="user-input-box">
          <form action="#" method="post">
           <div>
            <label class="imgUploadCss" id="imgLabel" for="imgUpload"><i class="fa-solid fa-cloud-arrow-up pr-5"></i> Choose Image</label>
            
            <input type="file" name="gambar" id="imgUpload" class="imgHidden" placeholder="gambar"  required>
    

          </div>
         
    
        </div>

       
        <div class="form-submit-btn">
          <button type="submit" name="submit" value="Save"> Create </button>
          <button><a href="./index.php">Back</a></button>
        </div>
      </form>
    </div>

    
  </body>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    
<script src="./js.js"></script>

<script>
let img = null;
    let imgUrl =null;
    let imgInput = document.getElementById('imgUpload')
    let nameShow = document.getElementById('imgLabel')
    let preview = document.getElementById('preview')


    function ReadUrl(input){
        let reader =  new FileReader();
         reader.onload = function(e) {
            imgUrl = e.target.result
            $('#preview').attr('src',e.target.result)
        }
        reader.readAsDataURL(input)

    }

    imgInput.addEventListener('change', function (e){
        if(e.currentTarget.files[0].type == 'image/png' ||e.currentTarget.files[0].type == 'image/jpeg'||e.currentTarget.files[0].type == 'image/jpg'){
            ReadUrl(e.currentTarget.files[0])
            img = e.currentTarget.files[0].name
            nameShow.innerText = img
        }else{
            nameShow.innerText = 'please, provide image file'
            nameShow.style.color = '#E91F63'
        }

    })
  
</script>
</html>