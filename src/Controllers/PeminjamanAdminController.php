<?php

namespace Controllers;

class PeminjamanAdminController {

    public function index() {
        // DIUBAH: Panggil authorize dengan array role
        authorize(['admin', 'rumahtangga']);

        $peminjamanModel = new \Models\Peminjaman();

        view('admin/peminjaman/index', [
            'requests' => $peminjamanModel->getAllWithDetails()
        ]);
    }

    // Fungsi updateStatus yang sudah kita isi sebelumnya
    public function updateStatus() {
        authorize(['admin', 'rumahtangga']);
        
        $peminjamanModel = new \Models\Peminjaman();
        $peminjamanModel->updateStatus($_POST['request_id'], $_POST['status']);

        redirect('admin/peminjaman');
    }
}