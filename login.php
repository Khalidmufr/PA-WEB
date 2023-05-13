<?php
session_start();
require "koneksi.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string ($koneksi, md5($_POST['password']));
    
    $query = "SELECT * FROM login WHERE username = '$username'" or die('query failed');
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(mysqli_num_rows($result) == 1) {
        
        if(password_verify($password, $user['password'])) {
            $query_admin = "SELECT * FROM login WHERE username='$username' AND role='admin';";
            $query_staff = "SELECT * FROM login WHERE username='$username' AND role='staff';";
            $query_user = "SELECT * FROM login WHERE username='$username' AND role='user';";
            
            $result_admin = mysqli_query($koneksi, $query_admin);
            $result_staff = mysqli_query($koneksi, $query_staff);
            $result_user = mysqli_query($koneksi, $query_user);
            
            if (mysqli_num_rows($result_admin) == 1) {
                    $_SESSION['role'] = 'admin';
                    $_SESSION['username'] = $username;
                    $row = mysqli_fetch_assoc($result_admin);
                    $_SESSION['nama'] = $row['nama'];
                    header("location: admin/index.php");

            } else if (mysqli_num_rows($result_staff) == 1) {
                    $_SESSION['role'] = 'staff';
                    $_SESSION['username'] = $username;
                    $row = mysqli_fetch_assoc($result_staff);
                    $_SESSION['nama'] = $row['nama'];
                    header("location: staff/index.php");
                
            } else if (mysqli_num_rows($result_user) == 1) {
                    $_SESSION['role'] = 'user';
                    $_SESSION['username'] = $username;
                    $row = mysqli_fetch_assoc($result_user);
                    $_SESSION['nama'] = $row['nama'];
                    header("location: user/beranda.php");       
            } 
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Gagal Login !</strong> Periksa Kembali Username dan Password anda
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Gagal Login !</strong> Username tidak terdaftar
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}
?>

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
    <link rel="stylesheet" href="asset/css/sweetalert2.min.css">
    <link rel="stylesheet" href="asset/css/animate.min.css">
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="asset/gambar/Ud Haderah.png">   
    <title>login</title>
</head>
<body>
    <div class="container">        
        <div class="box" data-aos="fade-up" data-aos-duration="1500"> 
            <h1>Masuk</h1>               
            <section class="login">            
            <div class="kiri">
                <img src="asset/gambar/login.svg" alt="">
            </div>
                <div class="kanan">
                    <form action="login.php" method="post">
                        <div class="inputan">                            
                            <label>Username <span class="text-danger">*</span></label>
                            <div class="kolominput">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" id="username" name="username" placeholder="Enter username" autocomplete="off" required>
                            </div>
                            <label>Password <span class="text-danger">*</span></label>
                            <div class="kolominput">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="password" name="password" placeholder="Enter password" required>
                            </div>                                                                                  
                        </div>
                    <div class="form-group">
                    <div class="btn-field">
                        <button type="submit" name="submit" class="btn btn-lg btn-success">Masuk</button>
                    </div>                                
                    <p>Belum punya akun ? <a href="daftar.php">Daftar</a></p>
                </div>                     
                    </form>
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