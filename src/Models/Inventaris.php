<?php

namespace Models;

use Core\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';

    public function findAll()
    {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY nama_barang ASC")->fetchAll();
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function save($data)
    {
        // DIUBAH: Ditambahin foto_url
        $sql = "INSERT INTO {$this->table} (nama_barang, jumlah, kondisi, keterangan, tanggal_pengadaan, foto_url) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama_barang'],
            $data['jumlah'],
            $data['kondisi'],
            $data['keterangan'],
            $data['tanggal_pengadaan'],
            $data['foto_url'] ?? null
        ]);
    }

    public function update($data)
    {
        // DIUBAH: Ditambahin foto_url
        $sql = "UPDATE {$this->table} SET nama_barang = ?, jumlah = ?, kondisi = ?, keterangan = ?, tanggal_pengadaan = ?, foto_url = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama_barang'],
            $data['jumlah'],
            $data['kondisi'],
            $data['keterangan'],
            $data['tanggal_pengadaan'],
            $data['foto_url'] ?? null,
            $data['id']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}