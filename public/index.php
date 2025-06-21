<?php

session_start();

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/config.php';
require_once BASE_PATH . '/src/Core/bootstrap.php';

$router = new Core\Router();

// =======================================================
// === PENDAFTARAN SEMUA RUTE APLIKASI ===
// =======================================================

// --- RUTE HALAMAN PUBLIK ---
$router->get('/', ['controller' => 'HomeController', 'action' => 'index']);
$router->get('/laporan-keuangan', ['controller' => 'HomeController', 'action' => 'showKeuanganPublik']);
$router->get('/jadwal-kegiatan', ['controller' => 'HomeController', 'action' => 'showJadwalPublik']);

// Rute Peminjaman Publik
$router->get('/pinjam', ['controller' => 'PeminjamanPublicController', 'action' => 'create']);
$router->post('/pinjam', ['controller' => 'PeminjamanPublicController', 'action' => 'store']);
$router->get('/pinjam/sukses', ['controller' => 'PeminjamanPublicController', 'action' => 'success']);

// Rute Login & Logout
$router->get('/login', ['controller' => 'AuthController', 'action' => 'showLoginForm']);
$router->post('/login', ['controller' => 'AuthController', 'action' => 'login']);
$router->post('/logout', ['controller' => 'AuthController', 'action' => 'logout']);


// --- RUTE HALAMAN ADMIN (SETELAH LOGIN) ---
$router->get('/dashboard', ['controller' => 'DashboardController', 'action' => 'index']);

// Rute Keuangan (Admin)
$router->get('/keuangan', ['controller' => 'KeuanganController', 'action' => 'index']);
$router->get('/keuangan/tambah', ['controller' => 'KeuanganController', 'action' => 'create']);
$router->get('/keuangan/edit', ['controller' => 'KeuanganController', 'action' => 'edit']);
$router->post('/keuangan/simpan', ['controller' => 'KeuanganController', 'action' => 'store']);
$router->post('/keuangan/update', ['controller' => 'KeuanganController', 'action' => 'update']);
$router->post('/keuangan/hapus', ['controller' => 'KeuanganController', 'action' => 'destroy']);

// Rute Inventaris (Admin)
$router->get('/inventaris', ['controller' => 'InventarisController', 'action' => 'index']);
$router->get('/inventaris/tambah', ['controller' => 'InventarisController', 'action' => 'create']);
$router->get('/inventaris/edit', ['controller' => 'InventarisController', 'action' => 'edit']);
$router->post('/inventaris/simpan', ['controller' => 'InventarisController', 'action' => 'store']);
$router->post('/inventaris/update', ['controller' => 'InventarisController', 'action' => 'update']);
$router->post('/inventaris/hapus', ['controller' => 'InventarisController', 'action' => 'destroy']);

// Rute Jadwal Kajian (Admin)
$router->get('/jadwal', ['controller' => 'JadwalController', 'action' => 'index']);
$router->get('/jadwal/tambah', ['controller' => 'JadwalController', 'action' => 'create']);
$router->get('/jadwal/edit', ['controller' => 'JadwalController', 'action' => 'edit']);
$router->post('/jadwal/simpan', ['controller' => 'JadwalController', 'action' => 'store']);
$router->post('/jadwal/update', ['controller' => 'JadwalController', 'action' => 'update']);
$router->post('/jadwal/hapus', ['controller' => 'JadwalController', 'action' => 'destroy']);

// Rute Manajemen Peminjaman (Admin)
$router->get('/admin/peminjaman', ['controller' => 'PeminjamanAdminController', 'action' => 'index']);
$router->post('/admin/peminjaman/update-status', ['controller' => 'PeminjamanAdminController', 'action' => 'updateStatus']);


// =======================================================
// === LOGIKA DISPATCHER (JANGAN DIUBAH) ===
// =======================================================
$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri)['path'];

// Dapatkan path ke direktori public secara dinamis (contoh: /RPL-FINALFIX/public)
$publicPath = dirname($_SERVER['SCRIPT_NAME']);
$publicPath = ($publicPath == '/' || $publicPath == '\\') ? '' : $publicPath;

// Dapatkan URI bersih (contoh: /login)
$uri = str_replace($publicPath, '', $requestPath);

// Jika URI kosong (untuk halaman home), default-kan ke '/'
if (empty($uri)) {
    $uri = '/';
}

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Panggil dispatch dengan URI dan Method yang benar (TANPA 'trim')
$router->dispatch($uri, $method);