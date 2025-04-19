<?php
require_once 'class/DB.php';
require_once 'class/Kategori.php';

$kategori = new Kategori();

// Menangani aksi
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    switch ($action) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama_kategori'];
                $deskripsi = $_POST['deskripsi'];
                
                if ($kategori->addKategori($nama, $deskripsi)) {
                    header('Location: kategori.php?status=success&message=Kategori berhasil ditambahkan');
                } else {
                    header('Location: kategori.php?status=error&message=Gagal menambahkan kategori');
                }
                exit;
            }
            break;
            
        case 'update':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id_kategori'];
                $nama = $_POST['nama_kategori'];
                $deskripsi = $_POST['deskripsi'];
                
                if ($kategori->updateKategori($id, $nama, $deskripsi)) {
                    header('Location: kategori.php?status=success&message=Kategori berhasil diperbarui');
                } else {
                    header('Location: kategori.php?status=error&message=Gagal memperbarui kategori');
                }
                exit;
            }
            break;
            
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                
                if ($kategori->deleteKategori($id)) {
                    header('Location: kategori.php?status=success&message=Kategori berhasil dihapus');
                } else {
                    header('Location: kategori.php?status=error&message=Gagal menghapus kategori');
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

// Include main ontent
include 'view/kategori/index.php';

// Include footer
include 'view/template/footer.php';
?>