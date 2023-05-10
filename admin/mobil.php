<?php

require "../koneksi.php";
  session_start()  ;

if ($_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ../login.php');
    exit();
  } 
  
  if(isset($_POST["tambah"])) {
    $merk = $_POST['merk'];    
    $plat = $_POST['plat'];    
    $query = "INSERT INTO Mobil SET 
    merk = '$merk',
    plat = '$plat'; ";
    $cari_nama = "SELECT plat FROM Mobil WHERE plat='$plat'";
    $valid = mysqli_query($koneksi,$cari_nama);
    
    // Menjalankan query
     if(mysqli_num_rows($valid) > 0){
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
               <strong>Gagal Menambahkan !</strong> plat sudah digunakan
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
             </div>";                        
    } else {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Berhasil Menambahkan Mobil !</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
        mysqli_query($koneksi, $query);
    }
  }

  if(isset($_POST["hapus"])) {
    $id_mobil = $_POST['hapus'];    
    $query = "DELETE FROM mobil WHERE id_mobil = '$id_mobil';";
     // Menjalankan query     
     if (mysqli_query($koneksi, $query)) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Berhasil Menghapus mobil !</strong>
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mobil</title>
        <link rel="icon" href="../asset/gambar/Ud Haderah.png">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="style-login.css" rel="stylesheet" />
        <link href="css/popup.css" rel="stylesheet" />
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
        <div id="form-popup" class="form-popup">
          <div class="form-popup-content" style="width: 40%;">
            <span id="form-popup-close" class="form-popup-close">&times;</span>
            
            <form enctype="multipart/form-data" method="post" style="flex-direction: column;">
                  <h1 align="center">Mobil</h1>
                  <div class="user-details" style="width: 650px; padding-right: 50px; margin-left: 350px;">
                    <div class="input-box">
                      <span class="details">Merk</span>
                      <input type="text" id="nama-supir" class="form-control" pattern="[a-zA-Z0-9]{4,}" name="merk" placeholder="Masukan merk" autocomplete="off" required>
                    </div>
                    <div class="input-box">
                      <span class="details">Plat Nomor</span>
                      <input type="text" id="nama-supir" class="form-control" minlength="9" maxlength="11" name="plat" placeholder="Masukan plat nomor" autocomplete="off" required>
                    </div>                 
                    
                  </div>
                    <br>                              
                    <div class="button">
                      <input type="submit" value="tambah" name="tambah">
                    </div>
                  </form>                
          </div>
        </div>
                <div class="container-fluid">
                <div class="Isi">                  
                    <br>
                    <hr>
                  <h1 class="text-center">Tabel Mobil</h1>
                  <hr>
                    <br>
                <button id="open-form-btn" class="tambahin">tambah</button>
                <form action="mobil.php" method="POST">

                    <table id="tabel" class="table table-hover" border="2" cellspacing="0" width="100%">

                      <tr>
                        <th rowspan="1" bgcolor="yellowgreen">No</th>
                        <th rowspan="1" bgcolor="yellowgreen">merk</th>
                        <th rowspan="1" bgcolor="yellowgreen">plat nomor</th>
                        <th colspan="1" bgcolor="yellow">Aksi</th>
                      </tr>  

                    <?php 
            include "../koneksi.php" ;
            $query = "SELECT * FROM mobil;";
            $no = 0;
            $data = mysqli_query($koneksi,$query) ;
            while ($row = mysqli_fetch_array($data)) {
              $no ++
            ?>     
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $row['merk'] ; ?></td>
                        <td><?php echo $row['plat'] ; ?></td>
                        <td><span><a class="btn btn-sm btn-primary mr-2" href="editm.php?id=<?php echo $row["id_mobil"] ?>"><i class="fas fa-edit"></i> Edit</a></span> <span><button class="btn btn-sm btn-danger" type="submit" name="hapus" value="<?php echo $row["id_mobil"] ?>"><i class="fas fa-trash"></i> Hapus</button></span></td>
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
        <script src="js/scripts.js"></script>        

    <script>
        // Ambil tombol untuk membuka form pop up
      var openFormBtn = document.getElementById("open-form-btn");

      // Ambil elemen form pop up
      var formPopup = document.getElementById("form-popup");

      // Ambil tombol untuk menutup form pop up
      var closeFormBtn = document.getElementById("form-popup-close");

      // Fungsi untuk membuka form pop up
      function openForm() {
        formPopup.style.display = "block";
      }

      // Fungsi untuk menutup form pop up
      function closeForm() {
        formPopup.style.display = "none";
      }

      // Tambahkan event listener untuk tombol membuka form pop up
      openFormBtn.addEventListener("click", openForm);

      // Tambahkan event listener untuk tombol menutup form pop up
      closeFormBtn.addEventListener("click", closeForm);
    </script>

    </body>
</html>