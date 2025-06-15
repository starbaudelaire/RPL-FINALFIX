<?php

namespace Controllers;

class KeuanganController {

    public function index() {
        authorize(isAdmin() || isSekben());
        $transaksiModel = new \Models\Transaksi();
        
        view('keuangan/index', [
            'semua_transaksi' => $transaksiModel->findAll()
        ]);
    }

    public function create() {
        authorize(isAdmin() || isSekben());
        view('keuangan/create');
    }

    public function edit() {
        authorize(isAdmin() || isSekben());
        $id = $_GET['id'];
        $transaksiModel = new \Models\Transaksi();
        $transaksi = $transaksiModel->findById($id);

        if ($transaksi) {
            view('keuangan/edit', ['transaksi' => $transaksi]);
        } else {
            authorize(false, 404); // Tampilkan halaman 404 jika tidak ketemu
        }
    }

    // ... (di dalam class KeuanganController) ...

public function store()
{
    // Otorisasi: admin dan sekben boleh nambah
    authorize(['admin', 'sekben']);
    
    $transaksiModel = new \App\Models\Transaksi();
    $transaksiModel->save($_POST);
    
    header('Location: /RPL-FINALFIX/public/keuangan');
    exit;
}

public function update()
{
    // Otorisasi: admin dan sekben boleh ngedit
    authorize(['admin', 'sekben']);
    
    $id = $_POST['id'];
    $transaksiModel = new \App\Models\Transaksi();
    $transaksiModel->update($id, $_POST);
    
    header('Location: /RPL-FINALFIX/public/keuangan');
    exit;
}

public function destroy()
{
    // Otorisasi: cuma admin yang boleh hapus
    authorize(['admin']);
    
    $id = $_POST['id'];
    $transaksiModel = new \App\Models\Transaksi();
    $transaksiModel->delete($id);
    
    header('Location: /RPL-FINALFIX/public/keuangan');
    exit;
}
}