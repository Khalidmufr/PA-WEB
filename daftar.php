<?php
require "koneksi.php";
if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));
    $role = $_POST['role'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

    $cari_nama = "SELECT nama FROM login WHERE nama='$nama'";
    $valid = mysqli_query($koneksi,$cari_nama);
    $cari_username = "SELECT username FROM login WHERE username='$username'";
    $valid_2 = mysqli_query($koneksi,$cari_username);

    if(mysqli_num_rows($valid) > 0){
        $errors['u'] = "Nama Sudah Digunakan";           
    } else if(mysqli_num_rows($valid_2) > 0) {
        $errors['u'] = "Username Sudah Digunakan";             
    }
    
    if (count($errors) > 0) {
        foreach ($errors as  $error) {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Gagal Mendaftar !</strong> $error <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    } else {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Berhasil Melakukan Pendaftaran !</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

        $query = "INSERT INTO login (nama, username, password, role) VALUES ('$nama', '$username', '$passwordHash', '$role')";
        mysqli_query($koneksi, $query);
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <!-- load Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- load custom CSS -->
    <link rel="stylesheet" href="asset/css/login.css">
    <link rel="stylesheet" href="asset/css/sweetalert2.min.css">
    <link rel="icon" href="../asset/gambar/Ud Haderah.png">   

</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  
    <link rel="stylesheet" href="asset/css/login.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>login</title>
</head>
<body>
    <div class="container">        
        <div class="box" data-aos="fade-up" data-aos-duration="1500"> 
            <h1>Buat Akun</h1>               
            <section class="login">            
                <div class="kiri">
                    <form role="form" action="daftar.php" method="post">
                        <div class="inputan" style="height: 385px;">                            
                            <label>Nama <span class="text-danger">*</span></label>
                            <div class="kolominput">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" id="nama" name="nama" maxlength="15"  pattern="[a-zA-Z0-9]{4,}" placeholder="Masukkan nama" autocomplete="off" required>
                            </div>
                            <label>Username <span class="text-danger">*</span></label>
                            <div class="kolominput">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" id="username" name="username"  pattern="[a-zA-Z0-9]{4,}" placeholder="Enter username" autocomplete="off" required>
                            </div>
                            <label>Password <span class="text-danger">*</span></label>
                            <div class="kolominput">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="password" name="password" placeholder="Enter password" required>
                            </div>        
                            <div class="form-group">                    
                            <label>Role <span class="text-danger">*</span></label>
                            <select aria-label="Default select example" name="role">
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="user">User</option>
                            </select>
                        </div>                     
                    </div>
                    <div class="btn-field">
                        <button type="submit" name="submit" class="btn btn-lg btn-success">Daftar</button>
                    </div>                                
                    <p>Sudah punya akun ? <a href="login.php">Masuk</a></p>
                    </form>
                </div>
                <div class="kanan">
                    <img src="asset/gambar/daftar.svg" alt="">
                </div>
                </section>
                </div>

            </div>
        </div>
    </body>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>AOS.init();</script>
    <!-- load Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="asset/js/sweetalert2.min.js"></script>
</html>