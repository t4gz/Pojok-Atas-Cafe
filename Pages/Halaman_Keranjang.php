<?php
session_start();
require '../function.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding item to cart
if (isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];

    // Add or increment item in cart
    if (!isset($_SESSION['cart'][$type])) {
        $_SESSION['cart'][$type] = [];
    }
    if (isset($_SESSION['cart'][$type][$id])) {
        $_SESSION['cart'][$type][$id]++;
    } else {
        $_SESSION['cart'][$type][$id] = 1;
    }
}

// Fetch cart items details
$cartItems = [];
$totalPrice = 0;

foreach ($_SESSION['cart'] as $type => $items) {
    foreach ($items as $id => $quantity) {
        if ($type === 'makanan') {
            $data = getMakananById($id);
            $price = $data['harga_makanan'];
            $name = $data['nama_makanan'];
            $stock = $data['stok_makanan'];
        } elseif ($type === 'minuman') {
            $data = getMinumanById($id);
            $price = $data['harga_minuman'];
            $name = $data['nama_minuman'];
            $stock = $data['stok_minuman'];
        } elseif ($type === 'cemilan') {
            $data = getCemilanById($id);
            $price = $data['harga_cemilan'];
            $name = $data['nama_cemilan'];
            $stock = $data['stok_cemilan'];
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
            'stock' => $stock,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
            'gambar' => $data['gambar'] ?? ''
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/keranjang.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="container mt-3">
        <div class="d-flex align-items-center mb-4">
            <a href="../index.php" class="btn btn-outline-light text-dark me-1 mb-0">
                <i class="fa-solid fa-reply"></i>            
            </a>
            <h1 class="mb-0 fw-bold">Keranjang Pesanan</h1>
        </div>

        <?php if (isset($_SESSION['notification'])) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['notification']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['notification']); ?>
        <?php endif; ?>

        <?php if (empty($cartItems)) : ?>
            <p>Keranjang kosong.</p>
        <?php else : ?>
            <?php foreach ($cartItems as $item) : ?>
                <div class="item-card d-flex justify-content-between align-items-center p-3">
                    <div class="d-flex align-items-center">
                        <?php if (!empty($item['gambar'])): ?>
                            <img src="../images/<?= htmlspecialchars($item['gambar']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                        <?php else: ?>
                            <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                        <?php endif; ?>
                        <div>
                            <h5 class="mb-1"><?= htmlspecialchars($item['name']) ?></h5>
                            <p class="mb-0" style="color:red;">Harga: Rp<?= number_format($item['price'], 0, ',', '.') ?></p>
                        </div>
                    </div>

                    <!-- tombol kurang dan tambah -->
                    <div class="quantity-container">
                        <form method="post" action="update_cart.php" class="d-flex align-items-center">
                            <input type="hidden" name="type" value="<?= htmlspecialchars($item['type']) ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
                            <button type="submit" name="change" value="-1" class="quantity-btn">-</button>
                            <input type="number" name="quantity" value="<?= htmlspecialchars($item['quantity']) ?>" min="0" class="quantity-input" readonly>
                            <button type="submit" name="change" value="1" class="quantity-btn">+</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="container fixed-bottom py-4 border-top border-3 bg-white">
        <div class="row">
            <div class="col-sm-6 text-start">
                <div class="total" style="padding-left: 5%;">
                    Total: Rp<?= number_format($totalPrice, 0, ',', '.') ?>
                    <br></br>
                    Kurangi jumlah item hingga 0 untuk menghapus
                </div>
            </div>
            <div class="col-sm-6 text-end">
                <button class="btn btn-danger rounded-20" onclick="location.href='Halaman_Pesanan.php'">Buat Pesanan</button>
            </div>
        </div>
    </div>
</body>
</html>
