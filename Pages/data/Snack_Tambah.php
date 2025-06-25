<?php
    include '../php/koneksi.php';
    if (!isset($_SESSION['username'])) {
        header("Location: ../../php/Login.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Data Snack</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Data Snack</h1>
                                    </div>
                                    <form action="./data/Snack_InputProcess.php" method="POST" enctype="multipart/form-data" class="mx-4 mt-4">
                                        <div class="mb-3">
                                            <label for="cemilan" class="form_label">Nama :</label>
                                            <input type="text" class="form-control" id="cemilan" name="cemilan" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_cemilan" class="form_label">Harga :</label>
                                            <input type="text" class="form-control" id="harga_cemilan" name="harga_cemilan" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="stok_cemilan" class="form_label">Stok :</label>
                                            <input type="text" class="form-control" id="stok_cemilan" name="stok_cemilan" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto" class="form_label">Foto :</label>
                                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required />
                                        </div>
                                        <button type="submit" class="btn btn-dark text-light">Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

</body>

</html>
