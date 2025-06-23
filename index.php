<?php
require 'function.php';
session_start();
$totalCartItems = getCartTotalItems();

$makanan = getAllMakanan("SELECT * FROM makanan");
$minuman = getAllMinuman("SELECT * FROM minuman");
$cemilan = getAllCemilan("SELECT * FROM cemilan");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PojokAtas</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="images/icon_pjk.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#makanan">MAKANAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="#minuman">MINUMAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="#cemilan">CEMILAN</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">
                    <div class="masthead-logo">
                        <img src="images/logo pojok.png" alt="" style="width: 20%; height: auto;">
                    </div>
                    <a class="btn btn-primary btn-md-xl text-uppercase" href="#makanan">Telusuri</a>
                </div>
            </div>
        </header>

        <!-- KERANJANG -->
        <div class="iconkeranjang" id="iconkeranjang">
            <a href="Pages/Halaman_Keranjang.php">
                <i class="fas fa-shopping-basket fa-2x" color="red"></i>
                <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                    <?= $totalCartItems == 0 ? 'style="display:none;"' : '' ?>>
                    <?= $totalCartItems ?>
                </span>
            </a>
        </div>

        <h3 id="makanan" class="text-center my-4">Makanan</h3>
        <div class="container">
            <div class="row g-4">
                <?php foreach($makanan as $mkn) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card shadow-sm h-100">
                            <div class="gambar-container">
                                <img src="images/<?= htmlspecialchars($mkn["gambar"]); ?>" class="card-img-top" alt="<?= htmlspecialchars($mkn["nama_makanan"]); ?>">
                                <button type="button" class="tombol-plus btn-add-cart" data-type="makanan" data-id="<?= htmlspecialchars($mkn['id_makanan']) ?>">+</button>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars($mkn["nama_makanan"]); ?></h5>
                                <p class="card-text">Rp<?= number_format($mkn["harga_makanan"], 0, ',', '.'); ?></p>

                                <!-- Membuat stok tertulis ready ketika stok masih ada dan tertulis tidak ready ketika stok habis -->
                                <p class="mb-0">
                                    Stok:
                                    <?php if ($mkn['stok_makanan'] > 0): ?>
                                        <span class="badge bg-success">Tersedia</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Habis</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <h3 id="minuman" class="text-center my-4">Minuman</h3>
        <div class="container">
            <div class="row g-4">
                <?php foreach($minuman as $mnm) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card shadow-sm h-100">
                            <div class="gambar-container">
                                <img src="images/<?= htmlspecialchars($mnm["gambar"]); ?>" class="card-img-top" alt="<?= htmlspecialchars($mnm["nama_minuman"]); ?>">
                                <button type="button" class="tombol-plus btn-add-cart" data-type="minuman" data-id="<?= htmlspecialchars($mnm['id_minuman']) ?>">+</button>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars($mnm["nama_minuman"]); ?></h5>
                                <p class="card-text">Rp<?= number_format($mnm["harga_minuman"], 0, ',', '.'); ?></p>

                                <!-- Membuat stok tertulis ready ketika stok masih ada dan tertulis tidak ready ketika stok habis -->
                                <p class="mb-0">
                                    Stok:
                                    <?php if ($mnm['stok_minuman'] > 0): ?>
                                        <span class="badge bg-success">Tersedia</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Habis</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <h3 id="cemilan" class="text-center my-4">Cemilan</h3>
        <div class="container">
            <div class="row g-4">
                <?php foreach($cemilan as $cml) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card shadow-sm h-100">
                            <div class="gambar-container">
                                <img src="images/<?= htmlspecialchars($cml["gambar"]); ?>" class="card-img-top" alt="<?= htmlspecialchars($cml["nama_cemilan"]); ?>">
                                <button type="button" class="tombol-plus btn-add-cart" data-type="cemilan" data-id="<?= htmlspecialchars($cml['id_cemilan']) ?>">+</button>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars($cml["nama_cemilan"]); ?></h5>
                                <p class="card-text">Rp<?= number_format($cml["harga_cemilan"], 0, ',', '.'); ?></p>

                                <!-- Membuat stok tertulis ready ketika stok masih ada dan tertulis tidak ready ketika stok habis -->
                                <p class="mb-0">
                                    Stok:
                                    <?php if ($cml['stok_cemilan'] > 0): ?>
                                        <span class="badge bg-success">Tersedia</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Habis</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
            const icon = document.getElementById('iconkeranjang');

            window.addEventListener('scroll', function () {
                const scrollY = window.scrollY;

                if (scrollY > 500) {
                    icon.style.display = 'block'; // tampilkan ikon jika scroll > 200px
                } else {
                    icon.style.display = 'none'; // sembunyikan jika masih di atas
                }
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // notif keranjang
            $(document).ready(function() {
                $.get('notifkeranjang.php', function(resp) {
                    if (resp.success) {
                        if (resp.total > 0) {
                            $('#cart-count').text(resp.total).show();
                            $('#iconkeranjang').show();
                        } else {
                            $('#cart-count').hide();
                            $('#iconkeranjang').hide();
                        }
                    }
                }, 'json');
            });

            $(document).on('click', '.btn-add-cart', function(e){
                e.preventDefault();
                const type = $(this).data('type');
                const id   = $(this).data('id');
                $.post('notifkeranjang.php', { type, id }, function(resp){
                    if (resp.success) {
                        $('#cart-count').text(resp.total).show()
                                        .addClass('badge-pop');
                        setTimeout(() => $('#cart-count').removeClass('badge-pop'), 300);
                    }
                }, 'json');
            });
        </script>


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
