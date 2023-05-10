<?php
session_start();
require "koneksi.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $role = mysqli_real_escape_string($koneksi, $_POST['role']);
    if ($role == 'admin') {
        $query = "SELECT * FROM login WHERE username='$username' AND password='$password' AND role='$role'";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['role'] = $role;
            $_SESSION['username'] = $username;
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nama'] = $row['nama'];
            header("location: admin/index.php");
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Login !</strong> Periksa kembali username dan password atau role anda.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            // echo "<script>
            //     alert('Username dan password salah.');
            // </script>";
        }
    } else if ($role == 'staff') {
        $query = "SELECT * FROM login WHERE username='$username' AND password='$password' AND role='$role'";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['role'] = $role;
            $_SESSION['username'] = $username;
			$row = mysqli_fetch_assoc($result);
            $_SESSION['nama'] = $row['nama'];
            header("location: staff/index.php");
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Login !</strong> Periksa kembali username dan password atau role anda.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        }
    } else if ($role == 'user') {
        $query = "SELECT * FROM login WHERE username='$username' AND password='$password' AND role='$role'";
        $result = mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['role'] = $role;
            $_SESSION['username'] = $username;
			$row = mysqli_fetch_assoc($result);
            $_SESSION['nama'] = $row['nama'];
            header("location: user/beranda.php");
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Login !</strong> Periksa kembali username dan password atau role anda.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        }
    } else {
        echo "Role tidak valid!";
    }
}
// mysqli_close($koneksi);
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
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="../asset/gambar/Ud Haderah.png">   
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
                    <form role="form" action="index.php" method="post">
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
                        <button type="submit" name="submit" class="btn btn-lg btn-success">Masuk</button>
                    </div>                                
                    <p>Belum punya akun ? <a href="daftar.php">Daftar</a></p>
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
</html>