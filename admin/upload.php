<?php 
	include "koneksi.php" ;
	$gambar = $_FILES['gambar']['nama_produk'];
	$file_tmp = $_FILES['foto']['tmp_name'] ;
	$nama_produk = $_POST['nama_produk'] ;
	move_uploaded_file($file_tmp, 'file/'.$gambar) ;
	$query = "INSERT INTO produk SET 
								    nama = '$nama_produk',
								    foto = '$gambar'
	";
	mysqli_query($koneksi, $query)
	or die("SQL Error " .mysqli_error($a));
	header('location:halaman.php');
?>