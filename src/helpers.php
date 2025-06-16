<?php

// Fungsi-fungsi dasar (base_url, redirect, view, public_view) biarin aja, udah bener.

function base_url($path = '') {
    $publicPath = dirname($_SERVER['SCRIPT_NAME']);
    $publicPath = ($publicPath == '/' || $publicPath == '\\') ? '' : $publicPath;
    return rtrim($publicPath, '/') . '/' . ltrim($path, '/');
}

function redirect($path) {
    header('Location: ' . base_url($path));
    exit;
}

function view($viewName, $data = []) {
    extract($data);
    ob_start();
    // Path diubah ke BASE_PATH biar konsisten
    require_once BASE_PATH . "/src/Views/{$viewName}.php";
    $content = ob_get_clean();
    require_once BASE_PATH . '/src/Views/layouts/app.php';
}

function public_view($viewName, $data = []) {
    extract($data);
    require_once BASE_PATH . "/src/Views/{$viewName}.php";
}

// Fungsi-fungsi otentikasi (is_logged_in, auth_user, roles) juga udah bener.

function is_logged_in() {
    return isset($_SESSION['user']);
}

function auth_user() {
    return $_SESSION['user'] ?? null;
}

function isAdmin() { return is_logged_in() && auth_user()['role'] === 'admin'; }
function isSekben() { return is_logged_in() && auth_user()['role'] === 'sekben'; }
function isRumahTangga() { return is_logged_in() && auth_user()['role'] === 'rumahtangga'; }


/**
 * ===================================================================
 * INI BAGIAN YANG DIPERBAIKI
 * ===================================================================
 * Fungsi otorisasi untuk membatasi akses berdasarkan role.
 */
function authorize(array $roles, $message = 'Anda tidak memiliki izin untuk mengakses halaman ini.') {
    if (!is_logged_in() || !in_array(auth_user()['role'], $roles)) {
        http_response_code(403);
        
        // DIUBAH: Jangan pake view(), panggil file error-nya langsung!
        // Ini akan nampilin halaman 403 polosan tanpa layout admin.
        extract(['message' => $message]);
        require_once BASE_PATH . "/src/Views/errors/403.php";
        
        // Hentikan eksekusi script di sini.
        die();
    }
}