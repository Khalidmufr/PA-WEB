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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d6fbd45f78.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/d6fbd45f78.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/style.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Lokasi</title>
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
                    <li class="garis"><a href="lokasi.php">Lokasi</a></li>
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

    <div class="lokasi" data-aos="fade-up" data-aos-duration="1500">   
        <h1>Lokasi</h1> 
        <div class="mid">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.69762871824!2d117.15301431460509!3d-0.44565699967484573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67893dd254013%3A0xe662cb6992ddb31f!2sUD.%20Haderah%20Jaya!5e0!3m2!1sid!2sid!4v1672927069462!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<footer>
    <p>©Copyright 2023 Rizq Saputra</p>
</footer>
<script src="js/beranda.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>