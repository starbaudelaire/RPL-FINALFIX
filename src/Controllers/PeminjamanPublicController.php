<?php

namespace Controllers;

class PeminjamanPublicController {

    public function create() {
        $inventarisModel = new \Models\Inventaris();
        
        view('peminjaman/create_public', [
            'semua_barang' => $inventarisModel->findAll()
        ]);
    }

    public function success() {
        view('peminjaman/sukses');
    }

   // ... (di dalam class PeminjamanPublicController) ...

public function store()
{
    // Gak perlu authorize, karena ini halaman publik
    
    $peminjamanModel = new \App\Models\Peminjaman();
    // Panggil method createRequest yang udah lu buat di model
    $peminjamanModel->createRequest($_POST);

    // Redirect ke halaman sukses
    header('Location: /RPL-FINALFIX/public/pinjam/sukses');
    exit;
}
}