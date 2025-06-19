<?php
    include '../../php/koneksi.php';

    if (!isset($_GET['id'])) {
        die("ID snack tidak ditemukan.");
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM cemilan WHERE id_cemilan = $id";
    $result = mysqli_query($konek, $sql);

    if (mysqli_num_rows($result) == 0) {
        die("Data cemilan tidak ditemukan.");
    }

    $row = mysqli_fetch_assoc($result);

    $nama = $row['nama_cemilan'];
    $harga = $row['harga_cemilan'];
    $stok = $row['stok_cemilan'];
    $foto = $row['gambar'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Data Snack</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Edit Data Snack</h1>
                                    </div>
                                    <form action="./Snack_UpdateProcess.php" method="POST" enctype="multipart/form-data" class="mx-4 mt-4">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <div class="mb-3">
                                            <label for="nama_cemilan" class="form_label">Nama :</label>
                                            <input type="text" class="form-control" id="nama_cemilan" name="nama_cemilan" value="<?php echo htmlspecialchars($nama); ?>" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_cemilan" class="form_label">Harga :</label>
                                            <input type="text" class="form-control" id="harga_cemilan" name="harga_cemilan" value="<?php echo htmlspecialchars($harga); ?>" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="stok_cemilan" class="form_label">Stok :</label>
                                            <input type="text" class="form-control" id="stok_cemilan" name="stok_cemilan" value="<?php echo htmlspecialchars($stok); ?>" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto" class="form_label">Foto (biarkan kosong jika tidak ingin mengganti) :</label>
                                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" />
                                            <br />
                                            <img src="uploads/<?php echo htmlspecialchars($foto); ?>" alt="Foto Snack" style="width: 200px; height: auto;" />
                                        </div>
                                        <button type="submit" class="btn btn-dark text-light">Update</button>
                                        <a href="../Admin_Snack.php?p=Snack_EditHapus" class="btn btn-secondary">Batal</a>
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
