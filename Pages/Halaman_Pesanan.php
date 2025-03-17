<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Anda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/pesanan.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        <div class="item-card d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center">
                <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                <div>
                    <h5 class="mb-1">Nasi Goreng</h5>
                    <p class="mb-0" style="color:red;">Harga: Rp20.000</p>
                </div>
            </div>
            <div class="quantity-container" id="nasiGorengQty" style="border: none; padding: 0;">
                <p style="margin: 0;">x</p>
            </div>
        </div>

        <div class="item-card d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center">
                <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                <div>
                    <h5 class="mb-1">Matcha Latte</h5>
                    <p class="mb-0" style="color:red;">Harga: Rp25.000</p>
                </div>
            </div>
            <div class="quantity-container" id="matchaLatteQty" style="border: none; padding: 0;">
                <p style="margin: 0;">x</p>
            </div>
        </div>   
    </div>

    <div class="container fixed-bottom py-3 border-top border-3">
        <div class="text-center">
            <div class="total">Total: Rp0</div>
            <div class="antar-kasir">Antar ke Kasir</div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nasiGorengQty = localStorage.getItem('nasiGorengQty') || 0;
            const matchaLatteQty = localStorage.getItem('matchaLatteQty') || 0;
            const nasiGorengPrice = 20000; // Sesuaikan harga
            const matchaLattePrice = 25000;

            // Tampilkan jumlah pesanan
            document.getElementById('nasiGorengQty').innerText = nasiGorengQty + 'x';
            document.getElementById('matchaLatteQty').innerText = matchaLatteQty + 'x';

            // Hitung total
            const total = (nasiGorengQty * nasiGorengPrice) + (matchaLatteQty * matchaLattePrice);
            document.querySelector('.total').innerText = 'Total: Rp' + total.toLocaleString();
        });
    </script>
</body>
</html>