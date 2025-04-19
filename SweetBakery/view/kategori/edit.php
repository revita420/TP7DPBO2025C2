<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/class/Kategori.php';

$kategori = new Kategori();

if (!isset($_GET['id'])) {
    header('Location: /SweetBakery/kategori.php');
    exit;
}

$id = $_GET['id'];
$data = $kategori->getKategoriById($id);

if (!$data) {
    header('Location: /SweetBakery/kategori.php');
    exit;
}

$pageTitle = "Edit Kategori";
include $_SERVER['DOCUMENT_ROOT'] . '/SweetBakery/view/template/header.php';
?>

<div class="content-wrapper">
    <h2>Edit Kategori</h2>

    <div class="form-container">
        <form action="/SweetBakery/kategori.php?action=update" method="POST">
            <input type="hidden" name="id_kategori" value="<?= $data['id_kategori'] ?>">
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label>
                <input type="text" id="nama_kategori" name="nama_kategori" value="<?= $data['nama_kategori'] ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi"><?= $data['deskripsi'] ?></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="form-submit">Simpan Perubahan</button>
                <a href="/SweetBakery/kategori.php" class="form-cancel">Batal</a>
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
