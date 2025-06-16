<?php

namespace Controllers;

use Models\User;

class AuthController {

    /**
     * Menampilkan halaman form login.
     */
    public function showLoginForm() {
        // DIUBAH: Gunakan 'public_view' untuk halaman publik seperti login,
        // supaya tidak dibungkus dengan layout admin.
        public_view('auth/login');
    }

    /**
     * Memproses data login dari form.
     */
    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new \Models\User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'role' => $user['role']
            ];
            
            // Redirect ke dashboard setelah login
            redirect('dashboard');
        } else {
            // Nanti bisa tambahin flash message error di sini
            redirect('login');
        }
    }

    /**
     * Proses logout user.
     */
    public function logout() {
        session_destroy();
        redirect('login');
    }
}