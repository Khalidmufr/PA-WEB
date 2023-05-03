<?php 
	include "../koneksi.php" ;
	$gambar = $_FILES['gambar']['name'];
    $harga = $_POST['harga'];
	$file_tmp = $_FILES['gambar']['tmp_name'] ;
	$nama_produk = $_POST['nama_produk'] ;
	move_uploaded_file($file_tmp, '../file/'.$gambar) ;
	$query = "INSERT INTO produk SET 
			nama_produk = '$nama_produk',
			harga = '$harga',
			gambar = '$gambar';";
	if (mysqli_query($koneksi, $query)) {
		echo "<script>  alert('Berhasil');
		document.location.href = 'produk.php';
		</script>";
	} else {
		echo "<script>  alert('Gagal');
		document.location.href = 'produk.php';
		</script>";      
	}
?>