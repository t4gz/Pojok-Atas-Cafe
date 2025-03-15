<!DOCTYPE html>
<html lang="en">
    <!-- apalah dia -->
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

    <body id="page-top">

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="images/icon_pjk.svg" alt="..." /></a>

                <!-- TOMBOL MENU -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>

                <!-- ISI DI TOMBOL MENU -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#makanan">MAKANAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="#minuman">MINUMAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="#cemilan">CEMILAN</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- BACKROUND DAN LOGO -->
        <header class="masthead">
            <div class="container">
            <div class="masthead-subheading">
            <div class="masthead-logo">
                <img src="images/logo pojok.png" alt="" style="width: 20%; height: auto;">
            </div>
                <!-- KALIMAT DIBAWAH LOGO -->
                <!-- <div class="masthead-subheading">Selamat Datang di pojok atas</div> -->
                <!-- <div class="masthead-heading text-uppercase">It's Nice To Meet You</div> -->

                <!-- TOMBOL TELUSURI -->
                <a class="btn btn-primary btn-md-xl text-uppercase" href="#makanan">Telusuri</a>
            </div>
        </header>
    </body>
</head>


<body>
    <!-- ICON KERANJANG -->
    <div class="iconkeranjang">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-basket2-fill" viewBox="0 0 16 16">
            <a href=""></a>
        <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1"/>
        </svg>
    </div>

    <!-- HEADER MAKANAN -->
    <section class="container mt-4" id="makanan">
        <h1 class="text-center">MAKANAN</h1>
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-5" id="menu-makanan">
            <!-- Menu akan di-generate oleh JavaScript -->
        </div>
    </section>

    <!-- HEADER MINUMAN -->
    <section class="container mt-4" id="minuman">
        <h1 class="text-center">MINUMAN</h1>
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-5" id="menu-minuman">
            <!-- Menu akan di-generate oleh JavaScript -->
        </div>
    </section>

    <!-- HEADER SNACK -->
    <section class="container mt-4" id="cemilan">
        <h1 class="text-center">SNACK</h1>
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-5" id="menu-cemilan">
            <!-- Menu akan di-generate oleh JavaScript -->
        </div>
    </section>

    <script>
        // DATA MAKANAN
        const makananItems = [
            { id: 1, name: "", price: , stok: , image: "" },
            { id: 2, name: "", price: , stok: , image: "" },
            { id: 3, name: "", price: , stok: , image: "" },
            { id: 4, name: "", price: , stok: , image: "" },
            { id: 5, name: "", price: , stok: , image: "" },
            { id: 6, name: "", price: , stok: , image: "" }
        ];

        // DATA MINUMAN
        const minumanItems = [
            { id: 1, name: "", price: , stok: , image: "" },
            { id: 2, name: "", price: , stok: , image: "" },
            { id: 3, name: "", price: , stok: , image: "" },
            { id: 4, name: "", price: , stok: , image: "" },
            { id: 5, name: "", price: , stok: , image: "" },
            { id: 6, name: "", price: , stok: , image: "" }
        ];

        // DATA SNACK
        const snackItems = [
            { id: 1, name: "", price: , stok: , image: "" },
            { id: 2, name: "", price: , stok: , image: "" },
            { id: 3, name: "", price: , stok: , image: "" },
            { id: 4, name: "", price: , stok: , image: "" },
            { id: 5, name: "", price: , stok: , image: "" },
            { id: 6, name: "", price: , stok: , image: "" }
        ];


        // MENAMPILKAN MENU MAKANAN
        function renderMenuMakanan() {
            let menuList = document.getElementById("menu-makanan");
            menuList.innerHTML = "";
            makananItems.forEach(item => {
                menuList.innerHTML += `
                    <div class="col">
                        <div class="card p-3 text-center menu-item">
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
                        <div class="card p-3 text-center menu-item">
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
            let menuList = document.getElementById("menu-snack");
            menuList.innerHTML = "";
            snackItems.forEach(item => {
                menuList.innerHTML += `
                    <div class="col">
                        <div class="card p-3 text-center menu-item">
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
        renderMenuCemilan();
    </script>

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
