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

  $id = $_GET['id'];

  $query = "SELECT * FROM produk WHERE id_produk = '$id'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_array($result) ;

  
  if(isset($_POST["edit"])) {      
      $id = $_GET["id"];
      $nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
      $harga = $_POST["harga"];
      $stok = $_POST["stok"];
      $gbr = $_FILES["gambar"]["name"];
            
      $data = mysqli_query ($koneksi, "SELECT * FROM produk WHERE id_produk = '$_GET[id]' ") ;
      $result = mysqli_fetch_array($data) ;              
      
      if($gbr != "" || $gbr != null){                   
        $gambar = $_FILES['gambar']['name'];
        $query ="UPDATE produk SET
        nama_produk = '$nama_produk',
        harga ='$harga',
        stok ='$stok',
        gambar = '$gambar'
        WHERE id_produk = '$id' ";

        $cari_nama = "SELECT nama_produk FROM produk WHERE nama_produk='$nama_produk' AND id_produk!='$id'";
        $valid = mysqli_query($koneksi,$cari_nama);      
        $cari_gambar = "SELECT gambar FROM produk WHERE gambar='$gambar' AND id_produk!='$id'";
        $valid2 = mysqli_query($koneksi,$cari_gambar);      

        if(mysqli_num_rows($valid) > 0){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Mengubah !</strong> Nama sudah digunakan
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";                            

        }else if(mysqli_num_rows($valid2) > 0){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Mengubah !</strong> Gambar sudah digunakan
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";                            
        } else {
          $gambarn = $result['gambar'] ;
        if(file_exists('../file/'.$gambarn))
        {
            unlink('../file/'.$gambarn) ;
        }
        $gambars = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'] ;
        move_uploaded_file($file_tmp, '../file/'.$gambars) ;
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Berhasil Mengubah !</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        mysqli_query($koneksi, $query);
        echo "<script>
        alert('Berhasil Mengubah');
        document.location.href ='produk.php';
        </script>"; 
        }
      }else{
        $query ="UPDATE produk SET
          nama_produk = '$nama_produk',
          harga ='$harga',
          stok ='$stok'        
          WHERE id_produk = '$id' ";

          $cari_nama = "SELECT nama_produk FROM produk WHERE nama_produk='$nama_produk' AND id_produk!='$id'";
          $valid = mysqli_query($koneksi,$cari_nama);   
          if(mysqli_num_rows($valid) > 0){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Gagal Mengubah !</strong> Nama sudah digunakan
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";                                                              
            } else {            
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Berhasil Mengubah !</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            mysqli_query($koneksi, $query);
            echo "<script>
            alert('Berhasil Mengubah');
            document.location.href ='produk.php';
            </script>"; 
            }
      }    


     
  }
  
  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit produk</title>
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
                  <a href="produk.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                  <h1 class="text-center">Edit Produk</h1>
                <form enctype="multipart/form-data" method="POST"> 
                  <div class="form-group">
                    <br>
                    <label for="nama">Nama: </label>
                    <input type="text" class="form-control" pattern="[a-zA-Z0-9]{4,}" maxlength="30" placeholder="Masukkan Nama" name="nama_produk" value="<?php echo $row['nama_produk']?>" required>
                  </div>
                  <div class="form-group">
                    <br>
                    <label for="harga">Harga: </label>
                    <input type="number" class="form-control" min="1" name="harga" value="<?php echo $row['harga']?>" required>
                  </div>
                  <div class="form-group">
                    <br>
                    <label for="stok">Stok: </label>
                    <input type="number" class="form-control" min="0" name="stok" value="<?php echo $row['stok']?>" required>
                  <div class="form-group">
                    <br>
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" accept="image/*" name="gambar" onchange="preview(this,'previewne')">
                    <br>
                    <img src="../file/<?php echo $row['gambar']?>" id="previewne" class="rounded border p-1" style="width:200px; height:130px;">
                  </div>
                  </div>
                  <br>
                  <input type="submit" value="Simpan Perubahan" name="edit" class="btn btn-primary" cursorshover="true">
                  </form>
                  </div>
              
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

  function preview(gambar,idpreview){
        var gb = gambar.files;
        for (var i = 0; i < gb.length; i++){
          var gbPreview = gb[i];
          var imageType = /image.*/;
          var preview=document.getElementById(idpreview);            
          var reader = new FileReader();
          if (gbPreview.type.match(imageType)) {
            preview.file = gbPreview;
            reader.onload = (function(element) { 
              return function(e) { 
                element.src = e.target.result; 
              }; 
            })(preview);
            reader.readAsDataURL(gbPreview);
          } else{
              alert("Type file tidak sesuai. Khusus image.");
          }
                      
        }    
      }        
        </script>
    </body>
</html>