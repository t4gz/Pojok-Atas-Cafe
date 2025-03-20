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
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/plus.css" rel="stylesheet" />
    </head>

    <body id="page-top" style="background-color:#babbbc; z-index:1;">
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
                    </ul>
                </div>
            </div>
        </nav>
        
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

        <div class="iconkeranjang">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-basket2-fill" viewBox="0 0 16 16">
                <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
            </svg>
        </div>

        <section class="container mt-4" id="makanan">
            <h1 class="text-center">MAKANAN</h1>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-2" id="menu-makanan">
                <!-- Menu akan di-generate oleh JavaScript -->
            </div>
        </section>

        <section class="container mt-4" id="minuman">
            <h1 class="text-center">MINUMAN</h1>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-2" id="menu-minuman">
                <!-- Menu akan di-generate oleh JavaScript -->
            </div>
        </section>

        <section class="container mt-4" id="cemilan">
            <h1 class="text-center">SNACK</h1>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-2" id="menu-cemilan">
                <!-- Menu akan di-generate oleh JavaScript -->
            </div>
        </section>

        <script>
            // DATA MAKANAN
            const makananItems = [
                { id: 1, name: "Nasi Goreng", price: 20000, stok: 10, image: "nasi_goreng.jpg" },
                { id: 2, name: "Mie Goreng", price: 15000, stok: 5, image: "mie_goreng.jpg" },
                { id: 3, name: "Sate Ayam", price: 25000, stok: 8, image: "sate_ayam.jpg" },
                { id: 4, name: "Rendang", price: 30000, stok: 4, image: "rendang.jpg" },
                { id: 5, name: "Gado-Gado", price: 18000, stok: 6, image: "gado_gado.jpg" },
                { id: 6, name: "Soto Ayam", price: 22000, stok: 7, image: "soto_ayam.jpg" }
            ];

            // DATA MINUMAN
            const minumanItems = [
                { id: 1, name: "Teh Botol", price: 5000, stok: 20, image: "teh_botol.jpg" },
                { id: 2, name: "Kopi", price: 10000, stok: 15, image: "kopi.jpg" },
                { id: 3, name: "Jus Jeruk", price: 12000, stok: 10, image: "jus_jeruk.jpg" },
                { id: 4, name: "Air Mineral", price: 3000, stok: 50, image: "air_mineral.jpg" },
                { id: 5, name: "Soda", price: 8000, stok: 25, image: "soda.jpg" },
                { id: 6, name: "Es Teh", price: 7000, stok: 30, image: "es_teh.jpg" }
            ];

            // DATA SNACK
            const snackItems = [
                { id: 1, name: "Keripik", price: 5000, stok: 40, image: "keripik.jpg" },
                { id: 2, name: "Kue Cubir", price: 6000, stok: 35, image: "kue_cubir.jpg" },
                { id: 3, name: "Roti Bakar", price: 7000, stok: 20, image: "roti_bakar.jpg" },
                { id: 4, name: "Pisang Goreng", price: 8000, stok: 15, image: "pisang_goreng.jpg" },
                { id: 5, name: "Donat", price: 9000, stok: 10, image: "donat.jpg" },
                { id: 6, name: "Kue Lapis", price: 10000, stok: 5, image: "kue_lapis.jpg" }
            ];

            // MENAMPILKAN MENU MAKANAN
            function renderMenuMakanan() {
                let menuList = document.getElementById("menu-makanan");
                menuList.innerHTML = "";
                makananItems.forEach(item => {
                    menuList.innerHTML += `
                        <div class="col">
                            <div class="card p-1 text-center menu-item">
                                <div class="position-relative">
                                    <img src="images/${item.image}" class="img-fluid" alt="${item.name}">
                                    <button class="btn btn-add btn-success">+</button>
                                </div>
                                <div class="card-body">
                                    <h5>${item.name}</h5>
                                    <p>Harga: Rp${item.price}</p>
                                    <p>Stok ${item.stok}</p>
                                </div>
                            </div>
                        </div>`;
                });
            }
            renderMenuMakanan();

            // MENAMPILKAN MENU MINUMAN
            function renderMenuMinuman() {
                let menuList = document.getElementById("menu-minuman");
                menuList.innerHTML = "";
                minumanItems.forEach(item => {
                    menuList.innerHTML += `
                        <div class="col">
                            <div class="card p-1 text-center menu-item">
                                <div class="position-relative">
                                    <img src="images/${item.image}" class="img-fluid" alt="${item.name}">
                                    <button class="btn btn-add btn-success">+</button>
                                </div>
                                <div class="card-body">
                                    <h5>${item.name}</h5>
                                    <p>Harga: Rp${item.price}</p>
                                    <p>Stok ${item.stok}</p>
                                </div>
                            </div>
                        </div>`;
                });
            }
            renderMenuMinuman();

            // MENAMPILKAN MENU SNACK
            function renderMenuSnack() {
                let menuList = document.getElementById("menu-cemilan");
                menuList.innerHTML = "";
                snackItems.forEach(item => {
                    menuList.innerHTML += `
                        <div class="col">
                            <div class="card p-1 text-center menu-item">
                                <div class="position-relative">
                                    <img src="images/${item.image}" class="img-fluid" alt="${item.name}">
                                    <button class="btn btn-add btn-success">+</button>
                                </div>
                                <div class="card-body">
                                    <h5>${item.name}</h5>
                                    <p>Harga: Rp${item.price}</p>
                                    <p>Stok ${item.stok}</p>
                                </div>
                            </div>
                        </div>`;
                });
            }
            renderMenuSnack();
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
