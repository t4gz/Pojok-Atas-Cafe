<?php
require 'function.php';

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
                        <li class="nav-item"><a class="nav-link" href="#cemilan">SNACK</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-basket2-fill" viewBox="0 0 16 16">
                    <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
                </svg>
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
                                <a class="tombol-plus" href="Pages/Halaman_Keranjang.php?type=makanan&id=<?= urlencode($mkn['id_makanan']); ?>">+</a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars($mkn["nama_makanan"]); ?></h5>
                                <p class="card-text">Rp<?= number_format($mkn["harga_makanan"], 0, ',', '.'); ?></p>
                                <p class="text-muted">Stok: <?= htmlspecialchars($mkn["stok_makanan"]); ?></p>
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
                                <a class="tombol-plus" href="Pages/Halaman_Keranjang.php?type=minuman&id=<?= urlencode($mnm['id_minuman']); ?>">+</a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars($mnm["nama_minuman"]); ?></h5>
                                <p class="card-text">Rp<?= number_format($mnm["harga_minuman"], 0, ',', '.'); ?></p>
                                <p class="text-muted">Stok: <?= htmlspecialchars($mnm["stok_minuman"]); ?></p>
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
                                <a class="tombol-plus" href="Pages/Halaman_Keranjang.php?type=cemilan&id=<?= urlencode($cml['id_cemilan']); ?>">+</a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars($cml["nama_cemilan"]); ?></h5>
                                <p class="card-text">Rp<?= number_format($cml["harga_cemilan"], 0, ',', '.'); ?></p>
                                <p class="text-muted">Stok: <?= htmlspecialchars($cml["stok_cemilan"]); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009-2011</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading">An Agency is Born</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2015</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2020</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <script>
            const icon = document.getElementById('iconkeranjang');

            window.addEventListener('scroll', function () {
                const makanan = document.getElementById('makanan');
                const minuman = document.getElementById('minuman');
                const cemilan = document.getElementById('cemilan');
                const makananTop = makanan.offsetTop;
                const minumanTop = minuman.offsetTop;
                const cemilanTop = cemilan.offsetTop;
                const scrollY = window.scrollY;

                if (
                    (scrollY >= makananTop - 200 && scrollY <= minumanTop + minuman.offsetHeight) ||
                    (scrollY >= cemilanTop - 200 && scrollY <= cemilanTop + cemilan.offsetHeight)
                ) {
                    icon.style.display = 'block';
                } else {
                    icon.style.display = 'none';
                }
            });
        </script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
