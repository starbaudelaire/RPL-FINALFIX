<?php

namespace Controllers;

// Gak perlu 'use' karena kita panggil modelnya pake namespace lengkap (\Models\Inventaris)

class InventarisController {

    /**
     * Menampilkan halaman daftar inventaris.
     */
    public function index() {
        // Otorisasi: Hanya admin dan rumah_tangga yang boleh akses.
        // Ini cara penulisan yang benar.
        authorize(['admin', 'rumah_tangga']);

        $inventarisModel = new \Models\Inventaris();

        view('inventaris/index', [
            'semua_inventaris' => $inventarisModel->findAll()
        ]);
    }

    /**
     * Menampilkan form untuk membuat data inventaris baru.
     */
    public function create() {
        authorize(['admin', 'rumah_tangga']);
        view('inventaris/create');
    }

    /**
     * Menampilkan form untuk mengedit data inventaris.
     */
    public function edit() {
        authorize(['admin', 'rumah_tangga']);
        $id = $_GET['id'];
        $inventarisModel = new \Models\Inventaris();
        $item = $inventarisModel->findById($id);

        if ($item) {
            view('inventaris/edit', ['item' => $item]);
        } else {
            // Tampilkan halaman not found jika item tidak ada
            // (Untuk sementara, kita arahkan ke error 403 bawaan)
            view('errors/403', ['message' => 'Data inventaris dengan ID tersebut tidak ditemukan.']);
            die();
        }
    }

    /**
     * Menyimpan data inventaris baru dari form.
     */
    public function store() {
        authorize(['admin', 'rumah_tangga']);

        $inventarisModel = new \Models\Inventaris();
        $inventarisModel->save($_POST);

        // Redirect balik ke halaman daftar
        header('Location: /RPL-FINALFIX/public/inventaris');
        exit;
    }

    /**
     * Mengupdate data inventaris dari form edit.
     */
    public function update() {
        authorize(['admin', 'rumah_tangga']);
        
        $id = $_POST['id'];
        $inventarisModel = new \Models\Inventaris();
        $inventarisModel->update($id, $_POST);

        // Redirect balik ke halaman daftar
        header('Location: /RPL-FINALFIX/public/inventaris');
        exit;
    }

    /**
     * Menghapus data inventaris.
     */
    public function destroy() {
        authorize(['admin', 'rumah_tangga']);
        
        $id = $_POST['id'];
        $inventarisModel = new \Models\Inventaris();
        $inventarisModel->delete($id);

        // Redirect balik ke halaman daftar
        header('Location: /RPL-FINALFIX/public/inventaris');
        exit;
    }
}