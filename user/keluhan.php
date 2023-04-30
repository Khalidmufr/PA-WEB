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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/form.css">
    <link rel="icon" href="../asset/gambar/Ud Haderah.png">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Keluhan</title>
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
    <div class="keluhan" data-aos="fade-up" data-aos-duration="1500">
        <form id="keluhanform">                    
            <h1>Keluhan</h1>
            <div class="user">
                <div class="input-box">
                    <span class="detail">Nama</span>
                    <input type="text" id="name" placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="input-box">
                    <span class="detail">Hari Pembelian</span>
                    <select class="select" id="hari" required>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="detail">Email</span>
                    <input type="email" id="inputemail" placeholder="Masukkan email Anda" required>
                </div>
                <div class="input-box">
                    <span class="detail">Nomor Hp</span>
                    <input type="text" id="nomor" placeholder="Masukkan Nomor Hp Anda" required>
                </div>
                <div class="input-box2">
                    <span class="details">Keluhan</span>
                    <textarea type="text" id="ikeluhan" placeholder="Masukkan Alasan Kamu" 
                                rows="0"
                                cols="0"required>
                    </textarea>
                </div>
                <div class="input-box">
                    <span class="topp">Kayu Pilihan</span>
                    <div class="topp">
                        <input class="checkbox" type="checkbox" id="meranti" value="Meranti">
                        <label class="check" for="Meranti">Meranti</label>
                    </div>
                    <div>
                        <input class="checkbox" type="checkbox" id="ulin" value="Ulin">
                        <label class="check" for="Ulin">Ulin</label>
                    </div>
                    <div>
                        <input class="checkbox" type="checkbox" id="bengkirai" value="Bengkirai">
                        <label class="check" for="Bengkirai">Bengkirai</label>
                    </div>
                    <div>
                        <input class="checkbox" type="checkbox" id="kapur" value="Kapur">
                        <label class="check" for="Kapur">Kapur</label>
                    </div>
                </div>                
            </div>
            <div class="jenis-kelamin">
                <input type="radio" name="gender" id="dot-1" value="Pria">
                <input type="radio" name="gender" id="dot-2" value="Wanita">            
                <span class="judulg">Jenis Kelamin</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Pria</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Wanita</span>
                    </label>                
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Masukan">            
            </div>
            </form>
    </div>
</div>
<footer>
    <p>Hak Cipta © 2023 - Kelompok 3 C1</p>
</footer>

<script src="../asset/js/keluhan.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>