<?php
require_once 'class/DB.php';
require_once 'class/Pesanan.php';
require_once 'class/Produk.php';

$pesanan = new Pesanan();
$produk = new Produk();

// Menangani aksi
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    switch ($action) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_produk = $_POST['id_produk'];
                $nama_pelanggan = $_POST['nama_pelanggan'];
                $jumlah = $_POST['jumlah'];
                $total_harga = $_POST['total_harga'];
                $status = $_POST['status'];
                
                if ($pesanan->addPesanan($id_produk, $nama_pelanggan, $jumlah, $total_harga, $status)) {
                    // Update product stock
                    $produkData = $produk->getProdukById($id_produk);
                    if ($produkData) {
                        $newStok = $produkData['stok'] - $jumlah;
                        $produk->updateProduk($id_produk, $produkData['nama_produk'], $produkData['id_kategori'], $produkData['harga'], $newStok, $produkData['deskripsi']);
                    }
                    
                    header('Location: pesanan.php?status=success&message=Pesanan berhasil ditambahkan');
                } else {
                    header('Location: pesanan.php?status=error&message=Gagal menambahkan pesanan');
                }
                exit;
            }
            break;
            
        case 'update':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id_pesanan'];
                $id_produk = $_POST['id_produk'];
                $nama_pelanggan = $_POST['nama_pelanggan'];
                $jumlah = $_POST['jumlah'];
                $total_harga = $_POST['total_harga'];
                $status = $_POST['status'];
                
                // Dapatkan data pesanan asli
                $oldPesanan = $pesanan->getPesananById($id);
                
                if ($pesanan->updatePesanan($id, $id_produk, $nama_pelanggan, $jumlah, $total_harga, $status)) {
                    // Sesuaikan stok produk 
                    if ($oldPesanan['id_produk'] == $id_produk) {
                        // Produk sama, hanya memperbarui perbedaan kuantitas
                        $produkData = $produk->getProdukById($id_produk);
                        if ($produkData) {
                            $stockDifference = $oldPesanan['jumlah'] - $jumlah;
                            $newStok = $produkData['stok'] + $stockDifference;
                            $produk->updateProduk($id_produk, $produkData['nama_produk'], $produkData['id_kategori'], $produkData['harga'], $newStok, $produkData['deskripsi']);
                        }
                    } else {
                        // Produk berbeda, kembalikan stok lama dan kurangi stok baru
                        $oldProdukData = $produk->getProdukById($oldPesanan['id_produk']);
                        if ($oldProdukData) {
                            $newOldStok = $oldProdukData['stok'] + $oldPesanan['jumlah'];
                            $produk->updateProduk($oldPesanan['id_produk'], $oldProdukData['nama_produk'], $oldProdukData['id_kategori'], $oldProdukData['harga'], $newOldStok, $oldProdukData['deskripsi']);
                        }
                        
                        $newProdukData = $produk->getProdukById($id_produk);
                        if ($newProdukData) {
                            $newStok = $newProdukData['stok'] - $jumlah;
                            $produk->updateProduk($id_produk, $newProdukData['nama_produk'], $newProdukData['id_kategori'], $newProdukData['harga'], $newStok, $newProdukData['deskripsi']);
                        }
                    }
                    
                    header('Location: pesanan.php?status=success&message=Pesanan berhasil diperbarui');
                } else {
                    header('Location: pesanan.php?status=error&message=Gagal memperbarui pesanan');
                }
                exit;
            }
            break;
            
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                
                // Dapatkan data pesanan sebelum menghapus
                $pesananData = $pesanan->getPesananById($id);
                
                if ($pesanan->deletePesanan($id)) {
                    // Mengembalikan stok produk
                    if ($pesananData) {
                        $produkData = $produk->getProdukById($pesananData['id_produk']);
                        if ($produkData) {
                            $newStok = $produkData['stok'] + $pesananData['jumlah'];
                            $produk->updateProduk($pesananData['id_produk'], $produkData['nama_produk'], $produkData['id_kategori'], $produkData['harga'], $newStok, $produkData['deskripsi']);
                        }
                    }
                    
                    header('Location: pesanan.php?status=success&message=Pesanan berhasil dihapus');
                } else {
                    header('Location: pesanan.php?status=error&message=Gagal menghapus pesanan');
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
include 'view/pesanan/index.php';

// Include footer
include 'view/template/footer.php';
?>