<?php
session_start();
include "../php/koneksi.php"; // Pastikan path ini benar

if (!isset($_SESSION['username'])) {
    header("Location: ../php/Login.php");
    exit;
}

$username = $_SESSION['username'];

// --- BAGIAN LOGIKA EKSPOR PDF/EXCEL ---
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Ambil data untuk ekspor
    $query_export = "SELECT id_pesanan, nama_pemesan, tanggal_pesanan, total_harga, status_pesanan FROM pesanan WHERE status_pesanan = 'Dikonfirmasi' ORDER BY tanggal_pesanan DESC";
    $result_export = mysqli_query($konek, $query_export);

    if ($action == 'export_excel') {
        // Ekspor ke CSV (sederhana tanpa PhpSpreadsheet)
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="riwayat_pesanan.csv"');

        $output = fopen('php://output', 'w');

        // Header CSV
        fputcsv($output, array('ID Pesanan', 'Nama Pemesan', 'Tanggal', 'Total Harga', 'Status')); // Sesuaikan dengan kolom Anda

        if (mysqli_num_rows($result_export) > 0) {
            while ($row = mysqli_fetch_assoc($result_export)) {
                fputcsv($output, array(
                    $row['id_pesanan'],
                    $row['nama_pemesan'],
                    $row['tanggal_pesanan'],
                    $row['total_harga'],
                    $row['status_pesanan']
                ));
            }
        }

        fclose($output);
        exit;
    }
}
// --- AKHIR BAGIAN LOGIKA EKSPOR ---

    // Ambil data riwayat pesanan (status 'Dikonfirmasi' saja)
    $query_riwayat = "SELECT * FROM pesanan WHERE status_pesanan = 'Dikonfirmasi' ORDER BY tanggal_pesanan DESC";
    $result_riwayat = mysqli_query($konek, $query_riwayat);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Riwayat Pesanan Admin</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .darkbg { background-color: #333; }
        .darkf { color: #333; }
        /* Style tambahan jika diperlukan */
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav darkbg sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class=""><img src="../images/icon_pjk.svg" alt="" width="100px"></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="Admin_dashboard.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i><span>Pengaturan Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-1 collapse-inner rounded">
                        <h6 class="collapse-header">Data :</h6>
                        <a class="collapse-item" href="Admin_Makanan.php">Makanan</a>
                        <a class="collapse-item" href="Admin_Minuman.php">Minuman</a>
                        <a class="collapse-item" href="Admin_Snack.php">Snack</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Admin_Konfirmasi_Pesanan.php"><i class="fas fa-fw fa-check-circle"></i><span>Konfirmasi Pesanan</span></a>
            </li>
            <li class="nav-item active"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseOrders">
                    <i class="fas fa-fw fa-history"></i><span>Riwayat Pesanan</span>
                </a>
                <div id="collapseOrders" class="collapse show" aria-labelledby="headingOrders" data-parent="#accordionSidebar"> <div class="bg-white py-1 collapse-inner rounded">
                        <h6 class="collapse-header">Opsi Riwayat:</h6>
                        <a class="collapse-item" href="Admin_Riwayat_Pesanan.php">Lihat Riwayat</a>
                        <a class="collapse-item" href="Admin_Riwayat_Pesanan.php?action=export_excel">Export Excel</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline"><button class="rounded-circle border-0" id="sidebarToggle"></button></div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
                    <div class=""><h1 class="h4 mb-0 darkf">Riwayat Pesanan</h1></div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($username); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../php/Logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Riwayat Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Nama Pemesan</th>
                                            <th>Nomor Meja</th>
                                            <th>Catatan</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Total Harga</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (mysqli_num_rows($result_riwayat) > 0): ?>
                                            <?php while ($row = mysqli_fetch_assoc($result_riwayat)): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['id_pesanan']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['nama_pemesan']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['nomor_meja']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['catatan']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['tanggal_pesanan']); ?></td>
                                                    <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                                    <td><?php echo htmlspecialchars($row['status_pesanan']); ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada riwayat pesanan.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>

    </body>

</html>