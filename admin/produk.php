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

  if(isset($_POST["hapus"])) {
    $id_produk = $_POST['hapus'];
    $data = mysqli_query ($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk' ") ;
    $row = mysqli_fetch_array($data) ;

    $gambar = $row['gambar'] ;
    if(file_exists('../file/'.$gambar))
    {
      unlink('../file/'.$gambar);
    }

    $query = "DELETE FROM produk WHERE id_produk = '$id_produk';";
    // Menjalankan query
    if (mysqli_query($koneksi, $query)) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
         <strong>Berhasil Menghapus Produk !</strong>
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
       </div>";
    } else {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Gagal Menghapus !</strong> Kemungkinan id pada tabel memiliki relasi. Error: " 
      . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi) .
      "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";

    } 
    }

    if(isset($_POST["tambah"])) {
      $gambar = $_FILES['gambar']['name'];
      $harga = $_POST['harga'];
      $nama_produk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
      $stok = $_POST['stok'];
      $cari_nama = "SELECT nama_produk FROM produk WHERE nama_produk='$nama_produk'";
      $valid = mysqli_query($koneksi,$cari_nama);
      $cari_gambar = "SELECT gambar FROM produk WHERE gambar='$gambar'";
      $valid2 = mysqli_query($koneksi,$cari_gambar);      

    if(mysqli_num_rows($valid) > 0){
       echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Menambahkan !</strong> Nama sudah digunakan
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";                                          
    }else if(mysqli_num_rows($valid2) > 0){
       echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Menambahkan !</strong> Gambar sudah digunakan
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";                                          
    } else {        
      $file_tmp = $_FILES['gambar']['tmp_name'] ;
      move_uploaded_file($file_tmp, '../file/'.$gambar) ;
      $query = "INSERT INTO produk SET 
          nama_produk = '$nama_produk',
          harga = '$harga',
          stok = '$stok',
          gambar = '$gambar';";
      if (mysqli_query($koneksi, $query)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Berhasil Menambahkan Produk !</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      } else {
        "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>Gagal Menambahkan Produk !</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";      
      } 
    }
  }
  // update data
  $search = isset($_POST['search']) ? $_POST['search'] : '';
  $sortby = isset($_GET['sortby']) ? $_GET['sortby'] : 'id_produk';
  $sorttype = isset($_GET['sorttype']) ? $_GET['sorttype'] : 'asc';  
  
  $query = "SELECT * FROM produk WHERE harga LIKE '%$search%'  ORDER BY $sortby $sorttype";
  $result = mysqli_query($koneksi, $query);

  

  
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
        <title>Produk</title>
        <link rel="icon" href="../asset/gambar/Ud Haderah.png">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/popup.css" rel="stylesheet" />
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
        #previewne{
          border: 1px solid #ced4da; /* border */
          display: block;
          margin: 0 auto;
          max-width: 100%;
          height: auto;
          object-fit: contain;
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
              
                  <div class="content">									
        <div id="form-popup" class="form-popup">
          <div class="form-popup-content">
            <span id="form-popup-close" class="form-popup-close">&times;</span>
          <form enctype="multipart/form-data" method="post" style="flex-direction: column;">
          <h1 align="center">Produk</h1>

                  <div class="user-details">
                  <div class="input-box">
                    <span class="details">Nama</span>
                    <input type="text" id="nama-produk" class="form-control" pattern="[a-zA-Z0-9]{4,}" maxlength="30" spellcheck="false" autocomplete="off" name="nama_produk" placeholder="Masukan Nama" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Harga</span>
                    <input type="number" id="harga" class="form-control" name="harga" min="1" placeholder="Masukan Harga" autocomplete="off" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Stok</span>
                    <input type="number" id="stok" class="form-control" name="stok" min="1" placeholder="Masukan Stok" autocomplete="off" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Gambar</span>
                    <input type="file" id="gambar" class="form-control" placeholder="Masukkan Gambar" accept="image/*" name="gambar" onchange="preview(this,'previewne')"  required>
                  </div>
                  <!-- <br> -->
                  <img src="../file/<?php echo $row['gambar']?>" id="previewne" class="rounded border p-1" style="width:130px; height:100px;">
                  
                  </div>
                  <br>                              
                  <div class="button">
                  <input type="submit" value="tambah" name="tambah">
                  </div>
                </form>             
              </div>
        </div>






        <div class="content">									
        <div id="form-edit" class="form-popup">
          <div class="form-popup-content">
            <span id="form-popup-close" class="form-popup-close">&times;</span>
          
          <form enctype="multipart/form-data" method="post" style="flex-direction: column;">
          <h1 align="center">Produk</h1>
                  <div class="user-details">
                  <div class="input-box">
                    <span class="details">Nama</span>
                    <input type="text" id="nama-produk" pattern="[a-zA-Z0-9]{4,}" maxlenght="18" name="nama_produk" placeholder="Masukan Nama" autocomplete="off" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Harga</span>
                    <input type="number" id="harga" name="harga" min="1" placeholder="Masukan Harga" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Stok</span>
                    <input type="number" id="stok" name="stok" min="1" placeholder="Masukan Stok" required>
                  </div>

                  <div class="input-box">
                    <span class="details">Gambar</span>
                    <input type="file" id="gambar" name="gambar" placeholder="Masukkan Gambar" required>
                  </div>
                  
                  </div>
                  <br>                              
                  <div class="button">
                  <input type="submit" value="tambah" name="tambah">
                  </div>
                </form>             
              </div>
        </div>


        <hr>
    <h1 class="text-center">                  
        Tabel Produk                
    </h1>
    <hr>

    <button id="open-form-btn" class="tambahin">tambah</button>
    <div style="display: flex; justify-content: space-between;">
        <form method="GET" action="">
            <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Search" style="margin-left:10px;" autocomplete="off">
            <button type="submit">Search</button>
        </form>
                      
        <form action="" method="GET">
            <label for="sortby">Urutkan berdasarkan:</label>
            <select name="sortby" id="sortby">
                <option value="nama_produk" <?php if($sortby == 'nama_produk') echo 'selected'; ?>>Nama produk</option>
                <option value="harga" <?php if($sortby == 'harga') echo 'selected'; ?>>Harga</option>
                <option value="stok" <?php if($sortby == 'stok') echo 'selected'; ?>>Stok</option>
            </select>
            <select name="sorttype" id="sorttype">
                <option value="asc" <?php if($sorttype == 'asc') echo 'selected'; ?>>Ascending</option>
                <option value="desc" <?php if($sorttype == 'desc') echo 'selected'; ?>>Descending</option>
            </select>
            <button type="submit" name="sort">Urutkan</button>
        </form>
    </div>
                <br>                
                <?php 
            include "../koneksi.php" ;
            
            
            // Process the search query
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $where = '';
            if (!empty($search)) {
                $where = "WHERE nama_produk LIKE '%$search%'";
            }
            
            // Process the sort query
            $sortby = isset($_GET['sortby']) ? $_GET['sortby'] : 'nama_produk';
            $sorttype = isset($_GET['sorttype']) ? $_GET['sorttype'] : 'asc';
            $orderby = "ORDER BY $sortby $sorttype";
            
            // Build the query
            $query = "SELECT * FROM produk $where $orderby";
            $data = mysqli_query($koneksi,$query);
            $no = 0;
            ?>
            <table id="tabel" class="table table-striped table-bordered table-hover style="background-color: #fff7e6;" border="2" cellspacing="0" width="100%">
                    <tr>
                      <th rowspan="1" bgcolor="yellowgreen">No</th>
                      <th rowspan="1" bgcolor="yellow">Nama</th>
                      <th rowspan="1" bgcolor="yellowgreen">Harga</th>
                      <th rowspan="1" bgcolor="yellowgreen">Stok</th>
                      <th rowspan="1" bgcolor="yellowgreen">Gambar</th>
                      <th colspan="1" bgcolor="yellow">Aksi</th>
                    </tr> 
                    
                    <form method="post">
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($data)) { ?>
                            <tr>
                                <td><?php echo ++$no ; ?></td>
                                <td><?php echo $row['nama_produk'] ; ?></td>
                                <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                <td><?php echo $row['stok'] ; ?></td>
                                <td class="tengah"><img src="../file/<?php echo $row['gambar'] ; ?>"></td>
                                <td>
                                <a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $row["id_produk"] ?>"><i class="fas fa-edit"></i> Edit</a>
                              

                                    <span><button class="btn btn-sm btn-danger" type="submit" name="hapus" value="<?php echo $row["id_produk"] ?>"><i class="fas fa-trash"></i> Hapus</button></span>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>                    
                </div>
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
</html>