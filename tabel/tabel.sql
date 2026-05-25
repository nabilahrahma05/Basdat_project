-- Active: 1733899143681@@localhost@3307@peminjaman_db
USE peminjaman_db;
CREATE TABLE daftar_ruangan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Kode_Ruangan VARCHAR(7) UNIQUE NOT NULL,
    Tipe VARCHAR(30) NOT NULL,
    Fasilitas VARCHAR(100) NOT NULL
);
CREATE TABLE daftar_properti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Properti VARCHAR(30) UNIQUE NOT NULL,
    Jumlah INT NOT NULL
);

CREATE TABLE Form_Peminjaman (
id INT AUTO_INCREMENT PRIMARY KEY,
NIM INT NOT NULL,
Nama_Lengkap VARCHAR(50) NOT NULL,
No_Telp VARCHAR(13) NOT NULL,
Kelas VARCHAR(10) NOT NULL,
Tanggal_Peminjaman DATE NOT NULL,
Kode_Ruangan VARCHAR(6) NOT NULL,
Kegiatan VARCHAR(255) NOT NULL,
Dosen_Pengampu VARCHAR(55) NOT NULL,
Waktu_mulai TIME NOT NULL,
Waktu_selesai TIME NOT NULL,
CHECK (Waktu_selesai > Waktu_mulai),
FOREIGN KEY (Kode_Ruangan) REFERENCES daftar_ruangan(Kode_Ruangan)
);
DROP TABLE form_peminjaman;
DROP TRIGGER update_id_after_delete;
DELIMITER $$
CREATE TRIGGER update_id_after_delete
AFTER DELETE ON daftar_ruangan
FOR EACH ROW
BEGIN
    SET @num := 0;
    UPDATE daftar_ruangan
    SET id = (SELECT @num := @num + 1)
    ORDER BY Kode_Ruangan ASC;
END$$
DELIMITER ;
