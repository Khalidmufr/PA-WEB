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
      echo "<div class='alert alert-success'><strong>Berhasil Menghapus Produk.</strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
      "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Login !</strong> Periksa kembali username dan password atau role anda.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";      
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
        <link href="style-login.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/produkstyls.css">

    </head>
  <style>

    .modal-dialog {
            max-width: 800px;
        }

        .input-box input {
            width: 100px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
      .form-popup {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .form-popup-content {
      background-color: #fefefe;
      margin: 2% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .form-popup-close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .form-popup-close:hover,
    .form-popup-close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

        .box {
      color: #272164;
    }
    .box:after {
      content: '';
      display: block;
      clear: both;
    }
        .box .col-4 h4 {
      margin:20px 0;
    }
    .box .col-4 {
        width:100%;
        float: none;
        margin-bottom: 20px;
      }
        .box .col-4 {
      width:25%;
      padding:20px;
      box-sizing: border-box;
      text-align: center;
      float: left;
    }
        .contain {
      width:80%;
      margin:0 auto;
    }
    .contain:after {
      content:'';
      display: block;
      clear: both;
    }
      .servis {
      padding-bottom: 100px;
    }
        .kontainer{
      max-width: 1000px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
      }
      .kontainer .title{
      font-size: 25px;
      font-weight: 500;
      position: relative;
      }
      .kontainer .title::before{
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
      }

      .kontener{
      max-width: 1000px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
      }
      .kontener p {
      background-color: white;
        padding: 20px 20px;
        border-radius: 12px;
        box-shadow: 0 1px 20px rgb(0 0 0 / 20%);
        width: 350px;
        margin: 15px auto;
    }
    .kontener p:hover{
        background-color: #18d3ad;
    }
    .kontener .oke{
      width: 200px;
      height: 200px;
      border-radius: 50%;


      margin-left: 40%;
    }
    .animasi-teks {
      font-size: 29px;
      width: 100%;
      white-space:nowrap;
      overflow:hidden;
      -webkit-animation: typing 5s steps(70, end);
      animation: animasi-ketik 5s steps(70, end);
      }
      
      @keyframes animasi-ketik{
      from { width: 0; }
      }
      
      @-webkit-keyframes animasi-ketik{
      from { width: 0; }
      }

      .content form .user-details{
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 20px 0 12px 0;
      }
      form .user-details .input-box{
      margin-bottom: 15px;
      width: calc(100% / 2 - 20px);
      }
      form .input-box span.details{
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
      }
      .user-details .input-box input{
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
      }
      .kombo{
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
      }

      .teks{
      height: 100px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;

      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
      }

      .user-details .input-box input:focus,
      .user-details .input-box input:valid{
      border-color: #9b59b6;
      }
      form .gender-details .gender-title{
      font-size: 20px;
      font-weight: 500;
      }
      form .hobi{
      font-size: 20px;
      font-weight: 500;
      }
      form .category{
      display: flex;
      width: 80%;
      margin: 14px 0 ;
      padding-right: 38rem;
      justify-content: space-between;
      }
      form .category label{
      display: flex;
      align-items: center;
      cursor: pointer;
      }
      form .category label .dot{
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
      }
      #dot-1:checked ~ .category label .one,
      #dot-2:checked ~ .category label .two,
      #dot-3:checked ~ .category label .three{
      background: #148F77;
      border-color: #d9d9d9;
      }
      form input[type="radio"]{
      display: none;
      }
      form .button{
      height: 45px;
      margin: 35px 0
      }
      form .button input{
      height: 100%;
      width: 100%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      background: #deb887;
      }
      form .button input:hover{
      /* transform: scale(0.99); */
      background: #974e4e;
      }
      @media(max-width: 584px){
      .kontainer{
      max-width: 100%;
      }
      form .user-details .input-box{
        margin-bottom: 15px;
        width: 100%;
      }
      form .category{
        width: 100%;
      }
      .content form .user-details{
        max-height: 300px;
        overflow-y: scroll;
      }
      .user-details::-webkit-scrollbar{
        width: 5px;
      }
      }
      @media(max-width: 459px){
      .kontainer .content .category{
        flex-direction: column;
      }
    }
</style>
    <style>       
    .tengah{
        display: flex;
        justify-content: center;
        align-items: center;        
      }
      td img{
        width: 150px;
      }
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
              
                  <h1>Form Input</h1>
                  <div class="content">
				
				
        <h2 class="mb-4">data admin</h2>

	
        <div id="form-popup" class="form-popup">
          <div class="form-popup-content">
            <span id="form-popup-close" class="form-popup-close">&times;</span>
          
          <form method="post">
          <h1 align="center">Produk</h1>

                  <div class="user-details">
                  <div class="input-box">
                    <span class="details">Nama</span>
                    <input type="text" id="nama-proyek" name="nama_produk" placeholder="Masukan Nama">
                  </div>
                  
                  
                  <div class="input-box">
                    <span class="details">Harga</span>
                    <input type="number" id="jumlah-orang" name="Harga" min="1" placeholder="Masukan Harga">
                  </div>
                  <div class="input-box">
                    <span class="details">Stok</span>
                    <input type="number" id="jumlah-pengeluaran" name="stok" min="1" placeholder="Masukan Stok">
                  </div>
                  <div class="input-box">
                    <span class="details">Gambar</span>
                    <input type="file" id="harga-satuan" name="telp" placeholder="Masukkan Gambar">
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
                  <form method="POST" action="" style="margin-right: 10px;">
                      <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Search">
                      <button type="submit">Search</button>
                  </form>
                  
                  <form action="" method="get" style="margin-left: 10px;">
                      <label for="sortby">Urutkan berdasarkan:</label>
                      <select name="sortby" id="sortby">
                          <option value="nama" <?php if($sortby == 'nama_produk') echo 'selected'; ?>>Nama produk</option>
                          <option value="harga produk" <?php if($sortby == 'harga') echo 'selected'; ?>>harga</option>
                
                      </select>
                      <select name="sorttype" id="sorttype">
                          <option value="asc" <?php if($sorttype == 'asc') echo 'selected'; ?>>Ascending</option>
                          <option value="desc" <?php if($sorttype == 'desc') echo 'selected'; ?>>Descending</option>
                      </select>
                      <button type="submit" name="sort">Urutkan</button>
                  </form>
                </div>



                <br>
                <table id="tabel" class="table table-striped table-bordered table-hover style="background-color: #fff7e6;" border="2" cellspacing="0" width="100%">

                    <tr>
                      <th rowspan="1" bgcolor="yellowgreen">No_Produk</th>
                      <th rowspan="1" bgcolor="yellow">Nama</th>
                      <th rowspan="1" bgcolor="yellowgreen">Harga</th>
                      <th rowspan="1" bgcolor="yellowgreen">Stok</th>
                      <th rowspan="1" bgcolor="yellowgreen">Gambar</th>
                      <th colspan="1" bgcolor="yellow">Aksi</th>
                    </tr> 
                    
                    <form method="post">

                      <?php 
            include "../koneksi.php" ;
            $query = "SELECT * FROM produk;";
            
            $data = mysqli_query($koneksi,$query) ;
            while ($row = mysqli_fetch_array($data)) {
            $harga = $row['harga'];
            ?>     
                    <tr>
                      <td><?php echo $row['id_produk'] ; ?></td>
                      <td><?php echo $row['nama_produk'] ; ?></td>
                      <td>Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
                      <td><?php echo $row['stok'] ; ?></td>
                      <td class="tengah"><img src="../file/<?php echo $row['gambar'] ; ?>"></td>
                      <td><span><a href="edit.php?id=<?php echo $row["id_produk"] ?>"><button class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i> Edit</button></span></a> <span><button class="btn btn-sm btn-danger" type="submit" name="hapus" value="<?php echo $row["id_produk"] ?>"><i class="fas fa-trash"></i> Hapus</button></span></td>
                    </tr>

             <?php }?>       
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
        
        $('#modaledit').on('show.bs.modal', function (event) {
            // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
            var button              = $(event.relatedTarget)

            // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
            var nama_barang         = button.data('nama')
            var deskripsi_barang    = button.data('username')
            var jenis_barang        = button.data('password')
            var harga_barang        = button.data('no_telp')
            var modal = $(this)

            //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
            modal.find('#nm').val(nama_barang)
            modal.find('#us').val(deskripsi_barang)
            modal.find('#pw').val(jenis_barang)
            modal.find('#no').val(harga_barang)
        })
    </script>

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
</html>