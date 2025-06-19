<?php
session_start();
ob_start(); // Untuk output buffering

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $konek = new mysqli("localhost", "root", "", "pojok_atas_cafe");

    // Pengecekan koneksi database
    if ($konek->connect_error) {
        die("Connection failed: " . $konek->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan prepared statement untuk mencegah SQL Injection
    $query = $konek->prepare("SELECT * FROM tb_admin WHERE nama=? AND passwwd=?");
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: ../Pages/Admin_Dashboard.php");
        exit;
    } else {
        echo "<script>alert('Login gagal! Username atau password salah.');</script>";
    }

    $query->close();
    $konek->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar bg-dark">
        <div class="container">
            <div class="row w-100">
                <div class="col-sm-6">
                    <a class="navbar-brand" href="#page-top">
                        <img src="../images/icon_pjk.svg" alt="Logo" width="150px" />
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container mt-4 pt-3">
        <form method="POST" action="">
            <div class="form-outline mb-4 fs-3">
                <label for="user" class="form-label fs-5 fw-normal col-4">Username</label>
                <input type="text" id="user" name="username" class="form-control fw-light" 
                       placeholder="Masukkan username anda" required />
            </div>

            <div class="form-outline mb-4 fs-3">
                <label for="pasw" class="form-label fs-5 fw-normal col-4">Password</label>
                <input type="password" id="pasw" name="password" class="form-control fw-light" 
                       placeholder="Masukkan password anda" required />
            </div>

            <hr>

            <div class="text-center">
                <button type="submit" class="btn btn-dark fw-normal text-warning mb-4 col-3 btn-sm rounded-3">
                    Log in
                </button>
            </div>
        </form>
    </div>
</body>
</html>
