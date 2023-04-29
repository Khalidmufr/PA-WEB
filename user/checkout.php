<?php
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

    // Periksa apakah keranjang belanja sudah ada dalam session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cart_items = $_SESSION['cart'];
    } else {
        // Jika keranjang belanja belum ada, tampilkan pesan kosong
        $cart_items = array();
        echo '<p>Keranjang belanja kosong</p>';
    }

    // Periksa apakah tombol hapus diklik
    if (isset($_GET['action']) && $_GET['action'] == 'hapus' && isset($_GET['id'])) {
        $id = $_GET['id'];
        // Loop untuk mencari produk dengan id yang sesuai di dalam keranjang belanja
        foreach ($cart_items as $key => $item) {
            if ($item['id'] == $id) {
                // Hapus produk dari keranjang belanja
                unset($cart_items[$key]);
                // Perbarui session keranjang belanja
                $_SESSION['cart'] = $cart_items;
                // Redirect ke halaman keranjang belanja            
                header('Location: checkout.php');
            }
        }
    }

    include "koneksi.php" ;

    $query = "SELECT * FROM pembelian";
    // Eksekusi query dan hitung jumlah baris yang dikembalikan
    $result = mysqli_query($koneksi, $query);
    $count = mysqli_num_rows($result);

    // Cek apakah jumlah baris lebih dari 0 atau tidak
    if ($count > 0) {
        $query = "SELECT * FROM pembelian ORDER BY id_pembelian DESC LIMIT 1";
        // Eksekusi query dan ambil hasilnya
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        $kode = $row['kode'];
        $kode +=1;
    } else {
        $kode=1;
    }

    if(isset($_POST['submit'])) {
        $nama = $_SESSION['nama'];
        $query = "SELECT id_login FROM login where nama = '$nama'";
        // Eksekusi query dan ambil hasilnya
        $result = mysqli_query($koneksi, $query);
        $isi = mysqli_fetch_assoc($result);
        $id_user = $isi['id_login'];
        // Loop melalui array dan masukkan data ke dalam tabel database
        foreach ($cart_items as $item) {
            $harga = $item['harga'];
            $id_produk = $item['id'];
            $nomor = $item['nomor'];
            $alamat = $item['alamat'];
            $jumlah = $item['jumlah'];
            $subtotal = $harga * $jumlah;
            $query = "INSERT INTO pembelian (id_produk, id_login,nomor,alamat,jumlah,subtotal,kode) VALUES ('$id_produk', '$id_user','$nomor','$alamat','$jumlah','$subtotal','$kode')";
            mysqli_query($koneksi, $query);
        }
        
        // Tutup koneksi session
        session_destroy();

        echo "<script>
        alert('Berhasil Melakukan Pembelian');
        document.location.href ='checkout.php'
        </script>";    
    }
?>

<style>
    
    .cart-page{
        margin: 80px 80px auto;
    }

    table{
        width: 100%;
        border-collapse: collapse;
        
    }

    .cart-info{
        display: flex;
        flex-wrap: wrap;
    }

    th{
        text-align: left;
        padding: 5px;
        color: #fff;
        background: burlywood;
        font-weight: normal;
    }

    td{
        padding: 10px 8px;
    }
    td input{
        width: 40px;
        height: 30px;
        padding: 5px;
    }
    td a{
        color: burlywood;
        font-size: 12px;
    }
    td img{
        width: 160px;
        height: 100px;
        margin-right: 10px;
    }

    .total{
        display: flex;
        justify-content: flex-end;
    }
    .total table{
        border-top: 3px solid burlywood;
        width: 100%;
        max-width: 400px;
    }
    td:last-child{
        text-align: right;
    }
    th:last-child{
        text-align: right;
    }

    .checkout-btn {
    display: block;
    float: right;
    margin-top: 10px;
    padding: 10px 20px;
    font-size: 18px;
    background-color: #2ecc71;
    color: #fff;
    border: none;
    cursor: pointer;
    }

    .checkout-btn:hover {
    background-color: #27ae60;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="../asset/css/style.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Checkout</title>
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
        <section id="Checkout">            
            <div class="small-container cart-page">
                <table>
                    <tr>
                        <th>Produk</th>
                        <th>Nomor</th>
                        <th>Alamat</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>                
                    <?php
                        include "koneksi.php" ;
                        $total_price = 0;
                        foreach ($cart_items as $item) {
                            $harga = $item['harga'];
                            $jumlah = $item['jumlah'];
                            $id = $item['id'];
                            $subtotal = $harga * $jumlah;
                            $total_price += $subtotal;                           
                            $data = mysqli_query($koneksi, "SELECT * FROM produk where id_produk = '$id' ") ;
                            while ($row = mysqli_fetch_array($data)) {
                                        
                                echo '<tr>';
                                echo '<td>';
                                echo '<div class="cart-info">';
                                ?>
                                <img src="../file/<?php echo $row['gambar'] ; ?>">
                            <?php
                                echo '<div>';
                                echo    '<p>'. $row['nama_produk'] .'</p>';
                                echo    '<small>Harga : Rp '. number_format($harga, 0, ',', '.') .'</small>';
                                echo    '<br>';
                                echo    '<a href="checkout.php?action=hapus&id=' . $item['id'] . '">Remove</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                            echo '<td>' . $item['nomor'] . '</td>';
                            echo '<td>' . $item['alamat'] . '</td>';
                            echo '<td>' . $jumlah . '</td>';
                            echo '<td>Rp ' . number_format($harga, 0, ',', '.') . '</td>';
                            echo '<td>Rp ' . number_format($subtotal, 0, ',', '.') . '</td>';                        
                        '</tr>';
                    }
                }
                ?>      
                </table>
                <div class="total">
                    <table>                        
                        <tr>
                            <td>Total</td>
                            <td>Rp <?php echo number_format($total_price, 0, ',', '.'); ?></td>
                        </tr>
                    </table>
                </div>
                <form method="POST">
                    <button type="submit" name="submit" class="checkout-btn">Checkout</button>
                </form>

            </div>
        </section>
    </div>
</body>
</html>