<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/Produk.php';

$produk = new Produk();
$produks = $produk->getAllProduk();

$pageTitle = "Tambah Pesanan";
include $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/view/template/header.php';
?>

<div class="content-wrapper">
    <h2>Tambah Pesanan</h2>

    <div class="form-container">
        <form action="/SweetBakery/pesanan.php?action=add" method="POST">
            <div class="form-group">
                <label for="id_produk">Produk:</label>
                <select id="id_produk" name="id_produk" required onchange="updateHarga()">
                    <option value="">Pilih Produk</option>
                    <?php foreach ($produks as $prod): ?>
                        <option value="<?= $prod['id_produk'] ?>" data-harga="<?= $prod['harga'] ?>" data-stok="<?= $prod['stok'] ?>"><?= $prod['nama_produk'] ?> - Rp <?= number_format($prod['harga'], 0, ',', '.') ?> (Stok: <?= $prod['stok'] ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan:</label>
                <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" value="1" required onchange="calculateTotal()">
                <small id="stok-warning" style="color: red; display: none;">Jumlah melebihi stok yang tersedia!</small>
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga (Rp):</label>
                <input type="number" id="total_harga" name="total_harga" step="0.01" min="0" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="form-submit" id="submit-btn">Simpan</button>
                <a href="/SweetBakery/pesanan.php" class="form-cancel">Batal</a>
            </div>
        </form>
    </div>
</div>

<style>
    .content-wrapper {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .form-container {
        width: 500px;
        max-width: 90%;
        background-color: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    .form-group input, 
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    .form-group textarea {
        min-height: 100px;
    }
    
    .form-actions {
        margin-top: 20px;
        display: flex;
        align-items: center;
    }
    
    .form-submit {
        padding: 8px 16px;
        background-color: #FF6B6B;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .form-submit:hover {
        background-color: #FF5252;
    }
    
    .form-submit:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }
    
    .form-cancel {
        margin-left: 10px;
        color: #333;
        text-decoration: none;
    }
</style>

<script>
    let harga = 0;
    let maxStok = 0;

    function updateHarga() {
        const produkSelect = document.getElementById('id_produk');
        const selectedOption = produkSelect.options[produkSelect.selectedIndex];
        
        if (selectedOption.value) {
            harga = parseFloat(selectedOption.getAttribute('data-harga'));
            maxStok = parseInt(selectedOption.getAttribute('data-stok'));
            calculateTotal();
        } else {
            harga = 0;
            maxStok = 0;
            document.getElementById('total_harga').value = 0;
        }
    }

    function calculateTotal() {
        const jumlah = parseInt(document.getElementById('jumlah').value) || 0;
        const totalHarga = jumlah * harga;
        document.getElementById('total_harga').value = totalHarga.toFixed(2);
        
        // Check stock availability
        const stokWarning = document.getElementById('stok-warning');
        const submitBtn = document.getElementById('submit-btn');
        
        if (jumlah > maxStok) {
            stokWarning.style.display = 'block';
            submitBtn.disabled = true;
        } else {
            stokWarning.style.display = 'none';
            submitBtn.disabled = false;
        }
    }
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/view/template/footer.php'; ?>
