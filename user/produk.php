<!-- <?php
session_start(); // Mulai session

if ($_SESSION['role'] !== 'user') {
    header('Location: ../index.php');
    exit();
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
    exit();
  }
// Periksa apakah tombol "Tambahkan ke keranjang" telah ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    // Dapatkan data produk dari form
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Buat item produk dalam format array
    $item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1
    );

    // Periksa apakah keranjang belanja sudah ada dalam session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Jika sudah ada, periksa apakah produk sudah ada dalam keranjang
        $cart_items = $_SESSION['cart'];
        $product_exists = false;
        foreach ($cart_items as $key => $value) {
            if ($value['id'] == $product_id) {
                // Jika produk sudah ada dalam keranjang, tambahkan quantity
                $_SESSION['cart'][$key]['quantity'] += 1;
                $product_exists = true;
                break;
            }
        }

        // Jika produk belum ada dalam keranjang, tambahkan sebagai item baru
        if (!$product_exists) {
            array_push($_SESSION['cart'], $item);
        }
    } else {
        // Jika keranjang belanja belum ada, buat keranjang belanja baru
        $_SESSION['cart'] = array($item);
    }

    // Redirect ke halaman produk setelah berhasil ditambahkan ke keranjang
    header('Location: products.php');
    exit();
}
?> -->

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="icon" href="../asset/gambar/Ud Haderah.png">
    
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Produk</title>
</head>
<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0" cz-shortcut-listen="true">
<div class="container">
    <header>
        <label class="logo"><img src="../asset/gambar/Ud Haderah.png"></label>
            <nav>
                <ul class="navbar">
                    <li><a href="beranda.php">Beranda</a></li>
                    <li class="garis"><a href="produk.php">Produk</a></li>
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
    <div class="produk" data-aos="fade-up" data-aos-duration="1500">
        <h1>Produk</h1>
        <?php 
            include "koneksi.php" ;
            $data = mysqli_query($koneksi, "SELECT * FROM produk order by id_produk DESC") ;
            while ($row = mysqli_fetch_array($data)) {
        ?>
        <div class="box">
            <div class="boxproduk">
                <div class="card">            
                    <h5><?php echo $row['nama_produk'] ; ?></h5>
                    <img src="../file/<?php echo $row['gambar'] ; ?>">                    
                    <p><br> Rp <?php echo number_format($row['harga'], 0, ',', '.')  ; ?>/ Batang</p>
                    <p>Stok Tersedia : <?php echo $row['stok'] ; ?></p>
                    <a href="pembelian.php?id=<?php echo $row['id_produk'] ; ?>"><button>Lihat Produk</button></a>
                </div>                    
            </div>
            <?php } ?>           
        </div>
    </div>
</div>  
</div>
    
</div>
</div>
<footer>
    <p>Hak Cipta © 2023 - Kelompok 3 C1</p>
</footer>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>