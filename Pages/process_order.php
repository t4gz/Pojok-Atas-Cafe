<?php
session_start();
require_once '../function.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // No items in cart, redirect back to cart page
    header('Location: Halaman_Keranjang.php');
    exit;
}

global $db;

foreach ($_SESSION['cart'] as $type => $items) {
    foreach ($items as $id => $quantity) {
        if ($quantity <= 0) {
            continue;
        }

        // Get current stock
        if ($type === 'makanan') {
            $item = getMakananById($id);
            $stock = $item['stok_makanan'] ?? 0;
            $newStock = max(0, $stock - $quantity);
            // Update stock in database
            $query = "UPDATE makanan SET stok_makanan = $newStock WHERE id_makanan = $id";
        } elseif ($type === 'minuman') {
            $item = getMinumanById($id);
            $stock = $item['stok_minuman'] ?? 0;
            $newStock = max(0, $stock - $quantity);
            $query = "UPDATE minuman SET stok_minuman = $newStock WHERE id_minuman = $id";
        } elseif ($type === 'cemilan') {
            $item = getCemilanById($id);
            $stock = $item['stok_cemilan'] ?? 0;
            $newStock = max(0, $stock - $quantity);
            $query = "UPDATE cemilan SET stok_cemilan = $newStock WHERE id_cemilan = $id";
        } else {
            continue;
        }

        mysqli_query($db, $query);
    }
}

// Save the current cart to last_order before clearing
$_SESSION['last_order'] = $_SESSION['cart'];

// Clear the cart after processing order
unset($_SESSION['cart']);

// Redirect to order summary page
header('Location: Halaman_Pesanan.php');
exit;
?>
