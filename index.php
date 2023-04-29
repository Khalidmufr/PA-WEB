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
            echo "<script>
                alert('Username dan password salah.');
            </script>";
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
            echo "<script>
                alert('Username dan password salah.');
            </script>";
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
            echo "<script>
                alert('Username dan password salah.');
            </script>";
        }
    } else {
        echo "Role tidak valid!";
    }
}
mysqli_close($koneksi);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- load custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="asset/css/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Masuk</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="index.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label>Username<span class="text-danger">*</span></label>
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <label>Role<span class="text-danger">*</span></label>
                                    <br>
                                    <select class="form-control" aria-label="Default select example" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Masuk</button>
                            </fieldset>
                            <br>
                            Belum punya akun ? <a href="register.php">Daftar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- load Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
