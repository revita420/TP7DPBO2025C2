<?php
require_once 'class/DB.php';
require_once 'class/Kategori.php';

$kategori = new Kategori();
$data = [];

// Menangani pencarian
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $data = $kategori->searchKategori($keyword);
} else {
    $data = $kategori->getAllKategori();
}
?>

<h2>Daftar Kategori</h2>

<a href="view/kategori/add.php" class="btn-add">Tambah Kategori</a>

<form class="search-form" action="" method="GET">
    <input type="text" name="keyword" placeholder="Cari kategori..." value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
    <button type="submit">Cari</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($data) > 0): ?>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id_kategori'] ?></td>
                    <td><?= $item['nama_kategori'] ?></td>
                    <td><?= $item['deskripsi'] ?></td>
                    <td class="action-buttons">
                        <a href="view/kategori/edit.php?id=<?= $item['id_kategori'] ?>" class="btn-edit">Edit</a>
                        <a href="kategori.php?action=delete&id=<?= $item['id_kategori'] ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center;">Tidak ada data kategori</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>