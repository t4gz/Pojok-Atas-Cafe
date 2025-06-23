<?php
session_start();
require_once '../function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = trim($_POST['customer_name'] ?? '');
    $table_number = intval($_POST['table_number'] ?? 0);

    if (empty($customer_name) || $table_number <= 0) {
        $_SESSION['notification'] = 'Nama pemesan dan nomor meja harus diisi dengan benar.';
        header('Location: Halaman_Pesanan.php');
        exit;
    }

    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        $_SESSION['notification'] = 'Keranjang kosong, tidak ada pesanan yang dapat diproses.';
        header('Location: Halaman_Keranjang.php');
        exit;
    }

    // Simulasi pengecekan stok dan pengajuan ke admin
    $stock_issue = false;
    foreach ($_SESSION['cart'] as $type => $items) {
        foreach ($items as $id => $quantity) {
            if ($quantity <= 0) continue;

            if ($type === 'makanan') {
                $item = getMakananById($id);
                $stock = $item['stok_makanan'] ?? 0;
            } elseif ($type === 'minuman') {
                $item = getMinumanById($id);
                $stock = $item['stok_minuman'] ?? 0;
            } elseif ($type === 'cemilan') {
                $item = getCemilanById($id);
                $stock = $item['stok_cemilan'] ?? 0;
            } else {
                continue;
            }

            if ($quantity > $stock) {
                $stock_issue = true;
                break 2;
            }
        }
    }

    if ($stock_issue) {
        $_SESSION['notification'] = 'Stok tidak mencukupi untuk beberapa menu. Silakan sesuaikan pesanan Anda.';
        header('Location: Halaman_Keranjang.php');
        exit;
    }

    // Simulasi persetujuan admin (langsung setujui untuk demo)
    $approved = true;

    if ($approved) {
        // Simpan data pesanan ke session untuk bukti
        $_SESSION['approved_order'] = [
            'customer_name' => $customer_name,
            'table_number' => $table_number,
            'order_items' => $_SESSION['cart']
        ];

        // Kosongkan keranjang
        unset($_SESSION['cart']);

        header('Location: Halaman_Bukti.php');
        exit;
    } else {
        $_SESSION['notification'] = 'Pesanan Anda belum disetujui oleh admin.';
        header('Location: Halaman_Keranjang.php');
        exit;
    }
} else {
    header('Location: Halaman_Keranjang.php');
    exit;
}
?>
