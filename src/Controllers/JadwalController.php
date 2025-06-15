<?php

namespace Controllers;

class JadwalController {
    
    private function checkAuth() {
        authorize(isAdmin() || isSekben() || isRumahTangga());
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
            authorize(false, 404);
        }
    }

   // ... (di dalam class JadwalController) ...

public function store()
{
    authorize(['admin', 'sekben']);
    
    $jadwalModel = new \App\Models\Jadwal();
    $jadwalModel->save($_POST);

    header('Location: /RPL-FINALFIX/public/jadwal');
    exit;
}

public function update()
{
    authorize(['admin', 'sekben']);

    $id = $_POST['id'];
    $jadwalModel = new \App\Models\Jadwal();
    $jadwalModel->update($id, $_POST);

    header('Location: /RPL-FINALFIX/public/jadwal');
    exit;
}

public function destroy()
{
    authorize(['admin', 'sekben']);

    $id = $_POST['id'];
    $jadwalModel = new \App\Models\Jadwal();
    $jadwalModel->delete($id);

    header('Location: /RPL-FINALFIX/public/jadwal');
    exit;
}
}