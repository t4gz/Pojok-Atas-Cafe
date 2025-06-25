<?php
session_start();
include "../php/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../php/Login.php");
    exit;
}

$username = $_SESSION['username'];

if (!$konek) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Proses konfirmasi/batal pesanan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_pesanan']) && isset($_POST['action'])) {
        $id_pesanan = mysqli_real_escape_string($konek, $_POST['id_pesanan']);
        $action = $_POST['action'];

        if ($action == 'konfirmasi') {
            // Update status menjadi Dikonfirmasi
            $query_update = "UPDATE pesanan SET status_pesanan = 'Dikonfirmasi' WHERE id_pesanan = '$id_pesanan'";
            if (mysqli_query($konek, $query_update)) {
                // Ambil detail pesanan untuk update stok
                $query_detail = "SELECT * FROM pesanan_detail WHERE id_pesanan = '$id_pesanan'";
                $result_detail = mysqli_query($konek, $query_detail);

                while ($row_detail = mysqli_fetch_assoc($result_detail)) {
                    $menu_type = $row_detail['menu_type'];
                    $menu_id = $row_detail['menu_id'];
                    $jumlah = $row_detail['jumlah'];

                    if ($menu_type == 'makanan') {
                        $update_stock = "UPDATE makanan SET stok_makanan = stok_makanan - $jumlah WHERE id_makanan = $menu_id";
                    } elseif ($menu_type == 'minuman') {
                        $update_stock = "UPDATE minuman SET stok_minuman = stok_minuman - $jumlah WHERE id_minuman = $menu_id";
                    } elseif ($menu_type == 'cemilan') {
                        $update_stock = "UPDATE cemilan SET stok_cemilan = stok_cemilan - $jumlah WHERE id_cemilan = $menu_id";
                    }

                    mysqli_query($konek, $update_stock);
                }

                $_SESSION['message'] = "Pesanan berhasil dikonfirmasi!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Gagal mengkonfirmasi pesanan: " . mysqli_error($konek);
                $_SESSION['message_type'] = "danger";
            }
        } elseif ($action == 'batal') {
            $query_update = "UPDATE pesanan SET status_pesanan = 'Dibatalkan' WHERE id_pesanan = '$id_pesanan'";
            if (mysqli_query($konek, $query_update)) {
                $_SESSION['message'] = "Pesanan berhasil dibatalkan!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Gagal membatalkan pesanan: " . mysqli_error($konek);
                $_SESSION['message_type'] = "danger";
            }
        }

        header("Location: Admin_Konfirmasi_Pesanan.php");
        exit;
    }
}

// Ambil semua pesanan yang statusnya Pending/Baru
$query_pesanan = "SELECT * FROM pesanan WHERE status_pesanan IN ('Pending', 'Baru') ORDER BY tanggal_pesanan DESC";
$result_pesanan = mysqli_query($konek, $query_pesanan);
$all_orders = [];
$pesanan_details = [];

if ($result_pesanan && mysqli_num_rows($result_pesanan) > 0) {
    while ($row = mysqli_fetch_assoc($result_pesanan)) {
        $id_pesanan = $row['id_pesanan'];
        $all_orders[] = $row;

        // Ambil detail setiap pesanan
        $query_detail = "SELECT pd.*, 
            CASE 
                WHEN pd.menu_type = 'makanan' THEN (SELECT nama_makanan FROM makanan WHERE id_makanan = pd.menu_id)
                WHEN pd.menu_type = 'minuman' THEN (SELECT nama_minuman FROM minuman WHERE id_minuman = pd.menu_id)
                WHEN pd.menu_type = 'cemilan' THEN (SELECT nama_cemilan FROM cemilan WHERE id_cemilan = pd.menu_id)
                ELSE 'Unknown'
            END AS nama_menu
            FROM pesanan_detail pd WHERE pd.id_pesanan = $id_pesanan";

        $result_detail = mysqli_query($konek, $query_detail);
        $details = [];

        while ($detail_row = mysqli_fetch_assoc($result_detail)) {
            $details[] = $detail_row;
        }

        $pesanan_details[$id_pesanan] = $details;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Konfirmasi Pesanan Admin</title>

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
            <li class="nav-item active"> <a class="nav-link" href="Admin_Konfirmasi_Pesanan.php"><i class="fas fa-fw fa-check-circle"></i><span>Konfirmasi Pesanan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseOrders">
                    <i class="fas fa-fw fa-history"></i><span>Riwayat Pesanan</span>
                </a>
                <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders" data-parent="#accordionSidebar">
                    <div class="bg-white py-1 collapse-inner rounded">
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
                    <div class=""><h1 class="h4 mb-0 darkf">Konfirmasi Pesanan</h1></div>
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
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['message']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                        unset($_SESSION['message_type']);
                        ?>
                    <?php endif; ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan Menunggu Konfirmasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <!-- <th>ID Pesanan</th> -->
                                        <th>Nama Pemesan</th>
                                        <th>Nomor Meja</th>
                                        <th>Catatan</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Menu Pesanan</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php if (count($all_orders) > 0): ?>
        <?php foreach ($all_orders as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nama_pemesan']); ?></td>
                <td><?php echo htmlspecialchars($row['nomor_meja']); ?></td>
                <td><?php echo htmlspecialchars($row['catatan']); ?></td>
                <td><?php echo htmlspecialchars($row['tanggal_pesanan']); ?></td>
                <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($row['status_pesanan']); ?></td>
                <td>
                    <?php
                    $id_pesanan = $row['id_pesanan'];
                    if (isset($pesanan_details[$id_pesanan])) {
                        echo "<ul>";
                        foreach ($pesanan_details[$id_pesanan] as $detail) {
                            echo "<li>" . htmlspecialchars($detail['nama_menu']) . " x " . htmlspecialchars($detail['jumlah']) . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
                <td>
                    <form method="POST" action="" style="display:inline-block;">
                        <input type="hidden" name="id_pesanan" value="<?php echo $row['id_pesanan']; ?>">
                        <button type="submit" name="action" value="konfirmasi" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Konfirmasi</button>
                    </form>
                    <form method="POST" action="" style="display:inline-block;">
                        <input type="hidden" name="id_pesanan" value="<?php echo $row['id_pesanan']; ?>">
                        <button type="submit" name="action" value="batal" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin membatalkan pesanan ini?');"><i class="fas fa-times"></i> Batalkan</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="9" class="text-center">Tidak ada pesanan menunggu konfirmasi.</td>
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