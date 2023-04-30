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
  } ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tabel Anggota</title>
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
                        <a href="Pemain-Fav.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Tabel Role
                        </a>
                      </li>
                      <li>
                        <a href="anggota.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Tabel Produk
                        </a>
                        <a href="Pembelian.php" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Tabel Pembelian
                        </a>
                        <a href="?logout=true" class="nav-link text-white">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                          Logout
                        </a>
                        <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
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
                  <h1>Form Input</h1>
                  <form>
        <span class="sub">no</span>
            <input type="text" id="aa" placeholder="Masukkan Nomor" name="a">
            <span class="sub">username</span>
            <input type="text" id="ba" placeholder="Masukkan Username" name="b">
            <span class="sub">nama</span>
            <input type="text" id="ca" placeholder="Masukkan Nama" name="c">
            <span class="sub">role</span>  
            <input type="text" id="da" placeholder="Masukkan Role" name="d">
            <br>
            
        <input type="submit" value="submit" cursorshover="true" onclick="tambahData()">

            </form>
                    <h1 class="text-center">
                      
                    Tabel Role
                    </h1>

                    <br>
                    <table id="tabel" class="table table-hover" border="2" cellspacing="0" width="100%">
                        <tr>
                        <th rowspan="1" bgcolor="yellowgreen">No_Role</th>
                            <th rowspan="1" bgcolor="yellow">Username</th>
                            <th rowspan="1" bgcolor="yellowgreen">Nama</th>
                            <th rowspan="1" bgcolor="yellowgreen">Role</th>
                            <th colspan="1" bgcolor="yellow">Aksi</th>

                        </tr>  
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
 



    <script>
		// Mendapatkan referensi ke elemen form
const form = document.querySelector('form');

// Mendapatkan referensi ke elemen tabel
const tabel = document.querySelector('#tabel');

// Mendapatkan data dari localStorage (jika tersedia) atau menginisialisasi data kosong
let data = JSON.parse(localStorage.getItem('data')) || [];

// Fungsi untuk menampilkan data ke dalam tabel
function tampilkanData() {
  // Menghapus semua baris di tabel kecuali header
  while (tabel.rows.length > 1) {
    tabel.deleteRow(1);
  }

  // Menambahkan setiap data ke dalam tabel
  for (let i = 0; i < data.length; i++) {
    const row = tabel.insertRow();

    const namaCell = row.insertCell();
    namaCell.textContent = data[i].aa;

    const lokasiCell = row.insertCell();
    lokasiCell.textContent = data[i].ba;

    const penyelenggaraCell = row.insertCell();
    penyelenggaraCell.textContent = data[i].ca;

    const deskripsiCell = row.insertCell();
    deskripsiCell.textContent = data[i].da;

    const aksiCell = row.insertCell();
    const editButton = document.createElement('button');
    editButton.textContent = 'Edit';
    editButton.addEventListener('click', function() {
      editData(i);
    });
    aksiCell.appendChild(editButton);

    const hapusButton = document.createElement('button');
    hapusButton.textContent = 'Hapus';
    hapusButton.addEventListener('click', function() {
      hapusData(i);
    });
    aksiCell.appendChild(hapusButton);
  }
}

  
 

// Fungsi untuk menambahkan data ke dalam tabel dan localStorage
function tambahData() {
  const aa = form.elements.aa.value;
  const ba = form.elements.ba.value;
  const ca = form.elements.ca.value;
  const da = form.elements.da.value;


  // Mengecek apakah data yang ingin ditambahkan sudah ada di dalam array `data`
  const isDuplicate = data.some((item) => {
    return item.aa === aa && item.ba === ba && item.ca === ca && item.da === da;
  });

  // Jika data sudah ada, tampilkan pesan kesalahan dan keluar dari fungsi
  if (isDuplicate) {
  
    return;
  }

  const newData = {
    aa: aa,
    ba: ba,
    ca: ca,
    da: da,
   
  };

  data.push(newData);
  localStorage.setItem('data', JSON.stringify(data));
  tampilkanData();
}


// Fungsi untuk mengedit data di dalam tabel dan localStorage
function editData(index) {
  const newData = {
    aa: prompt('Masukkan nomor:', data[index].aa),
    ba: prompt('Masukkan nama:', data[index].ba),
    ca: prompt('Masukkan gender:', data[index].ca),
    da: prompt('Masukkan agama:', data[index].da)

  };

  data[index] = newData;
  localStorage.setItem('data', JSON.stringify(data));
  tampilkanData();
}

// Fungsi untuk menghapus data dari tabel dan localStorage
function hapusData(index) {
  data.splice(index, 1);
  localStorage.setItem('data', JSON.stringify(data));
  tampilkanData();
}

// Menampilkan data pertama kali
tampilkanData();

// Event listener untuk form submit
form.addEventListener('submit', function(event) {
  event.preventDefault();

  const aa = form.elements.aa.value;
  const ba = form.elements.ba.value;
  const ca = form.elements.ca.value;
const da = form.elements.da.value;


// Memanggil fungsi tambahData dengan parameter yang sesuai
tambahData(aa, ba, ca, da);

// Mereset nilai input pada form
form.reset();
});





		</script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>