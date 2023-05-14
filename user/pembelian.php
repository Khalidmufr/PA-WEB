
<?php
    session_start();
    
    if ($_SESSION['role'] !== 'user') {
        header('Location: ../login.php');
        exit();
    }
    
    if (isset($_GET['logout'])) {        
        session_destroy();
        header('Location: ../login.php');
        exit();
    }


    include "koneksi.php" ;
    $data = mysqli_query ($koneksi, "SELECT * FROM produk WHERE id_produk = '$_GET[id]' ") ;
    $row = mysqli_fetch_array($data) ;
    $query = "SELECT FROM produk WHERE id_produk = '$_GET[id]' ";
    mysqli_query($koneksi, $query)  ;  

    if($row['stok']<1){
        $_SESSION['info'] = "Stok";       
    }
// Periksa apakah tombol "Tambahkan ke keranjang" telah ditekan
if (isset($_POST["submit"])) {
    // Dapatkan data produk dari form
    $id = "$_GET[id]";
    $nomor = mysqli_real_escape_string($koneksi, $_POST['nomor']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);;
    $jumlah = $_POST['jumlah'];
    $harga = $row['harga'];
    $stok = $row['stok'];
    
    // Buat item produk dalam format array
    $item = array(
        'id' => $id,
        'nomor' => $nomor,
        'alamat' => $alamat,
        'jumlah' => $jumlah,
        'harga' => $harga , 
        'stok'   => $stok
    );
    // Periksa apakah keranjang belanja sudah ada dalam session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Jika sudah ada, periksa apakah produk sudah ada dalam keranjang
        $cart_items = $_SESSION['cart'];
        $product_exists = false;
        foreach ($cart_items as $key => $value) {
            if ($value['id'] == $id) {
                // Jika produk sudah ada dalam keranjang, tambahkan jumlah
                // $_SESSION['cart'][$key]['jumlah'] += 1;
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
    
    // melihat jumlah keranjang session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cart_items = $_SESSION['cart'];
    }   
    $n = 0;
    foreach ($cart_items as $item) {
        $n+=1;
    }    
    // Redirect ke halaman produk setelah berhasil ditambahkan ke keranjang
    $_SESSION['info'] = "Menambahkan Keranjang";           
}
?>

    
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/pembelian.css">
    <link rel="stylesheet" href="../asset/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../asset/css/animate.min.css">
    <link rel="icon" href="../asset/gambar/Ud Haderah.png">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Pembelian</title>

</head>
<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0" cz-shortcut-listen="true">
<div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>
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
        <main id="main"> 
            <div class="page">    
                <nav>
                    <div class="container">
                    <ol>
                        <li><a href="produk.php">Produk</a></li>
                        <li>Pembelian</li>    
                    </ol>
                    </div>
                </nav>       
            </div>  
        <section id="pembelian" class="boxpembelian aos-init" data-aos="fade-up" data-aos-duration="1500">

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

            <div class="pembelian">
                <h2>Pembelian</h2>
                <form id="beli" method="post">
                <div class="product">
                    <img src="../file/<?php echo $row['gambar'] ; ?>">
                    <div class="product-info">
                        <h3><?php echo $row['nama_produk'] ; ?></h3>
                        <div class="input-box">
                            <span class="detail">Nomor Hp</span>
                            <input type="text" name="nomor" pattern="[0-9]{4,}" maxlength="14" placeholder="Masukkan Nomor Hp Anda" autocomplete="off" required>
                        </div>
                        <div class="input-box">
                            <span class="detail">Alamat</span>
                            <textarea id="myTextarea" name="alamat" rows="4" cols="2"  placeholder="Masukkan alamat Anda" autocomplete="off" required></textarea>
                        </div>
                        <div class="jumlah">
                            <p>Jumlah</p>
                            <div class="input-group">
                                <button class="minus-btn" type="button" name="button">-</button>
                                <input type="number" id="stok" name="jumlah" value="1" min="1" max="<?php echo $row['stok'] ; ?>">
                                <button class="plus-btn" type="button" name="button">+</button>
                            </div>                                          
                        </div>
                    </div>
            </div>
            <div class="total">
                <div class="totals">
                    <p>Jumlah: <span id="isistok">1</span></p>
                    <?php 
                    $harga = $row['harga'];
                    echo '<p>Harga Rp ' . number_format($harga, 0, ',', '.') .'</p>';
                    ?>
                </div>
                    <!-- <p>Total Harga: <span id="harga">Rp&nbsp;</span></p> -->
                </div>
                <button type="submit" name="submit" class="pembelian-btn"><span><i class="fa-solid fa-cart-shopping"></i></span> Masukkan Keranjang</button>
                <h1></h1>
                </form>
            </div>   
                         
        </section>
        <footer>
            <p>Hak Cipta © 2023 - Kelompok 3 C1</p>
        </footer>
        </main>
    </div>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>AOS.init();</script>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Swal -->
    <script src="../asset/js/sweetalert2.min.js"></script>
    <script src="../asset/js/animasi.js"></script>
    <script>
        var textarea = document.getElementById("myTextarea");
        // Tambahkan event listener pada textarea
        textarea.addEventListener("input", function() {
        // Dapatkan isi dari textarea
        var value = this.value;
        
        // Hilangkan simbol-simbol yang tidak diinginkan
        value = value.replace(/[^a-zA-Z0-9 ]/g, '');
        
        // Set isi textarea dengan nilai yang sudah difilter
        this.value = value;
        });
    </script>
</body>
</html>