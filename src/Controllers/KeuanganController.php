<?php

namespace Controllers;

class KeuanganController {

    public function index() {
        // DIUBAH: Panggil authorize dengan array role
        authorize(['admin', 'sekben']);
        
        $transaksiModel = new \Models\Transaksi();
        
        view('keuangan/index', [
            'semua_transaksi' => $transaksiModel->findAll()
        ]);
    }

    public function create() {
        authorize(['admin', 'sekben']);
        view('keuangan/create');
    }

    public function edit() {
        authorize(['admin', 'sekben']);
        $id = $_GET['id'];
        $transaksiModel = new \Models\Transaksi();
        $transaksi = $transaksiModel->findById($id);

        if ($transaksi) {
            view('keuangan/edit', ['transaksi' => $transaksi]);
        } else {
            // Tampilkan halaman 404 jika tidak ketemu
            view('errors/403', ['message' => 'Data transaksi tidak ditemukan.']);
            die();
        }
    }

    // Fungsi store, update, destroy yang sudah kita isi sebelumnya
    public function store() { 
        authorize(['admin', 'sekben']);
        $transaksiModel = new \Models\Transaksi();
        $transaksiModel->save($_POST);
        redirect('keuangan');
    }

    public function update() {
        authorize(['admin', 'sekben']);
        $transaksiModel = new \Models\Transaksi();
        $transaksiModel->update($_POST);
        redirect('keuangan');
    }

    public function destroy() { 
        authorize(['admin']); // Hanya admin yg bisa hapus
        $transaksiModel = new \Models\Transaksi();
        $transaksiModel->delete($_POST['id']);
        redirect('keuangan');
    }
}