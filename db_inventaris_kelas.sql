CREATE DATABASE IF NOT EXISTS db_inventaris_kelas;
USE db_inventaris_kelas;

-- Tabel Baru: Ruangan / Kelas (Parent Table)
CREATE TABLE ruangan (
    id_ruangan INT AUTO_INCREMENT PRIMARY KEY,
    kode_ruangan VARCHAR(20) NOT NULL UNIQUE,
    nama_ruangan VARCHAR(100) NOT NULL,
    penanggung_jawab VARCHAR(100) NOT NULL
);

-- Tabel Utama: Aset / Inventaris (Child Table dengan Foreign Key)
CREATE TABLE aset (
    id_aset INT AUTO_INCREMENT PRIMARY KEY,
    kode_aset VARCHAR(30) NOT NULL UNIQUE,
    nama_aset VARCHAR(100) NOT NULL,
    kondisi ENUM('Baik', 'Rusak Ringan', 'Rusak Berat') NOT NULL DEFAULT 'Baik',
    jumlah INT NOT NULL DEFAULT 1,
    tanggal_masuk DATE NOT NULL,
    id_ruangan INT NOT NULL,
    FOREIGN KEY (id_ruangan) REFERENCES ruangan(id_ruangan) 
        ON DELETE RESTRICT ON UPDATE CASCADE
);

-- Data Dummy Awal
INSERT INTO ruangan (kode_ruangan, nama_ruangan, penanggung_jawab) VALUES
('R-101', 'Kelas X IPA 1', 'Faiz Ghazali, S.Kom'),
('R-102', 'Lab Komputer 1', 'Wingko Prajna, S.Kom');

INSERT INTO aset (kode_aset, nama_aset, kondisi, jumlah, tanggal_masuk, id_ruangan) VALUES
('INV-001', 'Proyektor Epson EB-X400', 'Baik', 1, '2026-01-15', 1),
('INV-002', 'Kursi Siswa Kayu', 'Baik', 32, '2026-01-10', 1),
('INV-003', 'PC Desktop Core i5', 'Rusak Ringan', 20, '2026-02-01', 2);