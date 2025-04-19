<?php
require_once 'class/DB.php';
require_once 'class/Pesanan.php';

$pesanan = new Pesanan();
$data = [];

// Menangani pencarian
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $data = $pesanan->searchPesanan($keyword);
} else {
    $data = $pesanan->getAllPesanan();
}
?>

<h2>Daftar Pesanan</h2>

<a href="view/pesanan/add.php" class="btn-add">Tambah Pesanan</a>

<form class="search-form" action="" method="GET">
    <input type="text" name="keyword" placeholder="Cari pesanan berdasarkan nama pelanggan atau produk..." value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
    <button type="submit">Cari</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Nama Pelanggan</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal Pesanan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($data) > 0): ?>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id_pesanan'] ?></td>
                    <td><?= $item['nama_produk'] ?></td>
                    <td><?= $item['nama_pelanggan'] ?></td>
                    <td><?= $item['jumlah'] ?></td>
                    <td>Rp <?= number_format($item['total_harga'], 0, ',', '.') ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($item['tanggal_pesanan'])) ?></td>
                    <td>
                        <?php
                        $statusClass = '';
                        switch ($item['status']) {
                            case 'Pending':
                                $statusClass = 'background-color: #FFC107; padding: 3px 8px; border-radius: 3px; color: white;';
                                break;
                            case 'Diproses':
                                $statusClass = 'background-color: #2196F3; padding: 3px 8px; border-radius: 3px; color: white;';
                                break;
                            case 'Selesai':
                                $statusClass = 'background-color: #4CAF50; padding: 3px 8px; border-radius: 3px; color: white;';
                                break;
                        }
                        ?>
                        <span style="<?= $statusClass ?>"><?= $item['status'] ?></span>
                    </td>
                    <td class="action-buttons">
                        <a href="view/pesanan/edit.php?id=<?= $item['id_pesanan'] ?>" class="btn-edit">Edit</a>
                        <a href="pesanan.php?action=delete&id=<?= $item['id_pesanan'] ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align: center;">Tidak ada data pesanan</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>