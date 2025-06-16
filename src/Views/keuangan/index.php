<div class="table-wrapper">
    <div class="table-header">
        <h1>Laporan Keuangan Masjid</h1>
        <a href="<?= base_url('keuangan/tambah') ?>" class="btn btn-tambah">Tambah Transaksi Baru</a>
    </div>

    <?php if (!empty($semua_transaksi)): ?>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Jenis</th>
                    <th style="text-align: right;">Jumlah (Rp)</th>
                    <th style="width: 15%; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($semua_transaksi as $transaksi): ?>
                    <tr>
                        <td><?= htmlspecialchars(date('d M Y', strtotime($transaksi['tanggal']))) ?></td>
                        <td><?= htmlspecialchars($transaksi['deskripsi']) ?></td>
                        <td class="jenis-<?= htmlspecialchars($transaksi['jenis']) ?>">
                            <?= htmlspecialchars(ucfirst($transaksi['jenis'])) ?>
                        </td>
                        <td style="text-align: right;">
                            <?= number_format($transaksi['jumlah'], 0, ',', '.') ?>
                        </td>
                        <td class="actions-cell">
                            <a href="<?= base_url('keuangan/edit?id=' . $transaksi['id']) ?>" class="btn btn-edit">Edit</a>
                            <?php if (isAdmin()): ?>
                                <form action="<?= base_url('keuangan/hapus') ?>" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?');">
                                    <input type="hidden" name="id" value="<?= $transaksi['id'] ?>">
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Belum ada data transaksi.</p>
    <?php endif; ?>
</div>

<style>
.table-wrapper { padding: 20px; }
.table-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
.table-header h1 { margin: 0; font-size: 24px; }
table { width: 100%; border-collapse: collapse; }
th, td { border: 1px solid #ddd; padding: 12px; text-align: left; vertical-align: middle; }
th { background-color: #f8f9fa; }
.btn, button.btn-hapus { text-decoration: none; padding: 8px 15px; border-radius: 5px; color: white; display: inline-block; border: none; cursor: pointer; font-size: 14px; }
.btn-tambah { background-color: #28a745; }
.btn-edit { background-color: #ffc107; color: #333; }
.btn-hapus { background-color: #dc3545; }
.actions-cell { text-align: center; }
.actions-cell form { display: inline-block; margin-left: 5px; }
.jenis-pemasukan { color: #28a745; font-weight: bold; }
.jenis-pengeluaran { color: #dc3545; font-weight: bold; }
</style>