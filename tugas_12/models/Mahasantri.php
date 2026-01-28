<?php
class Mahasantri {
    private $conn;
    private $table = "mahasantri";

    public function __construct($db) { 
        $this->conn = $db; 
    }

    // Mengambil semua data mahasantri dengan join ke tabel jurusan
    public function getAll() {
        $query = "SELECT m.*, j.nama_jurusan 
                  FROM mahasantri m 
                  LEFT JOIN jurusan j ON m.id_jurusan = j.id_jurusan 
                  ORDER BY m.id_mahasantri DESC";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Menghitung total seluruh mahasantri
    public function countAll() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    /** FUNGSI UNTUK MENAMBAH DATA BARU **/
    public function create($nama, $nim, $jurusan) {
        // Konversi string jurusan ke ID sesuai relasi tabel
        $id_jurusan = ($jurusan == 'PPL') ? 1 : 2; 

        $query = "INSERT INTO " . $this->table . " (nama_lengkap, nim, id_jurusan) 
                  VALUES (:nama, :nim, :id_jurusan)";
        
        $stmt = $this->conn->prepare($query);

        // Bind parameter untuk keamanan (PDO)
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':id_jurusan', $id_jurusan);

        return $stmt->execute();
    }

    /** FUNGSI UNTUK MENGUPDATE DATA (EDIT) **/
    public function update($id, $nama, $nim, $jurusan) {
        // Konversi string jurusan ke ID
        $id_jurusan = ($jurusan == 'PPL') ? 1 : 2;

        $query = "UPDATE " . $this->table . " 
                  SET nama_lengkap = :nama, nim = :nim, id_jurusan = :id_jurusan 
                  WHERE id_mahasantri = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':id_jurusan', $id_jurusan);

        return $stmt->execute();
    }

    /** FUNGSI UNTUK MENGHAPUS DATA **/
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_mahasantri = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}