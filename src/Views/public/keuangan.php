<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
    
    <div class="filter-wrapper">
        <h1 class="section-title" style="margin: 0;">Laporan Keuangan</h1>
        <form action="<?= base_url('laporan-keuangan') ?>" method="GET" class="filter-form">
            <select name="bulan" onchange="this.form.submit()">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?= $i ?>" <?= ($selected_month == $i) ? 'selected' : '' ?>>
                        <?= date('F', mktime(0, 0, 0, $i, 10)) ?>
                    </option>
                <?php endfor; ?>
            </select>
            <select name="tahun" onchange="this.form.submit()">
                <?php for ($i = date('Y'); $i >= 2020; $i--): ?>
                    <option value="<?= $i ?>" <?= ($selected_year == $i) ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </form>
    </div>

    <div class="summary-grid">
        <div class="summary-card">
            <div class="card-icon icon-pemasukan">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
            </div>
            <div class="card-content">
                <h3>Pemasukan</h3>
                <p class="amount pemasukan">Rp <?= number_format($total_pemasukan ?? 0, 0, ',', '.') ?></p>
            </div>
        </div>
        <div class="summary-card">
            <div class="card-icon icon-pengeluaran">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
            </div>
            <div class="card-content">
                <h3>Pengeluaran</h3>
                <p class="amount pengeluaran">Rp <?= number_format($total_pengeluaran ?? 0, 0, ',', '.') ?></p>
            </div>
        </div>
        <div class="summary-card">
            <div class="card-icon icon-saldo">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 12.58A10 10 0 1 1 12 2a10 10 0 0 1 8 10.58Z"></path><path d="M2 12h20"></path><path d="M12 2a15.3 15.3 0 0 1 4 10.5c0 1.94-1.56 3.5-3.5 3.5s-3.5-1.56-3.5-3.5S10.06 2 12 2Z"></path></svg>
            </div>
            <div class="card-content">
                <h3>Saldo Akhir</h3>
                <p class="amount saldo">Rp <?= number_format($saldo_akhir_bulan ?? 0, 0, ',', '.') ?></p>
            </div>
        </div>
    </div>

    <div class="table-container">
        <h2 style="margin-bottom: 20px;">
            Transaksi: <?= date('F', mktime(0, 0, 0, $selected_month, 10)) ?> <?= $selected_year ?>
        </h2>
        <?php if (!empty($semua_transaksi)): ?>
            <table class="public-table monthly-report">
                <thead>
                    <tr>
                        <th class="tanggal">Tanggal</th>
                        <th class="transaksi">Transaksi</th>
                        <th class="pemasukan">Pemasukan</th>
                        <th class="pengeluaran">Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $current_date = '';
                        foreach ($semua_transaksi as $transaksi): 
                        $day_name = strtoupper(date('l', strtotime($transaksi['tanggal'])));
                    ?>
                        <?php if ($transaksi['tanggal'] != $current_date): ?>
                            <tr class="day-separator">
                                <td colspan="4"><?= htmlspecialchars($day_name) ?></td>
                            </tr>
                            <?php $current_date = $transaksi['tanggal']; ?>
                        <?php endif; ?>
                        <tr>
                            <td class="tanggal"><?= date('Y-m-d', strtotime($transaksi['tanggal'])) ?></td>
                            <td class="transaksi"><?= htmlspecialchars($transaksi['deskripsi']) ?></td>
                            <td class="pemasukan">
                                <?= $transaksi['jenis'] == 'pemasukan' ? number_format($transaksi['jumlah'], 0, ',', '.') : '' ?>
                            </td>
                            <td class="pengeluaran">
                                <?= $transaksi['jenis'] == 'pengeluaran' ? number_format($transaksi['jumlah'], 0, ',', '.') : '' ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                 <tfoot>
                    <tr>
                        <th colspan="2">Total Pemasukan/Pengeluaran</th>
                        <th class="pemasukan"><?= number_format($total_pemasukan, 0, ',', '.') ?></th>
                        <th class="pengeluaran"><?= number_format($total_pengeluaran, 0, ',', '.') ?></th>
                    </tr>
                    <tr>
                        <th colspan="3">Saldo Akhir</th>
                        <th><?= number_format($saldo_akhir_bulan, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <p style="text-align: center;">Belum ada data untuk bulan dan tahun yang dipilih.</p>
        <?php endif; ?>
    </div>
</div>