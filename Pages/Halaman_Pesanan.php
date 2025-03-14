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

        <div class="item-card d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center">
                <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                <div>
                    <h5 class="mb-1">Nasi Goreng</h5>
                    <p class="mb-0" style="color:red;">Harga: Rp40.000</p>
                </div>
            </div>
            <div class="quantity-container" style="border: none; padding: 0;">
                <p style="margin: 0;">2x</p>
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
            <div class="quantity-container" style="border: none; padding: 0;">
                <p style="margin: 0;">1x</p>
            </div>
        </div>       
    </div>

    <div class="container fixed-bottom py-3 border-top border-3">
        <div class="text-center">
            <div class="total">
                Total: Rp90.000
            </div>
            <div class="antar-kasir">Antar ke Kasir</div>
        </div>
    </div>


    <!-- <script>
        function changeQuantity(itemId, change) {
            const input = document.getElementById(itemId);
            let currentValue = parseInt(input.value);
            currentValue += change;
            if (currentValue < 0) currentValue = 0;
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
    </script> -->

</body>
</html>