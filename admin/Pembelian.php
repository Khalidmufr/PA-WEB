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
  } 
  
  if(isset($_POST["hapus"])) {
    $id_pembelian = $_POST['hapus'];    
    $query = "DELETE FROM pembelian WHERE id_pembelian = '$id_pembelian';";
    // Menjalankan query
    if (mysqli_query($koneksi, $query)) {
      echo "<script>  alert('Berhasil');
      </script>";
    } else {
      echo "<script>  alert('Gagal');
      </script>";      
    } 
    }
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pembelian</title>
        <link rel="icon" href="../asset/gambar/Ud Haderah.png">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="style-login.css" rel="stylesheet" />

    </head>
    <style>
        .navbar {
            background-color: burlywood;
            padding: 0.600rem 1.25rem;
        }
        .sidebar-heading {
            background-color: burlywood;
        }
        .sidebar-wrapper
        {
            background-color: black;
        }
    </style>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div id="sidebar-wrapper">
                <div class="sidebar-heading">Admin</div>
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="../asset/gambar/Ud Haderah.png" class="bi me-2" width="250" height="50">
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                      <li>
                      <a href="index.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                          Beranda
                        </a>
                      </li>
                      <li>
                        <a href="produk.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Produk
                        </a>
                      </li>
                      <li>                        
                        <a href="Pembelian.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Pembelian
                        </a>
                        <a href="supir.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Supir
                        </a>
                        <a href="mobil.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Mobil
                        </a>
                        <a href="?logout=true" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Logout
                        </a>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light border-bottom">
                    <div class="container-fluid">
                       
                       
                        <svg id="sidebarToggle" xmlns="http://www.w3.org/2000/svg" width="16" height="39" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                          </svg>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                <div class="Isi">  
                  <br>                
                    <h1 class="text-center">Tabel Pembelian</h1>
                    <br>
                    <table id="tabel" class="table table-hover" border="2" cellspacing="0" width="100%">
                        <tr>
                          <th rowspan="1" bgcolor="yellowgreen">id_Pembelian</th>
                          <th rowspan="1" bgcolor="yellow">Produk</th>
                          <th rowspan="1" bgcolor="yellowgreen">Mama</th>
                          <th rowspan="1" bgcolor="yellow">Nomor</th>
                          <th rowspan="1" bgcolor="yellowgreen">Alamat</th>
                          <th colspan="1" bgcolor="yellow">Jumlah</th>
                          <th colspan="1" bgcolor="yellow">Subtotal</th>
                          <th colspan="1" bgcolor="yellow">Status</th>
                          <th colspan="1" bgcolor="yellow">Kode</th>
                          <th colspan="1" bgcolor="yellow">Aksi</th>
                        </tr>  

                        <form method="post">
            <?php 
            include "../koneksi.php" ;
            $query = "SELECT * FROM pembelian 
            JOIN produk ON pembelian.id_produk = produk.id_produk
            JOIN login ON pembelian.id_login = login.Id_login;";
            
            $data = mysqli_query($koneksi,$query) ;
            while ($row = mysqli_fetch_array($data)) {
            $subtotal = $row['subtotal'];
            ?>                          
              <tr>
                <td><?php echo $row['id_pembelian'] ; ?></td>                     
                <td><?php echo $row['nama_produk'] ; ?></td>                     
                <td><?php echo $row['nama'] ; ?></td>                     
                <td><?php echo $row['nomor'] ; ?></td>                     
                <td><?php echo $row['alamat'] ; ?></td>                     
                <td><?php echo $row['jumlah'] ; ?></td>                     
                <td><?php echo number_format($subtotal, 0, ',', '.'); ?></td>                     
                <td><?php echo $row['status'] ; ?></td>                     
                <td><?php echo $row['kode'] ; ?></td>                     
                <td><button type="submit" name="hapus" value="<?php echo $row["id_pembelian"] ?>">Hapus</button></td>                     
              </tr>
              
            <?php } ?>
            </form>
                    </table>
                </div>
                </div>
            </div>
        </div>
      <footer>
          <div class="foot">
              <img src="../asset/gambar/Ud Haderah.png" width="150px">
              <p> Hak Cipta © 2023 - Kelompok 3 C1</p>
          </div>
      </footer>       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>