<?php
session_start();
require '../function.php';

$cartItems = [];
$totalPrice = 0;

$cartToUse = [];

if (isset($_SESSION['last_order']) && !empty($_SESSION['last_order'])) {
    $cartToUse = $_SESSION['last_order'];
    // Clear last_order after use
    unset($_SESSION['last_order']);
} elseif (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartToUse = $_SESSION['cart'];
}

if (!empty($cartToUse)) {
    foreach ($cartToUse as $type => $items) {
        foreach ($items as $id => $quantity) {
            if ($type === 'makanan') {
                $data = getMakananById($id);
                $price = $data['harga_makanan'];
                $name = $data['nama_makanan'];
            } elseif ($type === 'minuman') {
                $data = getMinumanById($id);
                $price = $data['harga_minuman'];
                $name = $data['nama_minuman'];
            } elseif ($type === 'cemilan') {
                $data = getCemilanById($id);
                $price = $data['harga_cemilan'];
                $name = $data['nama_cemilan'];
            } else {
                continue;
            }
            $subtotal = $price * $quantity;
            $totalPrice += $subtotal;
            $cartItems[] = [
                'type' => $type,
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'subtotal' => $subtotal
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/pesanan.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="container mt-3">
        <div class="d-flex align-items-center justify-content-center mb-4">
            <h1 class="mb-0 display-4 fw-bold">Pesanan Anda</h1>
        </div>

        <?php if (empty($cartItems)) : ?>
            <p>Keranjang kosong.</p>
        <?php else : ?>
            <?php foreach ($cartItems as $item) : ?>
                <div class="item-card d-flex justify-content-between align-items-center p-3">
                    <div class="d-flex align-items-center">
                        <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                        <div>
                            <h5 class="mb-1"><?= htmlspecialchars($item['name']) ?></h5>
                            <p class="mb-0" style="color:red;">Harga: Rp<?= number_format($item['price'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                    <div class="quantity-container" style="border: none; padding: 0;">
                        <p style="margin: 0;"><?= htmlspecialchars($item['quantity']) ?>x</p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="container fixed-bottom py-3 border-top border-3">
        <div class="text-center">
            <div class="total">
                Total: Rp<?= number_format($totalPrice, 0, ',', '.') ?>
            </div>
            <div class="antar-kasir">Antar ke Kasir</div>
        </div>
    </div>

</body>
</html>
