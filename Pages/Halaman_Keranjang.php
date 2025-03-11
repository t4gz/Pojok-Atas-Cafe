<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/keranjang.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    
    <div class="container mt-3">
        <div class="d-flex align-items-center mb-4">
            <a href="#" class="btn btn-outline-light text-dark me-1 mb-0">
                <i class="bi bi-arrow-left"></i> 
            </a>
            <h1 class="mb-0">Keranjang Pesanan</h1>
        </div>

        <div class="item-card d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center">
                <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                <div>
                    <h5 class="mb-1">Nasi Goreng</h5>
                    <p class="mb-0">Stok: 2</p>
                    <p class="mb-0">Harga: Rp20.000</p>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-secondary" onclick="changeQuantity('nasiGoreng', -1)"> - </button>
                <input type="number" id="nasiGoreng" value="2" min="1" style="width: 50px; text-align: center;" readonly>
                <button class="btn btn-secondary" onclick="changeQuantity('nasiGoreng', 1)"> + </button>
            </div>
        </div>
        
        <div class="item-card d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center">
                <div class="item-image" style="width: 50px; height: 50px; background: #ccc; margin-right: 10px;"></div>
                <div>
                    <h5 class="mb-1">Matcha Latte</h5>
                    <p class="mb-0">Stok: 6</p>
                    <p class="mb-0">Harga: Rp25.000</p>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-secondary" onclick="changeQuantity('matchaLatte', -1)"> - </button>
                <input type="number" id="matchaLatte" value="6" min="1" style="width: 50px; text-align: center;" readonly>
                <button class="btn btn-secondary" onclick="changeQuantity('matchaLatte', 1)"> + </button>
            </div>
        </div>       
    </div>

    <div class="container fixed-bottom py-4 border-top border-3">
        <div class="row">
            <div class="col-sm-6 text-start">
                <div class="total" style="padding-left: 5%;">
                    Total: Rp90.000
                </div>
            </div>
            <div class="col-sm-6 text-end">
                <button class="btn btn-danger rounded-20" onclick="location.href='#'">Buat Pesanan</button>
            </div>
        </div>
    </div>

    <script>
        function changeQuantity(itemId, change) {
            const input = document.getElementById(itemId);
            let currentValue = parseInt(input.value);
            currentValue += change;
            if (currentValue < 1) currentValue = 1; // Prevent going below 1
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

</body>
</html>