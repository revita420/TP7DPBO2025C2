<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/Kategori.php';

$kategori = new Kategori();
$kategoris = $kategori->getAllKategori();

$pageTitle = "Tambah Produk";
include $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/view/template/header.php';
?>

<div class="content-wrapper">
    <h2>Tambah Produk</h2>

    <div class="form-container">
        <form action="/SweetBakery/produk.php?action=add" method="POST">
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori:</label>
                <select id="id_kategori" name="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($kategoris as $kat): ?>
                        <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga (Rp):</label>
                <input type="number" id="harga" name="harga" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" id="stok" name="stok" min="0" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="form-submit">Simpan</button>
                <a href="/SweetBakery/produk.php" class="form-cancel">Batal</a>
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
    
    .form-cancel {
        margin-left: 10px;
        color: #333;
        text-decoration: none;
    }
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/view/template/footer.php'; ?>
