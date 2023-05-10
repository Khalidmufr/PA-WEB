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
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Berhasil Menghapus Pengiriman !</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
      "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Menghapus !</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";      
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  
        <title>Pembelian</title>
        <link rel="icon" href="../asset/gambar/Ud Haderah.png">
        <!-- Core theme CSS (includes Bootstrap)-->        
        <link href="css/styles.css" rel="stylesheet" />
        <link href="style-login.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/produkstyls.css">


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
                  <hr>
                    <h1 class="text-center">Tabel Pembelian</h1>
                    <hr>
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
                <td><button  class="btn btn-sm btn-danger" type="submit" name="hapus" value="<?php echo $row["id_pembelian"] ?>"><i class="fas fa-trash"></i> Hapus</button></td>                     
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>