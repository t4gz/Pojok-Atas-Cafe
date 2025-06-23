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
                'subtotal' => $subtotal,
                'gambar' => $data['gambar'] ?? ''
            ];
        }
    }
}

$orderConfirmed = false;
$notification = '';

// Show notification only if flash message exists
if (isset($_SESSION['notification'])) {
    $notification = $_SESSION['notification'];
    unset($_SESSION['notification']);
}

if (isset($_SESSION['current_order_id'])) {
    $order_id = $_SESSION['current_order_id'];
    global $db;
    $query = "SELECT status_pesanan FROM pesanan WHERE id_pesanan = $order_id LIMIT 1";
    $result = mysqli_query($db, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['status_pesanan'] === 'Dikonfirmasi') {
            $orderConfirmed = true;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pesanan Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/pesanan.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <div class="d-flex align-items-center mb-4">
            <a href="Halaman_Keranjang.php" class="btn btn-outline-light text-dark me-1 mb-0">
                <i class="fa-solid fa-reply"></i>
            </a>
            <h1 class="mb-0 display-4 fw-bold">Pesanan Anda</h1>
        </div>
        <?php if ($notification): ?>
            <div class="alert alert-info" role="alert">
                <?= htmlspecialchars($notification) ?>
            </div>
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
                    <div class="quantity-container" style="border: none; padding: 0;">
                        <p style="margin: 0;"><?= htmlspecialchars($item['quantity']) ?>x</p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="container mt-4">
        <form method="post" action="process_submit_order.php" class="p-4 border rounded shadow-sm bg-light">
            <div class="form-floating mb-3">
                <input type="text" class="form-control form-control-lg rounded-3" id="customer_name" name="customer_name" placeholder="Nama Pemesan" required>
                <label for="customer_name"><i class="bi bi-person-fill me-2"></i>Nama Pemesan</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control form-control-lg rounded-3" id="table_number" name="table_number" min="1" placeholder="Nomor Meja" required>
                <label for="table_number"><i class="bi bi-table me-2"></i>Nomor Meja</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control rounded-3" id="catatan" name="catatan" placeholder="Catatan (opsional)" style="height: 100px;"></textarea>
                <label for="catatan"><i class="bi bi-journal-text me-2"></i>Catatan (Opsional)</label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg rounded-3 w-100">Kirim Pesanan</button>
            <div class="container mt-3 text-center">
                <div class="row align-items-end">
                    <div class="col-4 text-start">
                        <div class="total">
                            <h5>Total: Rp<?= number_format($totalPrice, 0, ',', '.') ?></h5>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="antar-kasir">
                            <h5>Antar Bukti Pesanan ke Kasir</h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <form method="get" action="Halaman_Bukti.php">
                            <button type="submit" class="btn btn-success btn-lg rounded-3" <?= $orderConfirmed ? '' : 'disabled' ?>>Cetak Bukti Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
