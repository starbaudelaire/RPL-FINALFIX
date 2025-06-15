<?php

/**
 * Fungsi untuk membuat path URL yang dinamis.
 * @param string $path
 * @return string
 */
function base_url($path = '') {
    $publicPath = dirname($_SERVER['SCRIPT_NAME']);
    $publicPath = ($publicPath == '/' || $publicPath == '\\') ? '' : $publicPath;
    return rtrim($publicPath, '/') . '/' . ltrim($path, '/');
}

/**
 * Fungsi untuk mengarahkan (redirect) user ke URL lain.
 * @param string $path
 */
function redirect($path) {
    header('Location: ' . base_url($path));
    exit;
}

/**
 * Fungsi untuk memuat view utama (untuk admin panel).
 * @param string $viewName
 * @param array $data
 */
function view($viewName, $data = []) {
    extract($data);
    ob_start();
    require_once __DIR__ . "/Views/{$viewName}.php";
    $content = ob_get_clean();
    require_once __DIR__ . '/Views/layouts/app.php';
}

/**
 * Fungsi untuk memuat view publik (tanpa layout admin).
 * @param string $viewName
 * @param array $data
 */
function public_view($viewName, $data = []) {
    extract($data);
    require_once __DIR__ . "/Views/{$viewName}.php";
}

/**
 * Memeriksa apakah user sudah login.
 * @return bool
 */
function is_logged_in() {
    return isset($_SESSION['user']);
}

/**
 * Mengambil data user yang sedang login.
 * @return array|null
 */
function auth_user() {
    return $_SESSION['user'] ?? null;
}

/**
 * Memeriksa role user.
 */
function isAdmin() { return is_logged_in() && auth_user()['role'] === 'admin'; }
function isSekben() { return is_logged_in() && auth_user()['role'] === 'sekben'; }
function isRumahTangga() { return is_logged_in() && auth_user()['role'] === 'rumah_tangga'; }


/**
 * Fungsi otorisasi untuk membatasi akses berdasarkan role.
 * @param array $roles
 * @param string $message
 */
function authorize(array $roles, $message = 'Anda tidak memiliki izin untuk mengakses halaman ini.') {
    if (!is_logged_in() || !in_array(auth_user()['role'], $roles)) {
        http_response_code(403);
        view('errors/403', ['message' => $message]);
        die();
    }
}