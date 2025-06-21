<?php

namespace Controllers;

use Models\User;

class AuthController
{
    public function showLoginForm()
    {
        if (is_logged_in()) {
            redirect('dashboard');
        }
        public_view('auth/login');
    }

    public function login()
    {
        // DIUBAH: Sekarang nerima 'username', bukan 'email'
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = new User();
        // DIUBAH: Panggil fungsi findByUsername, bukan findByEmail
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['nama_lengkap'], // Disesuaikan dengan kolom di DB
                'username' => $user['username'],
                'role' => $user['role']
            ];
            redirect('dashboard');
        } else {
            $_SESSION['error_message'] = 'Username atau password salah.';
            redirect('login');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('login');
    }
}