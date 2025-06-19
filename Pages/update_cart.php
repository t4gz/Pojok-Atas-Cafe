<?php
session_start();
require_once '../function.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? null;
    $id = $_POST['id'] ?? null;
    $change = intval($_POST['change'] ?? 0);

    if ($type && $id) {
        // Get current stock from database
        $stock = 0;
        if ($type === 'makanan') {
            $item = getMakananById($id);
            $stock = $item['stok_makanan'] ?? 0;
        } elseif ($type === 'minuman') {
            $item = getMinumanById($id);
            $stock = $item['stok_minuman'] ?? 0;
        } elseif ($type === 'cemilan') {
            $item = getCemilanById($id);
            $stock = $item['stok_cemilan'] ?? 0;
        }

        // Current quantity in cart
        $currentQty = $_SESSION['cart'][$type][$id] ?? 0;
        $newQty = $currentQty + $change;

        // Validate stock limit
        if ($newQty > $stock) {
            $newQty = $stock; // limit to stock
        }
        if ($newQty < 0) {
            $newQty = 0;
        }

        if ($newQty === 0) {
            unset($_SESSION['cart'][$type][$id]);
            if (empty($_SESSION['cart'][$type])) {
                unset($_SESSION['cart'][$type]);
            }
        } else {
            $_SESSION['cart'][$type][$id] = $newQty;
        }
    }
}

header('Location: Halaman_Keranjang.php');
exit;
?>
