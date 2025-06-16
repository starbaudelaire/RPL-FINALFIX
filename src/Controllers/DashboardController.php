<?php

namespace Controllers;

class DashboardController {

    public function index() {
        // DIUBAH: Panggil 'authorize' dengan cara baru yang lebih aman.
        // Kita kasih tau role apa aja yang boleh akses halaman dashboard.
        authorize(['admin', 'sekben', 'rumahtangga']);

        // Kode di bawah ini biarin aja, udah bener.
        $jadwalModel = new \Models\Jadwal();

        view('dashboard/index', [
            'jadwal_terdekat' => $jadwalModel->getUpcoming(5)
        ]);
    }
}