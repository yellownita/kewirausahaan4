<?php 
session_start();

 if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
 	exit;
}
 if ( $_SESSION["username"] == "admin"){
  
 } else {
  header("Location: index.php");
 }
require 'functions.php';




// pagination
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM forbarang"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$barang = query("SELECT * FROM forbarang LIMIT $awalData, $jumlahDataPerHalaman");

// $barang = query("SELECT * FROM forbarang");
$username = $_SESSION['username'];
// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$barang  = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./index.css">
	<title>Sembako Login</title>
</head>
<body>

<!-- haha -->


<nav>
      <ol id="nav_in">
        <li><h1>Dashboard Admin</h1></li>
        <li><h4>Hello, <?=$_SESSION["username"]; ?></h4></li>
        <li id="li-last">
          <form id="src_form" action="" method="post">
            <input
              id="src_input"
              type="text"
              name="keyword"
              size="40"
              autofocus
              placeholder="Search..."
              autocomplete="off"
            />
            <button id="src_button" type="submit" name="cari">
              <svg xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M39.8 41.95 26.65 28.8q-1.5 1.3-3.5 2.025-2 .725-4.25.725-5.4 0-9.15-3.75T6 18.75q0-5.3 3.75-9.05 3.75-3.75 9.1-3.75 5.3 0 9.025 3.75 3.725 3.75 3.725 9.05 0 2.15-.7 4.15-.7 2-2.1 3.75L42 39.75Zm-20.95-13.4q4.05 0 6.9-2.875Q28.6 22.8 28.6 18.75t-2.85-6.925Q22.9 8.95 18.85 8.95q-4.1 0-6.975 2.875T9 18.75q0 4.05 2.875 6.925t6.975 2.875Z"
                />
              </svg>
            </button>
          </form>
        </li>
        <li id="logout">
          <a href="./logout.php"><button id="bttnlgt">
              <a href="./logout.php"
                ><svg
                  height="40px"
                  width="40px"
                  version="1.1"
                  id="Layer_1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  viewBox="0 0 330 330"
                  xml:space="preserve"
                >
                  <g id="XMLID_2_">
                    <path
                      id="XMLID_4_"
                      d="M51.213,180h173.785c8.284,0,15-6.716,15-15s-6.716-15-15-15H51.213l19.394-19.393
                            c5.858-5.857,5.858-15.355,0-21.213c-5.856-5.858-15.354-5.858-21.213,0L4.397,154.391c-0.348,0.347-0.676,0.71-0.988,1.09
                            c-0.076,0.093-0.141,0.193-0.215,0.288c-0.229,0.291-0.454,0.583-0.66,0.891c-0.06,0.09-0.109,0.185-0.168,0.276
                            c-0.206,0.322-0.408,0.647-0.59,0.986c-0.035,0.067-0.064,0.138-0.099,0.205c-0.189,0.367-0.371,0.739-0.53,1.123
                            c-0.02,0.047-0.034,0.097-0.053,0.145c-0.163,0.404-0.314,0.813-0.442,1.234c-0.017,0.053-0.026,0.108-0.041,0.162
                            c-0.121,0.413-0.232,0.83-0.317,1.257c-0.025,0.127-0.036,0.258-0.059,0.386c-0.062,0.354-0.124,0.708-0.159,1.069
                            C0.025,163.998,0,164.498,0,165s0.025,1.002,0.076,1.498c0.035,0.366,0.099,0.723,0.16,1.08c0.022,0.124,0.033,0.251,0.058,0.374
                            c0.086,0.431,0.196,0.852,0.318,1.269c0.015,0.049,0.024,0.101,0.039,0.15c0.129,0.423,0.28,0.836,0.445,1.244
                            c0.018,0.044,0.031,0.091,0.05,0.135c0.16,0.387,0.343,0.761,0.534,1.13c0.033,0.065,0.061,0.133,0.095,0.198
                            c0.184,0.341,0.387,0.669,0.596,0.994c0.056,0.088,0.104,0.181,0.162,0.267c0.207,0.309,0.434,0.603,0.662,0.895
                            c0.073,0.094,0.138,0.193,0.213,0.285c0.313,0.379,0.641,0.743,0.988,1.09l44.997,44.997C52.322,223.536,56.161,225,60,225
                            s7.678-1.464,10.606-4.394c5.858-5.858,5.858-15.355,0-21.213L51.213,180z"
                    />
                    <path
                      id="XMLID_5_"
                      d="M207.299,42.299c-40.944,0-79.038,20.312-101.903,54.333c-4.62,6.875-2.792,16.195,4.083,20.816
                            c6.876,4.62,16.195,2.794,20.817-4.083c17.281-25.715,46.067-41.067,77.003-41.067C258.414,72.299,300,113.884,300,165
                            s-41.586,92.701-92.701,92.701c-30.845,0-59.584-15.283-76.878-40.881c-4.639-6.865-13.961-8.669-20.827-4.032
                            c-6.864,4.638-8.67,13.962-4.032,20.826c22.881,33.868,60.913,54.087,101.737,54.087C274.956,287.701,330,232.658,330,165
                            S274.956,42.299,207.299,42.299z"
                    />
                  </g>
                </svg>
              </a></button
          ></a>
        </li>
      </ol>
    </nav>

    <div class="namepr">
      <h6>Product</h6>
      <div class="plus">
        <a href="./tambahproduct.php
        "
          >
          <p class="parg">
          <a href="./tambahproduct.php">
            <img
              class="imgsrc"
              src="https://cdn-icons-png.flaticon.com/512/9393/9393389.png"
              alt=""
              height="30px"
            /> </a>
            <a href="./tambahproduct.php">
