<?php
require_once 'class/DB.php';
require_once 'class/Produk.php';

$produk = new Produk();

// Menangani aksi
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    switch ($action) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama_produk'];
                $id_kategori = $_POST['id_kategori'];
                $harga = $_POST['harga'];
                $stok = $_POST['stok'];
                $deskripsi = $_POST['deskripsi'];
                
                if ($produk->addProduk($nama, $id_kategori, $harga, $stok, $deskripsi)) {
                    header('Location: produk.php?status=success&message=Produk berhasil ditambahkan');
                } else {
                    header('Location: produk.php?status=error&message=Gagal menambahkan produk');
                }
                exit;
            }
            break;
            
        case 'update':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id_produk'];
                $nama = $_POST['nama_produk'];
                $id_kategori = $_POST['id_kategori'];
                $harga = $_POST['harga'];
                $stok = $_POST['stok'];
                $deskripsi = $_POST['deskripsi'];
                
                if ($produk->updateProduk($id, $nama, $id_kategori, $harga, $stok, $deskripsi)) {
                    header('Location: produk.php?status=success&message=Produk berhasil diperbarui');
                } else {
                    header('Location: produk.php?status=error&message=Gagal memperbarui produk');
                }
                exit;
            }
            break;
            
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                
                if ($produk->deleteProduk($id)) {
                    header('Location: produk.php?status=success&message=Produk berhasil dihapus');
                } else {
                    header('Location: produk.php?status=error&message=Gagal menghapus produk');
                }
                exit;
            }
            break;
    }
}

// Include header
include 'view/template/header.php';

// Menampilkan pesan status
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $message = $_GET['message'] ?? '';
    $alertClass = ($status == 'success') ? 'background-color: #4CAF50; color: white;' : 'background-color: #f44336; color: white;';
    
    echo "<div style='padding: 15px; margin-bottom: 20px; $alertClass'>";
    echo $message;
    echo "</div>";
}

// Include main content
include 'view/produk/index.php';

// Include footer
include 'view/template/footer.php';
?>