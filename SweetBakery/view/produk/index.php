<?php
require_once 'class/DB.php';
require_once 'class/Produk.php';

$produk = new Produk();
$data = [];

// Menangani pencarian
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $data = $produk->searchProduk($keyword);
} else {
    $data = $produk->getAllProduk();
}
?>

<h2>Daftar Produk</h2>

<a href="view/produk/add.php" class="btn-add">Tambah Produk</a>

<form class="search-form" action="" method="GET">
    <input type="text" name="keyword" placeholder="Cari produk..." value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
    <button type="submit">Cari</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($data) > 0): ?>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id_produk'] ?></td>
                    <td><?= $item['nama_produk'] ?></td>
                    <td><?= $item['nama_kategori'] ?></td>
                    <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                    <td><?= $item['stok'] ?></td>
                    <td><?= $item['deskripsi'] ?></td>
                    <td class="action-buttons">
                        <a href="view/produk/edit.php?id=<?= $item['id_produk'] ?>" class="btn-edit">Edit</a>
                        <a href="produk.php?action=delete&id=<?= $item['id_produk'] ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data produk</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>