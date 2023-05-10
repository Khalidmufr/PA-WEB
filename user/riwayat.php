<?php

require "koneksi.php";
  session_start()  ;

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="icon" href="../asset/gambar/Ud Haderah.png">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>riwayat</title>
</head>
<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0" cz-shortcut-listen="true">
<div class="container">
    <header>
        <label class="logo"><img src="../asset/gambar/Ud Haderah.png"></label>
            <nav>
                <ul class="navbar">
                    <li><a href="beranda.php">Beranda</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li class="garis"><a href="keluhan.php">Keluhan</a></li>
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
    <main id="main"> 
        <div class="page">    
            <nav>
                <div class="container">
                <ol>
                    <li><a href="keluhan.php">Keluhan</a></li>
                    <li>Riwayat</li>    
                </ol>
                </div>
            </nav>       
        </div>
        <section class="riwayat" data-aos="fade-up" data-aos-duration="1500">
            <h1>Riwayat Keluhan</h1>
            <div class="kotak">
                <table style="margin-left:auto;margin-right:auto; font-size: 23px;">
                <tr>
                    <td>Nama</td>
                    <td>: <span id="name"></span></td>
                </tr>
                <tr>
                    <td>Hari</td>
                    <td>: <span id="hari"></span></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <span id="isiemail"></span></td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td>: <span id="nomor"></span></td>
                </tr>
                <tr>
                    <td>Keluhan</td>
                    <td>: <span id="keluhan"></span></td>
                </tr>
                <tr>
                    <td>Kayu</td>                    
                    <td>: <span id="kayu"></span></td>                 
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <span id="gender"></span></td>
                </tr>                
            </table>
            </div>
        </section>  
    </main>
    </div>    
</div>

<script src="../asset/js/riwayat.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>