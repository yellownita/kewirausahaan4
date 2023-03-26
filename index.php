<?php 
session_start();

 if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
 	exit;
}
 if ( $_SESSION["username"] == "admin"){
  
 } else {
  // header("Location: index.php");
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

<nav class="navbar">
  <ul class="navbar-nav">
    <li class="nav-item">
      <h1 class="nav-title">Dashboard <?=$_SESSION["username"]; ?></h1>
    </li>
    <!-- <li class="nav-item">
      <h4 class="nav-greeting">Hello,</h4>
    </li> -->
    <li class="nav-item nav-search">
      <form id="src_form" action="" method="post">
        <input id="src_input" type="text" name="keyword" size="40" autofocus placeholder="Search..." autocomplete="off" />
        <button id="src_button" type="submit" name="cari">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
        </button>
      </form>
    </li>
    <li class="nav-item">
      <a href="./logout.php"><button class="nav-button"><img src="./img/kon.png" alt="" width="25px"></button></a>
    </li>
  </ul>
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

          </p>
      </a>
      </div>
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
	
                  <th >No</th>
                  <th >Images</th>
                  <th>Product</th>
                  <th >Price</th>
                  <th>Stock</th>
                  <th>Action</th>
                  <th>Last Edit</th>
                
	</tr>
</thead>

	<?php $i = 1; ?>
	<?php foreach( $barang as $row ) : ?>
		<tbody>
	<tr>
		<td><?= $i; ?></td>
        <td ><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
        <td><?= $row["nama_barang"]; ?></td>
        <td>Rp.<?= $row["harga"]; ?></td>
        <td><?= $row["stok"]; ?></td>
		<td>
			<a href="ubahproduct.php?id=<?= $row["id_barang"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zm4.799-2.013H8v-1.799l4.977-4.97 1.799 1.799-4.977 4.97zm5.824-5.817-1.799-1.799L15.196 11l1.799 1.799-1.372 1.371zM5 7h14v2H5V7z"></path></svg></a>
			<a href="hapusproduct.php?id=<?= $row["id_barang"]; ?>" onclick="return confirm('yakin?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg></a>
		</td>
		<td><?= $row["username"]; ?></td>
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