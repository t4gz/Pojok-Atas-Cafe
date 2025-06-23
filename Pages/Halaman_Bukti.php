<?php
session_start();
require_once '../function.php';

if (!isset($_SESSION['approved_order'])) {
    header('Location: Halaman_Keranjang.php');
    exit;
}

$order = $_SESSION['approved_order'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bukti Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
        body {
            background-color: #f8f9fa;
        }
        .receipt-card {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .receipt-header {
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 25px;
            text-align: center;
        }
        .receipt-header h1 {
            font-weight: 700;
            color: #007bff;
            letter-spacing: 2px;
        }
        .receipt-info p {
            font-size: 1.1rem;
            margin: 0;
            padding: 2px 0;
        }
        .list-group-item {
            font-size: 1rem;
            border: none;
            padding-left: 0;
            padding-right: 0;
        }
        .list-group-item span {
            font-weight: 600;
            color: #28a745;
        }
        .total-price {
            font-size: 1.3rem;
            font-weight: 700;
            text-align: right;
            margin-top: 20px;
            color: #dc3545;
        }
        .btn-print, .btn-home {
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            transition: background-color 0.3s ease;
        }
        .btn-print {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-print:hover {
            background-color: #0056b3;
            color: white;
        }
        .btn-home {
            background-color: #6c757d;
            color: white;
            border: none;
            margin-left: 15px;
        }
        .btn-home:hover {
            background-color: #5a6268;
            color: white;
        }
    </style>
    <script>
        function printReceipt() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="receipt-card">
        <div class="receipt-header">
            <h1>POJOK ATAS CAFE</h1>
            <p>Bukti Pesanan</p>
        </div>
        <div class="receipt-info mb-3">
            <p><strong>Nama Pemesan:</strong> <?= htmlspecialchars($order['customer_name']) ?></p>
            <p><strong>Nomor Meja:</strong> <?= htmlspecialchars($order['table_number']) ?></p>
            <p><strong>Tanggal:</strong> <?= date('d-m-Y H:i') ?></p>
        </div>
        <ul class="list-group mb-3" style="max-height: 400px; overflow-y: auto;">
            <?php
            $totalPrice = 0;
            foreach ($order['order_items'] as $type => $items) {
                foreach ($items as $id => $quantity) {
                    if ($quantity <= 0) continue;

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
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                    echo htmlspecialchars($name) . ' x ' . htmlspecialchars($quantity);
                    echo '<span>Rp' . number_format($subtotal, 0, ',', '.') . '</span>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
        
        <div class="total-price">Total: Rp<?= number_format($totalPrice, 0, ',', '.') ?></div>
        <div class="mt-4 text-center no-print">
            <button class="btn btn-print" onclick="printReceipt()">Cetak Bukti</button>
            <a href="../index.php" class="btn btn-home">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
