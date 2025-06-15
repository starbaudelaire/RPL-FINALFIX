<?php

namespace Controllers;

class PeminjamanAdminController {

    public function index() {
        authorize(isAdmin() || isRumahTangga());
        $peminjamanModel = new \Models\Peminjaman();

        view('admin/peminjaman/index', [
            'requests' => $peminjamanModel->getAllWithDetails()
        ]);
    }

    // ... (di dalam class PeminjamanAdminController) ...

public function updateStatus()
{
    // Otorisasi: cuma admin dan rumah tangga yang boleh ubah status
    authorize(['admin', 'rumah_tangga']);

    $id = $_POST['request_id'];
    $status = $_POST['status'];

    $peminjamanModel = new \App\Models\Peminjaman();
    // Panggil method updateRequestStatus yang ada di model
    $peminjamanModel->updateRequestStatus($id, $status);

    // Redirect balik ke halaman manajemen peminjaman
    header('Location: /RPL-FINALFIX/public/admin/peminjaman');
    exit;
}
}