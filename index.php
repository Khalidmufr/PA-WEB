<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //koneksi ke database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'database';

    $conn = mysqli_connect($host, $user, $pass, $db);

    //memeriksa username dan password pada database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header('location: admin_dashboard.php');
        } else {
            header('location: user_dashboard.php');
        }
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<h1>Login Page</h1>
		<?php if (isset($error)) { ?>
			<div class="error"><?php echo $error; ?></div>
		<?php } ?>
		<form method="post">
			<label>Username</label>
			<input type="text" name="username" required>
			<label>Password</label>
			<input type="password" name="password" required>
            <label>Role<span class="text-danger">*</span></label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select to choose</option>
                <option value="1">Admin</option>
                <option value="2">Staff</option>
                <option value="3">User</option>
            </select>
			<button type="submit">Login</button>
		</form>
	</div>
</body>
</html>
