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
            'subtotal' => $subtotal
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

        <?php if (empty($cartItems)) : ?>
            <p>Keranjang kosong.</p>
        <?php else : ?>
            <?php foreach ($cartItems as $item) : ?>
                <div class="item-card d-flex justify-content-between align-items-center p-3">
                    <div class="d-flex align-items-center">
                        <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                        <div>
                            <h5 class="mb-1"><?= htmlspecialchars($item['name']) ?></h5>
                            <p class="mb-0">Stok: <?= htmlspecialchars($item['stock']) ?></p>
                            <p class="mb-0" style="color:red;">Harga: Rp<?= number_format($item['price'], 0, ',', '.') ?></p>
                        </div>
                    </div>
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
<<<<<<< HEAD
            <?php endforeach; ?>
        <?php endif; ?>
=======
            </div>
            <div class="quantity-container">
                <button class="quantity-btn" onclick="changeQuantity('nasiGoreng', -1)">-</button>
                <input type="number" id="nasiGoreng" value="0" min="0" class="quantity-input" readonly>
                <button class="quantity-btn" onclick="changeQuantity('nasiGoreng', 1)">+</button>
            </div>
        </div>
        
        <div class="item-card d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center">
                <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                <div>
                    <h5 class="mb-1">Matcha Latte</h5>
                    <p class="mb-0">Stok: 6</p>
                    <p class="mb-0" style="color:red;">Harga: Rp25.000</p>
                </div>
            </div>
            <div class="quantity-container">
                <button class="quantity-btn" onclick="changeQuantity('matchaLatte', -1)">-</button>
                <input type="number" id="matchaLatte" value="0" min="0" class="quantity-input" readonly>
                <button class="quantity-btn" onclick="changeQuantity('matchaLatte', 1)">+</button>
            </div>
        </div>       
>>>>>>> 7beb0861819b403dae395f135105f74ccb6cc360
    </div>

    <div class="container fixed-bottom py-4 border-top border-3">
        <div class="row">
            <div class="col-sm-6 text-start">
                <div class="total" style="padding-left: 5%;">
                    Total: Rp<?= number_format($totalPrice, 0, ',', '.') ?>
                </div>
            </div>
            <div class="col-sm-6 text-end">
<<<<<<< HEAD
<button class="btn btn-danger rounded-20" onclick="location.href='process_order.php'">Buat Pesanan</button>
=======
                <button class="btn btn-danger rounded-20" onclick="createOrder()">Buat Pesanan</button>
>>>>>>> 7beb0861819b403dae395f135105f74ccb6cc360
            </div>
        </div>
    </div>

<<<<<<< HEAD
=======
    <script>
        function createOrder() {
            const nasiGorengQty = parseInt(document.getElementById('nasiGoreng').value);
            const matchaLatteQty = parseInt(document.getElementById('matchaLatte').value);
            
            // Simpan jumlah ke localStorage
            localStorage.setItem('nasiGorengQty', nasiGorengQty);
            localStorage.setItem('matchaLatteQty', matchaLatteQty);

            // Arahkan ke halaman pesanan
            location.href = 'Halaman_Pesanan.php';
        }

        function changeQuantity(itemId, change) {
            const input = document.getElementById(itemId);
            let currentValue = parseInt(input.value);
            currentValue += change;
            if (currentValue < 0) currentValue = 0; // Prevent going below 0
            input.value = currentValue;
            updateTotal();
        }

        function updateTotal() {
            const nasiGorengQty = parseInt(document.getElementById('nasiGoreng').value);
            const matchaLatteQty = parseInt(document.getElementById('matchaLatte').value);
            const nasiGorengPrice = 20000;
            const matchaLattePrice = 25000;

            const total = (nasiGorengQty * nasiGorengPrice) + (matchaLatteQty * matchaLattePrice);
            document.querySelector('.total').innerText = 'Total: Rp' + total.toLocaleString();
        }
    </script>

>>>>>>> 7beb0861819b403dae395f135105f74ccb6cc360
</body>
</html>
