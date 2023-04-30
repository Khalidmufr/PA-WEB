<?php
    session_start();
    
if ($_SESSION['role'] !== 'user') {
    header('Location: ../index.php');
    exit();
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
    exit();
  } ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/checkout.css">
    <link rel="icon" href="../asset/gambar/Ud Haderah.png">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Pesanan</title>
</head>
<body>
    <div class="container">
        <header>
            <label class="logo"><img src="../asset/gambar/Ud Haderah.png"></label>
                <nav>
                    <ul class="navbar">
                        <li><a href="beranda.php">Beranda</a></li>
                        <li><a href="produk.php">Produk</a></li>
                        <li><a href="keluhan.php">Keluhan</a></li>
                        <li><a href="lokasi.php">Lokasi</a></li>
                        <li class="keranjang"><a href="checkout.php"><span><h1></h1><i class="fa-solid fa-cart-shopping"></i></span></a></li>
                        <li class="dropdown">
                            <a href="javascript:void{0}" class="dropbtn"><img src="../asset/gambar/k.jpg" alt=""></a>
                            <div class="dropcontent">
                                <a href="#"><p><span> <i class="fa-solid fa-user"></i> </span><span><?php echo $_SESSION['nama']; ?></span></p></a>
                                <a href="pesanan.php"><p><span> <i class="fa-solid fa-box-open"></i> </span>Pesanan Anda</span></p></a>
                                <a href="?logout=true"><p> <i class="fa-solid fa-right-from-bracket"></i> Log Out</p></a>
                            </div>
                        </li>
                    </ul>
                </nav>
        </header>
        <section id="pesanan">            
            <?php 
                include "koneksi.php" ;
                $data = mysqli_query($koneksi, "SELECT * FROM produk order by id_produk DESC") ;
                while ($row = mysqli_fetch_array($data)) {
                    $harga = $row['harga'];
            ?>
            <div class="isi">       
                <div id="ulin" class="konten-produk">
                    <div class="isi-teks">
                        <h2><?php echo $row['nama_produk'] ; ?></h2>
                        <p>Kayu ulin sering digunakan untuk membangun konstruksi bangunan seperti jembatan, pelabuhan, dermaga, dan bangunan tahan gempa.</p>                
                        <div class="harga"> Rp <?php echo number_format($harga, 0, ',', '.'); ?></div>
                        <a href="#"><button>Lihat Pesanan</button></a>
                    </div> 
                    <img src="file/<?php echo $row['gambar'] ; ?>">
                </div>      
            </div>
            <?php } ?>
        </section>
    </div>
</body>
</html>