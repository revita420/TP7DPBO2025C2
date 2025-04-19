<?php
class Produk
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance()->getConnection();
    }

    public function getAllProduk()
    {
        $query = "SELECT p.*, k.nama_kategori 
                  FROM produk p 
                  LEFT JOIN kategori k ON p.id_kategori = k.id_kategori 
                  ORDER BY p.nama_produk";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProdukById($id)
    {
        $query = "SELECT p.*, k.nama_kategori 
                  FROM produk p 
                  LEFT JOIN kategori k ON p.id_kategori = k.id_kategori 
                  WHERE p.id_produk = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchProduk($keyword)
    {
        $query = "SELECT p.*, k.nama_kategori 
                  FROM produk p 
                  LEFT JOIN kategori k ON p.id_kategori = k.id_kategori 
                  WHERE p.nama_produk LIKE :keyword";
        $stmt = $this->db->prepare($query);
        $keyword = "%$keyword%";
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduk($nama, $id_kategori, $harga, $stok, $deskripsi)
    {
        $query = "INSERT INTO produk (nama_produk, id_kategori, harga, stok, deskripsi) 
                  VALUES (:nama, :kategori, :harga, :stok, :deskripsi)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kategori', $id_kategori);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':deskripsi', $deskripsi);
        return $stmt->execute();
    }

    public function updateProduk($id, $nama, $id_kategori, $harga, $stok, $deskripsi)
    {
        $query = "UPDATE produk 
                  SET nama_produk = :nama, 
                      id_kategori = :kategori, 
                      harga = :harga, 
                      stok = :stok, 
                      deskripsi = :deskripsi 
                  WHERE id_produk = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':kategori', $id_kategori);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':deskripsi', $deskripsi);
        return $stmt->execute();
    }

    public function deleteProduk($id)
    {
        $query = "DELETE FROM produk WHERE id_produk = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>