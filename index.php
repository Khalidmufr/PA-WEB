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
<html>
<head>
    <title>Login</title>
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
                            <h3 class="panel-title">Masuk</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" action="index.php" method="post">
                                <div class="form-group">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
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
                                    <button type="submit" name="submit" class="btn btn-lg btn-success">Masuk</button>
                                </div>
                                <br>
                                Belum punya akun ? <a href="register.php">Daftar</a>
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