<!-- 
<svg class="svgyh" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 576 512"><path d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192H32c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512H430c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32H458.4L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192H171.7L253.3 35.1zM192 304v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16zm128 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V304c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg></a>  -->

          </p>
      </a>
      </div>
      <div class="plus2">
        <a href="./indexadminuser.php"
          ><p class="parg">
            <img
              class="imgsrc"
              src="https://cdn-icons-png.flaticon.com/512/456/456212.png"
              alt=""
              height="30px"
            />
          </p>
        </a>
      </div>
      <div class="plus3">
        <a href="./indexadmin.php"
          ><p class="parg">
            <img
              class="imgsrc"
              src="https://cdn-icons-png.flaticon.com/512/9299/9299212.png"
              alt=""
              height="30px"
            />
          </p>
        </a>
      </div>
	   <menu class="menu">
		<ul><img class="gmbr" src="/gambar/shopping.png" alt="" height="70px"></ul>
	  <br>
	</menu> 
    </div>


<!-- haha -->

<form action="" method="post">

</form>
<section id="conten">
      <main>
        <div class="title">
          <div class="on-on-left">
            <h1></h1>
          </div>
        </div>

        <div class="table_data">
          <div class="order">
            <table>
              <thead>

	<tr>
	
                  <th class="no">No</th>
                  <th class="img">Images</th>
                  <th class="prd">Product</th>
                  <th class="prc">Price</th>
                  <th class="st">Stock</th>
                  <th class="act">Action</th>
                  <th class="last">Last Edit</th>
                
	</tr>
</thead>

	<?php $i = 1; ?>
	<?php foreach( $barang as $row ) : ?>
		<tbody>
	<tr>
		<td class="no2"><?= $i; ?></td>
        <td class="img2" ><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
        <td class="prd2"><?= $row["nama_barang"]; ?></td>
        <td class="prc2">Rp.<?= $row["harga"]; ?></td>
        <td class="stck2"><?= $row["stok"]; ?></td>
		<td class="ed2">
			<a href="ubahproduct.php?id=<?= $row["id_barang"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zm4.799-2.013H8v-1.799l4.977-4.97 1.799 1.799-4.977 4.97zm5.824-5.817-1.799-1.799L15.196 11l1.799 1.799-1.372 1.371zM5 7h14v2H5V7z"></path></svg></a>
			<a href="hapusproduct.php?id=<?= $row["id_barang"]; ?>" onclick="return confirm('yakin?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg></a>
		</td>
		<td class="le2"><?= $row["username"]; ?></td>
	</tr>
	<br>
	</tbody>
	<?php $i++; ?>
	<?php endforeach; ?>
	

</table>
          </div>
        </div>
      </main>
      <!-- MAIN -->
    </section>

    

<!-- navigasi -->
<div id="paginations">
            <?php if( $halamanAktif > 1 ) : ?>
	            <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
                <?php endif; ?>

                <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                	<?php if( $i == $halamanAktif ) : ?>
                		<a href="?halaman=<?= $i; ?>" style="font-weight: bold; "><?= $i; ?></a>
                	<?php else : ?>
                		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                	<?php endif; ?>
                <?php endfor; ?>
                    
                <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                	<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
            <?php endif; ?>
  </div>







<!--  -->

  

    
<!-- paginatiom -->

             <!-- pag -->
           

<!-- tbl -->

       

</body>
</html>