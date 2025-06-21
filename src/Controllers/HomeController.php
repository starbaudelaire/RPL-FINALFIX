<?php

namespace Controllers;

class HomeController {

    public function index() {
        $jadwalModel = new \Models\Jadwal();
        $transaksiModel = new \Models\Transaksi();

        // Kirim semua data yang dibutuhkan oleh view 'home/index.php'
       // Panggil helper BARU untuk halaman publik
        public_view('home/index', [
            'jadwal_publik' => $jadwalModel->getUpcoming(3),
            'transaksi_publik' => $transaksiModel->getPublicSummary(10)
        ]);
    }
    public function showKeuanganPublik()
    {
        $transaksiModel = new \Models\Transaksi();

        // Tentukan bulan dan tahun yang aktif. Defaultnya bulan dan tahun sekarang.
        $selected_month = $_GET['bulan'] ?? date('m');
        $selected_year = $_GET['tahun'] ?? date('Y');

        // Ambil data transaksi sesuai bulan dan tahun yang dipilih
        $semua_transaksi = $transaksiModel->findByMonthYear($selected_month, $selected_year);

        // Hitung total pemasukan dan pengeluaran HANYA untuk bulan yang dipilih
        $total_pemasukan = 0;
        $total_pengeluaran = 0;
        foreach ($semua_transaksi as $transaksi) {
            if ($transaksi['jenis'] == 'pemasukan') {
                $total_pemasukan += $transaksi['jumlah'];
            } else {
                $total_pengeluaran += $transaksi['jumlah'];
            }
        }

        $saldo_akhir_bulan = $total_pemasukan - $total_pengeluaran;

        // Kirim semua data yang dibutuhkan ke view
        public_view('public/keuangan', [
            'semua_transaksi' => $semua_transaksi,
            'total_pemasukan' => $total_pemasukan,
            'total_pengeluaran' => $total_pengeluaran,
            'saldo_akhir_bulan' => $saldo_akhir_bulan,
            'selected_month' => $selected_month,
            'selected_year' => $selected_year,
        ]);
    }

    public function showJadwalPublik()
    {
        $jadwalModel = new \Models\Jadwal();

        // Tentukan bulan dan tahun yang aktif. Defaultnya bulan dan tahun sekarang.
        $selected_month = $_GET['bulan'] ?? date('m');
        $selected_year = $_GET['tahun'] ?? date('Y');

        // Ambil data jadwal sesuai bulan dan tahun yang dipilih
        $semua_jadwal = $jadwalModel->findByMonthYear($selected_month, $selected_year);

        // Kirim semua data yang dibutuhkan ke view
        public_view('public/jadwal', [
            'semua_jadwal' => $semua_jadwal,
            'selected_month' => $selected_month,
            'selected_year' => $selected_year,
        ]);
    }
}