<?php 
	include "koneksi.php" ;
	$data = mysqli_query ($koneksi, "SELECT * FROM produk WHERE id_produk = '$_GET[id]' ") ;
	$row = mysqli_fetch_array($data) ;

	$foto = $row['gambar'] ;
	if(file_exists('file/'.$gambar))
	{
		unlink('file/'.$gambar) ;
	}
	$query = "DELETE FROM produk WHERE id_produk = '$_GET[id]' ";
	mysqli_query($koneksi, $query) or die ("SQL Error ".mysqli_error($s)) ;
	header('location:halaman.php')
?>