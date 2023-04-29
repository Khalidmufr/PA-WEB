<?php
require "koneksi.php";
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    $query = "INSERT INTO login (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";
    $cari_nama = "SELECT nama FROM login WHERE nama='$nama'";
    $valid = mysqli_query($koneksi,$cari_nama);
    $cari_username = "SELECT username FROM login WHERE username='$username'";
    $valid_2 = mysqli_query($koneksi,$cari_username);

    if(mysqli_num_rows($valid) > 0){
       echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Mendaftar !</strong> Nama sudah digunakan
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";              
    } else if(mysqli_num_rows($valid_2) > 0) {
       echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Gagal Mendaftar !</strong> Username sudah digunakan
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";              
    } else {
        echo "<div class='alert alert-success'><strong>Berhasil Melakukan Pendaftaran !</strong></div>";
        mysqli_query($koneksi, $query);
        // echo "<script>       
        // alert('Berhasil Melakukan Pendaftaran');
        // document.location.href = 'index.php';
        // </script>";
        // echo  mysqli_error($koneksi);
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
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" action="register.php" method="post">
                                <div class="form-group">
                                    <label>Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                                </div>
                                <br>
                                <div class="form-group">                    
                                    <label>Role <span class="text-danger">*</span></label>
                                    <select class="form-control" aria-label="Default select example" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <br>
                                <div class="tombol">
                                    <button type="submit" name="submit" class="btn btn-lg btn-success">Kirim</button>
                                </div>
                                <br>
                                Sudah punya akun ? <a href="index.php">Masuk</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- load Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
