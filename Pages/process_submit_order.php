<?php
session_start();
require_once '../function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = trim($_POST['customer_name'] ?? '');
    $table_number = intval($_POST['table_number'] ?? 0);
    $catatan = trim($_POST['catatan'] ?? '');

    // Server-side validation for required fields
    if (empty($customer_name)) {
        $_SESSION['notification'] = 'Nama pemesan harus diisi.';
        header('Location: Halaman_Pesanan.php');
        exit;
    }
    if ($table_number <= 0) {
        $_SESSION['notification'] = 'Nomor meja harus diisi dengan benar.';
        header('Location: Halaman_Pesanan.php');
        exit;
    }

    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        $_SESSION['notification'] = 'Keranjang kosong, tidak ada pesanan yang dapat diproses.';
        header('Location: Halaman_Keranjang.php');
        exit;
    }

    global $db;

    // Check stock availability
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

    // Insert new order with status 'Pending'
    $customer_name_escaped = mysqli_real_escape_string($db, $customer_name);
    $table_number_escaped = mysqli_real_escape_string($db, $table_number);
    $catatan_escaped = mysqli_real_escape_string($db, $catatan);
    $tanggal_pesanan = date('Y-m-d H:i:s');
    $status_pesanan = 'Pending';

    // Calculate total price
    $total_price = 0;
    foreach ($_SESSION['cart'] as $type => $items) {
        foreach ($items as $id => $quantity) {
            if ($type === 'makanan') {
                $item = getMakananById($id);
                $price = $item['harga_makanan'] ?? 0;
            } elseif ($type === 'minuman') {
                $item = getMinumanById($id);
                $price = $item['harga_minuman'] ?? 0;
            } elseif ($type === 'cemilan') {
                $item = getCemilanById($id);
                $price = $item['harga_cemilan'] ?? 0;
            } else {
                $price = 0;
            }
            $total_price += $price * $quantity;
        }
    }

    $total_price_escaped = mysqli_real_escape_string($db, $total_price);

    $query_insert_order = "INSERT INTO pesanan (nama_pemesan, nomor_meja, tanggal_pesanan, total_harga, status_pesanan, catatan) VALUES ('$customer_name_escaped', '$table_number_escaped', '$tanggal_pesanan', '$total_price_escaped', '$status_pesanan', '$catatan_escaped')";
    if (mysqli_query($db, $query_insert_order)) {
        $order_id = mysqli_insert_id($db);

        // Insert order details
        foreach ($_SESSION['cart'] as $type => $items) {
            foreach ($items as $id => $quantity) {
                $id_escaped = mysqli_real_escape_string($db, $id);
                $quantity_escaped = mysqli_real_escape_string($db, $quantity);
                $query_insert_detail = "INSERT INTO pesanan_detail (id_pesanan, menu_type, menu_id, jumlah) VALUES ('$order_id', '$type', '$id_escaped', '$quantity_escaped')";
                mysqli_query($db, $query_insert_detail);
            }
        }

        $_SESSION['approved_order'] = [
        'customer_name' => $customer_name,
        'table_number' => $table_number,
        'order_items' => $_SESSION['cart']
        ];

        // Store order ID in session
        $_SESSION['current_order_id'] = $order_id;

        // Clear cart
        unset($_SESSION['cart']);

        // Set notification to wait for confirmation
        $_SESSION['notification'] = 'Mohon tunggu konfirmasi pesanan.';

        // Redirect back to order page
        header('Location: Halaman_Pesanan.php');
        exit;
    } else {
        $_SESSION['notification'] = 'Gagal memproses pesanan: ' . mysqli_error($db);
        header('Location: Halaman_Pesanan.php');
        exit;
    }
} else {
    header('Location: Halaman_Keranjang.php');
    exit;
}
?>
