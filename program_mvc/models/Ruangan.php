<?php
require_once 'Database.php';

class Ruangan extends Database {
    public function getAll() {
        $sql = "SELECT * FROM ruangan ORDER BY id_ruangan ASC";
        return $this->conn->query($sql);
    }
    
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM ruangan WHERE id_ruangan = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insert($kode, $nama, $pj) {
        $stmt = $this->conn->prepare("INSERT INTO ruangan (kode_ruangan, nama_ruangan, penanggung_jawab) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $kode, $nama, $pj);
        return $stmt->execute();
    }

    public function update($id, $kode, $nama, $pj) {
        $stmt = $this->conn->prepare("UPDATE ruangan SET kode_ruangan=?, nama_ruangan=?, penanggung_jawab=? WHERE id_ruangan=?");
        $stmt->bind_param("sssi", $kode, $nama, $pj, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM ruangan WHERE id_ruangan = ?");
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } catch (mysqli_sql_exception $e) {
            // Mengembalikan false jika ruangan masih memiliki relasi di tabel aset
            return false;
        }
    }
}