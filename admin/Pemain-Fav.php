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
        <title>Pemain Favorit</title>
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
            <input type="text" id="a" placeholder="Masukkan Nomor" name="a">
            <span class="sub">nama</span>
            <input type="text" id="b" placeholder="Masukkan Nama" name="b">
            <span class="sub">harga</span>
            <input type="text" id="c" placeholder="Masukkan Harga" name="c">
            <span class="sub">gambar</span>  
            <input type="text" id="d" placeholder="Masukkan Gambar" name="d">
            <br>

       
            
        <input type="submit" value="submit" cursorshover="true" onclick="tambahData()">

            </form>
            <hr>

                    <h1 class="text-center">
                      
                    Tabel Produk
                    
                    </h1>

                    <br>
                    <table id="tabel" class="table table-hover" border="2" cellspacing="0" width="100%">
                        <tr>
                        <th rowspan="1" bgcolor="yellowgreen">No_Produk</th>
                          <th rowspan="1" bgcolor="yellow">Nama</th>
                          <th rowspan="1" bgcolor="yellowgreen">Harga</th>
                          <th colspan="1" bgcolor="yellow">Gambar</th>
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
    namaCell.textContent = data[i].a;

    const lokasiCell = row.insertCell();
    lokasiCell.textContent = data[i].b;

    const penyelenggaraCell = row.insertCell();
    penyelenggaraCell.textContent = data[i].c;

    const deskripsiCell = row.insertCell();
    deskripsiCell.textContent = data[i].d;

    const eCell = row.insertCell();
    eCell.textContent = data[i].e;

    const fCell = row.insertCell();
    fCell.textContent = data[i].f;

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

function editData(index) {
  const newData = {
    a: prompt('Masukkan nomor:', data[index].a),
    b: prompt('Masukkan nama:', data[index].b),
    c: prompt('Masukkan gender:', data[index].c),
    d: prompt('Masukkan uang:', data[index].d),
    e: prompt('Masukkan nilai transfer:', data[index].e)
  };

  // Menentukan pemain yang sesuai dengan nilai transfer
  let pemain = '';
  if (parseInt(newData.e) < parseInt(newData.d)) {
    pemain = 'Thiago';
  } else if (parseInt(newData.e) === parseInt(newData.d)) {
    pemain = 'Mo Salah';
  } else {
    pemain = 'Van Dijk';
  }

  // Menyimpan data baru ke dalam array data
  data[index] = {
    a: newData.a,
    b: newData.b,
    c: newData.c,
    d: newData.d,
    e: newData.e,
    f: pemain
  };

  // Menyimpan data ke dalam local storage
  localStorage.setItem('data', JSON.stringify(data));

  // Menampilkan data ke dalam tabel
  tampilkanData();
}


function tambahData() {
  const a = form.elements.a.value;
  const b = form.elements.b.value;
  const c = form.elements.c.value;
  const d = form.elements.d.value;
  const e = form.elements.e.value;
  

  let f = "";
  if (e < d) {
    f = "Thiago";
  } else if (e == d) {
    f = "Mo Salah";
  } else {
    f = "Van Dijk";
  }

  // Mengecek apakah data yang ingin ditambahkan sudah ada di dalam array `data`
  const isDuplicate = data.some((item) => {
    return item.a === a && item.b === b && item.c === c && item.d === d && item.e === e && item.f === f;
  });

  // Jika data sudah ada, tampilkan pesan kesalahan dan keluar dari fungsi
  if (isDuplicate) {
    return;
  }

  const newData = {
    a: a,
    b: b,
    c: c,
    d: d,
    e: e,
    f: f
  };

  data.push(newData);
  localStorage.setItem('data', JSON.stringify(data));
  tampilkanData();
}


// Fungsi untuk mengedit data di dalam tabel dan localStorage

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

  const a = form.elements.a.value;
  const b = form.elements.b.value;
  const c = form.elements.c.value;
const d = form.elements.d.value;



// Memanggil fungsi tambahData dengan parameter yang sesuai
tambahData(a, b, c, d);

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