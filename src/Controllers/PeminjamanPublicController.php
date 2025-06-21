<?php

namespace Controllers;

// Kita panggil class yang mau dipake di sini biar rapi
use Models\Inventaris;
use Models\Peminjaman;

class PeminjamanPublicController {

    /**
     * Menampilkan form peminjaman publik.
     */
    public function create() {
        $inventarisModel = new Inventaris();
        
        // DIUBAH: Pake 'public_view' biar gak kebawa layout admin
        public_view('peminjaman/create_public', [
            'semua_barang' => $inventarisModel->findAll()
        ]);
    }

    /**
     * Menampilkan halaman sukses setelah submit form.
     */
    public function success() {
        // DIUBAH: Pake 'public_view' juga di sini
        public_view('peminjaman/sukses');
    }

    /**
     * Memproses data dari form peminjaman.
     */
    public function store() {
        // DIUBAH: Panggil class Peminjaman dengan benar (tanpa 'App')
        $peminjamanModel = new Peminjaman();

        // Ambil ID barang-barang yang dipilih dari form
        $itemIds = $_POST['barang_ids'] ?? [];
        
        // Validasi simpel: kalo gak ada barang yg dipilih, balikin ke form
        if (empty($itemIds)) {
            // Bisa ditambahin pesan error nanti
            redirect('pinjam');
        }

        // DIUBAH: Kirim data form dan ID barang ke model
        $isSuccess = $peminjamanModel->createRequest($_POST, $itemIds);

        if ($isSuccess) {
            redirect('pinjam/sukses');
        } else {
            // Nanti bisa ditambahin pesan error kalo gagal simpan
            redirect('pinjam');
        }
    }
}