<?php

require "../koneksi.php";
  session_start()  ;

if ($_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
    exit();
  } ?>
<style>
	.isi{
	width: 100%;    
	background-color: white;
	}

	.konten-produk{
	padding: 20px;
	max-width: 80%;
	margin: 0 auto;
	margin-bottom: 35px;
	display: flex;
	align-items: center;
	justify-content: space-around;
	box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;

	}
	.konten-produk:hover{
	transition: 0.5s;
	box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
	}
	.konten-produk img{
	height: auto;
	width: 300px;
	}
	.isi-teks{
	width: 550px;
	}
	.isi-teks h2{
	color: black;
	font-size: 30px;
	text-transform: capitalize;
	margin-bottom: 20px;
	border-bottom: 1px solid black;
	}
	.isi-teks p{
	letter-spacing: 1px;
	line-height: 25px;
	font-size: 17px;
	margin-bottom:45px;
	text-align: justify;
	}
	.harga{
	font-size: 25px;
	margin: 10px;
	}
	button{
    color: white;
    background: burlywood;
    border: 1px solid burlywood;
    width: 200px;
    height: 40px;
    margin: 5px;
    padding: 5px;
    font-size: 16px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;
	}
	button a{
		text-decoration: none;
		color: white;
	}
	button:hover{    
		background: rgb(151, 78, 78);
		transition: 0.6s;
		border: 1px solid burlywood;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<title>Fitur Upload Foto dengan PHP & Mysql</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="icon" href="../asset/gambar/Ud Haderah.png">
</head>
<body>
	<div class="container">
		<div class="col-md-12 row justify-content-center">
			<div class="col-md-8 mt-4">
				<div class="col-md-12 mt-4">
					<h2>Fitur Upload Foto dengan PHP & Mysql</h2>
					By : <a href="https://www.rullystudio.com">Rully Studio</a>
				</div>
				<div class="col-md-12 mt-4">
					<a href="form_upload.php" class="btn btn-success mb-4">Upload</a>
					<?php 
						include "../koneksi.php" ;
						$data = mysqli_query($koneksi, "SELECT * FROM produk order by id_produk DESC") ;
						while ($row = mysqli_fetch_array($data)) {
					?>
					<!-- <div class="isi">       
						<div id="ulin" class="konten-produk">
							<div class="isi-teks">
								<h2><?php echo $row['nama_produk'] ; ?></h2>
								<p>Kayu ulin sering digunakan untuk membangun konstruksi bangunan seperti jembatan, pelabuhan, dermaga, dan bangunan tahan gempa.</p>                
								<div class="harga">Rp. 140.000/Batang</div>
								<a href="checkout.html"><button>Beli Sekarang</button></a>
							</div> 
							<img src="file/<?php echo $row['gambar'] ; ?>">
						</div>      
					</div> -->

					<div class="col-md-12 row mb-5">
						<div class="col-md-3">
							<img src="file/<?php echo $row['gambar'] ; ?>" style="width: 100%;">
						</div>
						<div class="col-md-9">
							<h2><?php echo $row['nama_produk'] ; ?></h2>
							<a href="delete.php?id=<?php echo $row['id_produk'] ; ?>" class="btn btn-danger mt-4">Delete</a>
						</div>
					</div>

					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>