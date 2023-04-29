<?php
require "koneksi.php";
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    $query = "INSERT INTO login (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";
    
    if(mysqli_query($koneksi, $query)){
        echo "<script>
        alert('Berhasil daftar');
        document.location.href = 'index.php';
        </script>";
        
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <!-- load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- load custom CSS -->
    <link rel="stylesheet" href="asset/css/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar</h3>
                    </div>
                    <div class="panel-body">
                        <form action="register.php" method="post">
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
                                <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Daftar</button>
                            </fieldset>
                            <br>
                            Sudah punya akun ? <a href="index.php">Masuk</a>
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
