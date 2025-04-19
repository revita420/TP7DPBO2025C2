<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/Pesanan.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/Produk.php';

$pesanan = new Pesanan();
$produk = new Produk();

if (!isset($_GET['id'])) {
    header('Location: /SweetBakery/pesanan.php');
    exit;
}

$id = $_GET['id'];
$data = $pesanan->getPesananById($id);

if (!$data) {
    header('Location: /SweetBakery/pesanan.php');
    exit;
}

$produks = $produk->getAllProduk();
$currentProduk = $produk->getProdukById($data['id_produk']);

$pageTitle = "Edit Pesanan";
include $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/view/template/header.php';
?>

<div class="content-wrapper">
    <h2>Edit Pesanan</h2>

    <div class="form-container">
        <form action="/SweetBakery/pesanan.php?action=update" method="POST">
            <input type="hidden" name="id_pesanan" value="<?= $data['id_pesanan'] ?>">
            <div class="form-group">
                <label for="id_produk">Produk:</label>
                <select id="id_produk" name="id_produk" required onchange="updateHarga()">
                    <option value="">Pilih Produk</option>
                    <?php foreach ($produks as $prod): ?>
                        <option value="<?= $prod['id_produk'] ?>" 
                                data-harga="<?= $prod['harga'] ?>" 
                                data-stok="<?= $prod['stok'] ?>"
                                <?= ($data['id_produk'] == $prod['id_produk']) ? 'selected' : '' ?>>
                            <?= $prod['nama_produk'] ?> - Rp <?= number_format($prod['harga'], 0, ',', '.') ?> (Stok: <?= $prod['stok'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan:</label>
                <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" value="<?= $data['jumlah'] ?>" required onchange="calculateTotal()">
                <small id="stok-warning" style="color: red; display: none;">Jumlah melebihi stok yang tersedia!</small>
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga (Rp):</label>
                <input type="number" id="total_harga" name="total_harga" step="0.01" min="0" value="<?= $data['total_harga'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Pending" <?= ($data['status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                    <option value="Diproses" <?= ($data['status'] == 'Diproses') ? 'selected' : '' ?>>Diproses</option>
                    <option value="Selesai" <?= ($data['status'] == 'Selesai') ? 'selected' : '' ?>>Selesai</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="form-submit" id="submit-btn">Simpan Perubahan</button>
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
    let currentHarga = <?= $currentProduk['harga'] ?>;
    let currentStok = <?= $currentProduk['stok'] ?>;
    let originalJumlah = <?= $data['jumlah'] ?>;
    
    function updateHarga() {
        const produkSelect = document.getElementById('id_produk');
        const selectedOption = produkSelect.options[produkSelect.selectedIndex];
        
        if (selectedOption.value) {
            currentHarga = parseFloat(selectedOption.getAttribute('data-harga'));
            currentStok = parseInt(selectedOption.getAttribute('data-stok'));
            
            // Jika produk sama, tambahkan kembali jumlah asli ke stok yang tersedia
            if (selectedOption.value == <?= $data['id_produk'] ?>) {
                currentStok += originalJumlah;
            }
            
            calculateTotal();
        }
    }

    function calculateTotal() {
        const jumlah = parseInt(document.getElementById('jumlah').value) || 0;
        const totalHarga = jumlah * currentHarga;
        document.getElementById('total_harga').value = totalHarga.toFixed(2);
        
        //  Cek ketersediaan stok
        const stokWarning = document.getElementById('stok-warning');
        const submitBtn = document.getElementById('submit-btn');
        
        let availableStock = currentStok;
        if (document.getElementById('id_produk').value == <?= $data['id_produk'] ?>) {
            availableStock = currentStok;
        }
        
        if (jumlah > availableStock) {
            stokWarning.style.display = 'block';
            submitBtn.disabled = true;
        } else {
            stokWarning.style.display = 'none';
            submitBtn.disabled = false;
        }
    }
    
    updateHarga();
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/view/template/footer.php'; ?>