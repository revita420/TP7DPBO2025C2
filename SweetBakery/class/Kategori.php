<?php
class Kategori
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance()->getConnection();
    }

    public function getAllKategori()
    {
        $query = "SELECT * FROM kategori ORDER BY nama_kategori";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getKategoriById($id)
    {
        $query = "SELECT * FROM kategori WHERE id_kategori = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchKategori($keyword)
    {
        $query = "SELECT * FROM kategori WHERE nama_kategori LIKE :keyword";
        $stmt = $this->db->prepare($query);
        $keyword = "%$keyword%";
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addKategori($nama, $deskripsi)
    {
        $query = "INSERT INTO kategori (nama_kategori, deskripsi) VALUES (:nama, :deskripsi)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':deskripsi', $deskripsi);
        return $stmt->execute();
    }

    public function updateKategori($id, $nama, $deskripsi)
    {
        $query = "UPDATE kategori SET nama_kategori = :nama, deskripsi = :deskripsi WHERE id_kategori = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':deskripsi', $deskripsi);
        return $stmt->execute();
    }

    public function deleteKategori($id)
    {
        $query = "DELETE FROM kategori WHERE id_kategori = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>