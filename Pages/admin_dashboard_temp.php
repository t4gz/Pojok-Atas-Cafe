<?php
    include "../php/koneksi.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
        <!-- banner -->
        <div class="pt-3  bg-dark text-warning text-end">
            <div class="row">
                <div class="col-2" >
                    <img src="../images/icon_pjk.svg" alt="" width="200">
                </div>
                <div class="col-10">
                    <p style="font-size: 32px; padding-right: 1%; ">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Menu dan Navigasi -->
        <nav class="navbar navbar-expand-sm bg-secondary navbar-light fw-normal">
            <div class="container-fluid justify-content-center">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black" data-bs-toggle="dropdown" href="#">Pengaturan Data</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-black" href="main.php?p=dataBarang">Data Makanan</a></li>
                        <li><a class="dropdown-item text-black" href="#">Data Minuman</a></li>
                        <li><a class="dropdown-item text-black" href="#">Data Snack</a></li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-black" href="#">Manage User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">About</a>
                </li> -->
                <li class="nav-item text-end">
                    <a class="nav-link text-warning" href="#">Log out</a>
                </li>
                </ul>
            </div>
        </nav>
        <br>
       
        <div>
        </div>
</body>
</html>