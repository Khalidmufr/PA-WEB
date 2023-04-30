<?php 
	include "../koneksi.php" ;
	$gambar = $_FILES['gambar']['name'];
	$file_tmp = $_FILES['gambar']['tmp_name'] ;
	$nama_produk = $_POST['nama_produk'] ;
	move_uploaded_file($file_tmp, '../file/'.$gambar) ;
	$query = "INSERT INTO produk SET 
			nama_produk = '$nama_produk',
			gambar = '$gambar'
	";
	mysqli_query($koneksi, $query)
	or die("SQL Error " .mysqli_error($a));
	header('location:produk.php');
?>