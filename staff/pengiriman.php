<?php

require "../koneksi.php";
session_start()  ;

if ($_SESSION['role'] !== 'staff') {
    header('Location: ../index.php');
    exit();
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../index.php');
    exit();
  }

  // cek apakah tombol "tambah" ditekan
  if(isset($_POST["tambah"])) {
    $id_supir = $_POST['supir'];
    $id_pembelian = $_POST['pembelian'];
    $query = "UPDATE pembelian SET id_supir='$id_supir' WHERE id_pembelian='$id_pembelian';";
      // Menjalankan query
      if (mysqli_query($koneksi, $query)) {
          echo "<script>  alert('Berhasil');
          </script>";
    } else {
          echo "<script>  alert('Gagal');
          </script>";      
   }
  }

  if(isset($_POST["selesai"])) {
    $id_pembelian = $_POST['selesai'];
    $query = "UPDATE pembelian SET status='Sudah Terkirim' WHERE id_pembelian='$id_pembelian';";
      // Menjalankan query
      if (mysqli_query($koneksi, $query)) {
          echo "<script>  alert('Berhasil');
          </script>";
    } else {
          echo "<script>  alert('Gagal');
          </script>";      
  }
  }
  
  if(isset($_POST["batal"])) {
    $id_pembelian = $_POST['batal'];
    $query = "UPDATE pembelian SET status='Pengiriman Dibatalkan' WHERE id_pembelian='$id_pembelian';";
      // Menjalankan query
      if (mysqli_query($koneksi, $query)) {
          echo "<script>  alert('Berhasil');
          </script>";
    } else {
          echo "<script>  alert('Gagal');
          </script>";      
  }
  }
  
  if(isset($_POST["hapus"])) {
    $id_pembelian = $_POST['hapus'];
    $query = "UPDATE pembelian SET id_supir= null WHERE id_pembelian='$id_pembelian'";
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
        <title>Staff</title>
        <link rel="icon" href="../asset/gambar/Ud Haderah.png">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/style-login.css" rel="stylesheet" />

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
                <div class="sidebar-heading">Staff</div>
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
                        <a href="pengiriman.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Pengiriman
                        </a>
                      </li>
                      <li>
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

                <h1 class="text-center">Tabel Pembelian</h1>
                    <br>
                      <table id="tabel" class="table table-hover" border="2" cellspacing="0" width="100%">
                          <tr>
                            <th rowspan="1" bgcolor="yellowgreen">id Pembelian</th>
                            <th rowspan="1" bgcolor="yellowgreen">Produk</th>
                            <th rowspan="1" bgcolor="yellowgreen">Jumlah</th>
                            <th rowspan="1" bgcolor="yellowgreen">Alamat</th>
                            <th rowspan="1" bgcolor="yellowgreen">Status</th>
                          </tr>  
  
                          <?php   
                          $query = "SELECT * FROM pembelian 
                          JOIN produk ON pembelian.id_produk = produk.id_produk where status != 'Sudah Terkirim';";
                          $data = mysqli_query($koneksi,$query) ;                  
                          while ($row = mysqli_fetch_array($data)) { ?>     
  
                          <tr>
                            <td><?php echo $row['id_pembelian'] ; ?></td>
                            <td><?php echo $row['nama_produk'] ; ?></td>
                            <td><?php echo $row['jumlah'] ; ?></td>
                            <td><?php echo $row['alamat'] ; ?></td>
                            <td><?php echo $row['status'] ; ?></td>
                          </tr>
  
                          <?php } ?>
                      </table>
                                <br>
                  <h1>Pengiriman</h1>                 
                <form action="pengiriman.php" method="POST">
                    <table id="tabel" class="table table-hover" border="2" cellspacing="0">
                      <tr>
                        <th>Supir</th>
                        <th>Pembelian</th>
                        <th>Aksi</th>
                      </tr>

                      <tr>
                        <td>
                          <select name="supir">    
                          <option value="#" selected>-- Pilih --</option>   
                  <?php 
                    $query = "SELECT * FROM supir;";                                                
                    $data = mysqli_query($koneksi,$query) ;
                    while ($row = mysqli_fetch_array($data)) { ?>
                        <option value="<?php echo $row['id_supir']; ?>"><?php echo $row['nama_supir']; ?></option>                        
                        <?php }?>
                        </select>
                        </td>
                        <td>
                          <select name="pembelian">    
                          <option value="#" selected>-- Pilih --</option>                      
                        <?php 
                          $query = "SELECT * FROM pembelian where status != 'Sudah Terkirim';";                                                
                          $data = mysqli_query($koneksi,$query) ;                         
                          foreach ($data as $row) {
                          ?> 
                          <option value="<?php echo $row['id_pembelian']; ?>"><?php echo $row['id_pembelian']; ?></option>                                        
                          <?php }?>
                        </select>
                        </td>
                        <td><button type="submit" name="tambah">Tambahkan</button></td>
                      </tr>
                    </table>
                  </form>
                    <br>
                    
                    <h1 class="text-center">Tabel Supir</h1>
                    <br>
                    <form action="pengiriman.php" method="POST">
                      <table id="tabel" class="table table-hover" border="2" cellspacing="0" width="100%">
                          <tr>
                            <th rowspan="1" bgcolor="yellowgreen">id pembelian</th>
                            <th rowspan="1" bgcolor="yellowgreen">Nama Supir</th>
                            <th rowspan="1" bgcolor="yellowgreen">Produk</th>
                            <th rowspan="1" bgcolor="yellowgreen">Jumlah</th>
                            <th rowspan="1" bgcolor="yellowgreen">Nomor</th>
                            <th rowspan="1" bgcolor="yellowgreen">Alamat</th>
                            <th rowspan="1" bgcolor="yellowgreen">Status</th>
                            <th colspan="1" bgcolor="yellow">Aksi</th>
                          </tr>  
  
                          <?php   
                          $query = "SELECT * FROM pembelian 
                          JOIN produk ON pembelian.id_produk = produk.id_produk
                          JOIN supir ON pembelian.id_supir = supir.id_supir;";
                          $data = mysqli_query($koneksi,$query) ;                  
                          while ($row = mysqli_fetch_array($data)) { ?>     
  
                          <tr>
                            <td><?php echo $row['id_pembelian'] ; ?></td>
                            <td><?php echo $row['nama_supir'] ; ?></td>
                            <td><?php echo $row['nama_produk'] ; ?></td>
                            <td><?php echo $row['jumlah'] ; ?></td>
                            <td><?php echo $row['nomor'] ; ?></td>
                            <td><?php echo $row['alamat'] ; ?></td>
                            <td><?php echo $row['status'] ; ?></td>
                            <td><span><button type="submit" name="selesai" value="<?php echo $row["id_pembelian"] ?>">Selesai</button></span> <span><button type="submit" name="batal" value="<?php echo $row["id_pembelian"] ?>">Batalkan</button></span> <span><button type="submit" name="hapus" value="<?php echo $row["id_pembelian"] ?>">Hapus</button></span></td>
                          </tr>
  
                          <?php } ?>
  
                      </table>
                    </form>
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