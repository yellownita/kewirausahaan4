<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
	echo "
		<script>
			alert('data deleted successfully!');
			document.location.href = 'index.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data cannot be deleted!');
			document.location.href = 'index.php';
		</script>
	";
}

?>