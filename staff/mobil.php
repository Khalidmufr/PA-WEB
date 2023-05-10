<?php

require "../koneksi.php";
  session_start()  ;

if ($_SESSION['role'] !== 'staff') {
    header('Location: ../login.php');
    exit();
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../login.php');
    exit();
  } 
  
    // cek apakah tombol "tambah" ditekan
    if(isset($_POST["tambah"])) {
      $id_supir = $_POST['supir'];
      $id = $_POST['mobil'];
      $query = "UPDATE mobil SET id_supir='$id_supir' WHERE id_mobil='$id';";
      $query2 = "SELECT * FROM mobil WHERE id_supir='$id_supir';";
      $result = mysqli_query($koneksi, $query2);
        // Menjalankan query
      if (mysqli_num_rows($result) > 0) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Gagal Menambahkan !</strong> Supir hanya bisa menggunakan satu mobil
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";   
      } else if(mysqli_query($koneksi, $query)) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Berhasil Menambahkan !</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";    
      } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Gagal Menambahkan !</strong> Supir hanya bisa menggunakan satu mobil
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";        
     }
    }
    
    if(isset($_POST["hapus"])) {
      $id = $_POST['hapus'];
      $query = "UPDATE mobil SET mobil.id_supir= null WHERE id_mobil='$id';";
        // Menjalankan query
        if (mysqli_query($koneksi, $query)) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Berhasil Menghapus</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
      } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Gagal Menghapus !</strong> Supir hanya bisa menggunakan satu mobil
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
        <title>Staff</title>
        <link rel="icon" href="../asset/gambar/Ud Haderah.png">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/style-login.css" rel="stylesheet" />
        <link href="css/produkstyls.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 

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
                  <form action="mobil.php" method="POST">
                    <!-- <span class="sub">Nama</span>
                    <input type="text" id="ca" placeholder="Masukkan Nama" name="c">
                    <span class="sub">Umur</span>
                    <input type="text" id="ba" placeholder="Masukkan umur" name="b">          
                    <br>             -->
                    <table id="tabel" class="table table-hover" border="2" cellspacing="0">
                      <tr>
                        <th>Plat</th>
                        <th>Supir</th>
                        <th>Aksi</th>
                      </tr>

                      <tr>
                        <td><select name="mobil">
                  <?php 
                    $query = "SELECT * FROM mobil;";                                                
                    $data = mysqli_query($koneksi,$query) ;
                    while ($row = mysqli_fetch_array($data)) { ?>
                          <option value="<?php echo $row['id_mobil']; ?>"><?php echo $row['plat']; ?></option>
                          <?php }?>
                        </select></td>
                        <td><select name="supir">                          
                          <?php 
                          $query = "SELECT * FROM supir;";                                                
                          $data = mysqli_query($koneksi,$query) ;                         
                          while ($row = mysqli_fetch_array($data)) {
                          ?>
                          <option value="<?php echo $row['id_supir']; ?>"><?php echo $row['nama_supir']; ?></option>                                        
                          <?php }?>
                        </select></td>
                        <td><button type="submit" name="tambah" >Tambahkan</button></td>
                      </tr>
                      </table>
                  </form>
                  <br>
                  <hr>
                  <h1 class="text-center">Tabel Mobil</h1>
                  <hr>
                  <br>
                  
              <form action="mobil.php" method="POST">
                    <table id="tabel" class="table table-hover" border="2" cellspacing="0" width="100%">

                      <tr>
                        <th rowspan="1" bgcolor="yellowgreen">Merk</th>
                        <th rowspan="1" bgcolor="yellowgreen">Plat nomor</th>
                        <th colspan="1" bgcolor="yellow">Nama Supir</th>
                        <th colspan="1" bgcolor="yellow">Aksi</th>
                      </tr>  

                    <?php 
            include "../koneksi.php" ;
            $query = "SELECT * FROM mobil
                      INNER JOIN supir
                      ON mobil.id_supir = supir.id_supir;";
            
            $data = mysqli_query($koneksi,$query) ;
            while ($row = mysqli_fetch_array($data)) {
            ?>     

              <tr>
                        <td><?php echo $row['merk'] ; ?></td>
                        <td><?php echo $row['plat'] ; ?></td>
                        <td><?php echo $row['nama_supir'] ; ?></td>
                        <td><button class="btn btn-sm btn-danger" value="<?php echo $row["id_mobil"]; ?>" type="submit" name="hapus" ><i class="fas fa-trash"></i> Hapus</button></td>
                      </tr>
                      
                      <?php }?>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/script.js"></script>

    </body>
</html>