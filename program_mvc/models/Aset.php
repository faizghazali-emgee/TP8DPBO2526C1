<?php
require_once 'Database.php';

class Aset extends Database {
    public function getAll() {
        $sql = "SELECT aset.*, ruangan.nama_ruangan, ruangan.kode_ruangan 
                FROM aset 
                JOIN ruangan ON aset.id_ruangan = ruangan.id_ruangan 
                ORDER BY aset.id_aset ASC";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM aset WHERE id_aset = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insert($kode, $nama, $kondisi, $jumlah, $tanggal, $id_ruangan) {
        $stmt = $this->conn->prepare("INSERT INTO aset (kode_aset, nama_aset, kondisi, jumlah, tanggal_masuk, id_ruangan) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisi", $kode, $nama, $kondisi, $jumlah, $tanggal, $id_ruangan);
        return $stmt->execute();
    }

    public function update($id, $kode, $nama, $kondisi, $jumlah, $tanggal, $id_ruangan) {
        $stmt = $this->conn->prepare("UPDATE aset SET kode_aset=?, nama_aset=?, kondisi=?, jumlah=?, tanggal_masuk=?, id_ruangan=? WHERE id_aset=?");
        $stmt->bind_param("sssisii", $kode, $nama, $kondisi, $jumlah, $tanggal, $id_ruangan, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM aset WHERE id_aset = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}