<?php

require "koneksi.php";
  session_start()  ;

if ($_SESSION['role'] !== 'user') {
    header('Location: ../login.php');
    exit();
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../login.php');
    exit();
  } ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="icon" href="../asset/gambar/Ud Haderah.png">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Beranda</title>
</head>
<body>
<div class="container">
    <header>
        <label class="logo"><img src="../asset/gambar/Ud Haderah.png"></label>
            <nav>
                <ul class="navbar">
                    <li class="garis"><a href="beranda.php">Beranda</a></li>
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
    <?php

        // melihat jumlah keranjang session
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $cart_items = $_SESSION['cart'];
                $n = 0;
                foreach ($cart_items as $item) {
                $n+=1;
                }
                echo "<script>
                var noti = document.querySelector('h1');
                noti.classList.add('zero');
                var add = Number(noti.getAttribute('data-count') || 0);
                noti.setAttribute('data-count','$n');
                </script>";                                
            } else {
                // echo "keranjang pembelian kosong";
            }
            ?>
    <section class="main">        
        <div class="teks" data-aos="zoom-in-right" data-aos-duration="1500">
            <h1>Liveransir Bahan-bahan Bangunan Kayu </h1>                
            <button><a href="produk.php">Lihat Selengkapnya</a></button>
        </div>
        <div class="konten" data-aos="zoom-in-left" data-aos-duration="1500">
            <img src="../asset/gambar/construction.svg">
        </div>
    </section>
<div class="konten2" data-aos="fade-up" data-aos-duration="1500">
    <div class="service">
        <div class="box">
            <h1>Pelayanan</h1>
                <div class="boxkotak">
                    <div class="card">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        <h5>Harga Terjangkau</h5>
                        <p>Dapatkan kualitas bahan terbaik dengan harga yang cukup terjangkau</p>                        
                    </div>                    
                </div>            
                <div class="boxkotak">
                    <div class="card">
                        <i class="fa-solid fa-truck"></i>
                        <h5>Gratis Ongkir</h5>
                        <p>Gratis ongkir bagi anda yang membeli produk kami dalam jumlah yang banyak<p>                        
                    </div>                    
                </div>            
                <div class="boxkotak">
                    <div class="card">
                        <i class="fa-solid fa-users"></i>
                        <h5>Pelayanan Ramah</h5>
                        <p>Pelayanan yang ramah memprioritaskan pelanggan dalam setiap pembelian </p>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

<div class="konten3"data-aos="fade-up" data-aos-duration="1500">
    <h1>Galeri</h1>
    <div class="isi3">
        <div class="slide">
            <span id="slide1"></span>
            <span id="slide2"></span>
            <span id="slide3"></span>
            
            <div class="carosel">
                <img src="../asset/gambar/kayu.jpg" alt="">
                <img src="../asset/gambar/kayu 2.jpg" alt="">
                <img src="../asset/gambar/Kayu-Bengkirai.jpg" alt=""> 
            </div>             
        </div>
        <div class="navigasi">
            <a href="#slide1">1</a>
                <a href="#slide2">2</a>
                <a href="#slide3">3</a>                
        </div>  
    </div>   
</div>

</div>
<footer>
    <p>Hak Cipta © 2023 - Kelompok 3 C1</p>
</footer>
<script src="js/beranda.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>