<?php
class Pesanan
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance()->getConnection();
    }

    public function getAllPesanan()
    {
        $query = "SELECT p.*, pr.nama_produk 
                  FROM pesanan p 
                  LEFT JOIN produk pr ON p.id_produk = pr.id_produk 
                  ORDER BY p.tanggal_pesanan DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPesananById($id)
    {
        $query = "SELECT p.*, pr.nama_produk 
                  FROM pesanan p 
                  LEFT JOIN produk pr ON p.id_produk = pr.id_produk 
                  WHERE p.id_pesanan = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchPesanan($keyword)
    {
        $query = "SELECT p.*, pr.nama_produk 
                  FROM pesanan p 
                  LEFT JOIN produk pr ON p.id_produk = pr.id_produk 
                  WHERE p.nama_pelanggan LIKE :keyword OR pr.nama_produk LIKE :keyword";
        $stmt = $this->db->prepare($query);
        $keyword = "%$keyword%";
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPesanan($id_produk, $nama_pelanggan, $jumlah, $total_harga, $status)
    {
        $query = "INSERT INTO pesanan (id_produk, nama_pelanggan, jumlah, total_harga, status) 
                  VALUES (:produk, :pelanggan, :jumlah, :total, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':produk', $id_produk);
        $stmt->bindParam(':pelanggan', $nama_pelanggan);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':total', $total_harga);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function updatePesanan($id, $id_produk, $nama_pelanggan, $jumlah, $total_harga, $status)
    {
        $query = "UPDATE pesanan 
                  SET id_produk = :produk, 
                      nama_pelanggan = :pelanggan, 
                      jumlah = :jumlah, 
                      total_harga = :total, 
                      status = :status 
                  WHERE id_pesanan = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':produk', $id_produk);
        $stmt->bindParam(':pelanggan', $nama_pelanggan);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':total', $total_harga);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function deletePesanan($id)
    {
        $query = "DELETE FROM pesanan WHERE id_pesanan = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>