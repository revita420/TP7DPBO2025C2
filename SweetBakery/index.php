<?php
require_once 'class/DB.php';

// Include header
include 'view/template/header.php';
?>

<div style="text-align: center; padding: 50px 0;">
    <h1 style="color: #ff6b6b; font-size: 36px; margin-bottom: 20px;">Selamat Datang di Sweet Bakery Management System</h1>
    <p style="font-size: 18px; margin-bottom: 30px;">Sistem manajemen untuk mengelola produk, kategori, dan pesanan di toko roti.</p>
    
    <div style="display: flex; justify-content: center; margin-top: 30px;">
        <div style="text-align: center; margin: 0 20px; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 200px;">
            <h3>Kategori</h3>
            <p>Kelola kategori produk</p>
            <a href="kategori.php" style="display: inline-block; background-color: #ff6b6b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 10px;">Kelola</a>
        </div>
        
        <div style="text-align: center; margin: 0 20px; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 200px;">
            <h3>Produk</h3>
            <p>Kelola produk bakery</p>
            <a href="produk.php" style="display: inline-block; background-color: #ff6b6b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 10px;">Kelola</a>
        </div>
        
        <div style="text-align: center; margin: 0 20px; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 200px;">
            <h3>Pesanan</h3>
            <p>Kelola pesanan pelanggan</p>
            <a href="pesanan.php" style="display: inline-block; background-color: #ff6b6b; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 10px;">Kelola</a>
        </div>
    </div>
</div>

<?php
// Include footer
include 'view/template/footer.php';
?>