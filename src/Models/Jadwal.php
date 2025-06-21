<?php

namespace Models;

use Core\Model;
use PDOException;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    /**
     * Menyimpan data jadwal baru ke database.
     */
    public function save($data)
    {
        $sql = "INSERT INTO {$this->table} (judul_kajian, penceramah, waktu_kajian) VALUES (?, ?, ?)";
        
        try {
            $stmt = $this->db->prepare($sql);
            
            // DIUBAH: Jangan pake array_values($data) karena tidak aman.
            // Kita ambil data secara eksplisit untuk memastikan urutan dan jumlahnya pas 3.
            $values = [
                $data['judul_kajian'],
                $data['penceramah'],
                $data['waktu_kajian']
            ];

            return $stmt->execute($values);

        } catch (PDOException $e) {
            // Kita kasih pesan error yang lebih jelas
            die("Error di Jadwal->save(): " . $e->getMessage());
        }
    }

    /**
     * Mengupdate data jadwal yang sudah ada.
     */
    public function update($data)
    {
        $sql = "UPDATE {$this->table} SET judul_kajian = ?, penceramah = ?, waktu_kajian = ? WHERE id = ?";
        
        try {
            $stmt = $this->db->prepare($sql);

            // DIUBAH: Ambil data secara eksplisit juga untuk update.
            // Pastikan urutan dan jumlahnya pas 4.
            $values = [
                $data['judul_kajian'],
                $data['penceramah'],
                $data['waktu_kajian'],
                $data['id'] // Pastikan 'id' juga dikirim dari form edit.
            ];

            return $stmt->execute($values);
        } catch (PDOException $e) {
            die("Error di Jadwal->update(): " . $e->getMessage());
        }
    }

    // Fungsi lainnya (findAll, findById, delete, getUpcoming) tidak perlu diubah.
    
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY waktu_kajian DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getUpcoming($limit = 3)
    {
        $limit = (int) $limit;
        $sql = "SELECT * FROM {$this->table} WHERE waktu_kajian >= NOW() ORDER BY waktu_kajian ASC LIMIT $limit";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
    /**
     * Mengambil semua data jadwal berdasarkan bulan dan tahun.
     */
    public function findByMonthYear($month, $year) {
        try {
            // Query untuk memfilter berdasarkan bulan (MONTH) dan tahun (YEAR) dari kolom waktu_kajian
            $query = "SELECT * FROM {$this->table} WHERE MONTH(waktu_kajian) = :month AND YEAR(waktu_kajian) = :year ORDER BY waktu_kajian ASC, id ASC";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute([':month' => $month, ':year' => $year]);
            
            return $stmt->fetchAll();

        } catch (\PDOException $e) {
            die("Query Error di Jadwal->findByMonthYear(): " . $e->getMessage());
        }
    }
}