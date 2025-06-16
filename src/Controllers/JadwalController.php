<?php

namespace Controllers;

class JadwalController {
    
    // Fungsi checkAuth diubah biar manggil authorize dengan cara yg benar
    private function checkAuth() {
        // DIUBAH: Panggil authorize dengan array role
        authorize(['admin', 'sekben', 'rumahtangga']);
    }

    public function index() {
        $this->checkAuth();
        $jadwalModel = new \Models\Jadwal();

        view('jadwal/index', [
            'semua_jadwal' => $jadwalModel->findAll()
        ]);
    }

    public function create() {
        $this->checkAuth();
        view('jadwal/create');
    }

    public function edit() {
        $this->checkAuth();
        $id = $_GET['id'];
        $jadwalModel = new \Models\Jadwal();
        $jadwal = $jadwalModel->findById($id);

        if ($jadwal) {
            view('jadwal/edit', ['jadwal' => $jadwal]);
        } else {
            view('errors/403', ['message' => 'Data jadwal tidak ditemukan.']);
            die();
        }
    }

    // Fungsi store, update, destroy yg sudah kita isi sebelumnya
    public function store() { 
        $this->checkAuth();
        $jadwalModel = new \Models\Jadwal();
        $jadwalModel->save($_POST);
        redirect('jadwal');
    }

    public function update() { 
        $this->checkAuth();
        $jadwalModel = new \Models\Jadwal();
        $jadwalModel->update($_POST);
        redirect('jadwal');
    }

    public function destroy() { 
        // Hanya admin yg boleh hapus
        authorize(['admin']);
        $jadwalModel = new \Models\Jadwal();
        $jadwalModel->delete($_POST['id']);
        redirect('jadwal');
    }
}