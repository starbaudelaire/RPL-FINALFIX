<div class="table-wrapper">
    <div class="table-header">
        <h1>Manajemen Peminjaman Barang</h1>
    </div>

    <?php if (!empty($requests)): ?>
        <table>
            <thead>
                <tr>
                    <th>Tgl Request</th>
                    <th>Peminjam & Instansi</th>
                    <th>Kontak WA</th>
                    <th>Barang Dipinjam</th>
                    <th>Keperluan</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $req): ?>
                    <tr>
                        <td><?= date('d M Y', strtotime($req['created_at'])) ?></td>
                        <td>
                            <b><?= htmlspecialchars($req['nama_peminjam']) ?></b><br>
                            <small><?= htmlspecialchars($req['instansi']) ?></small>
                        </td>
                        <td><a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $req['wa_peminjam']) ?>" target="_blank"><?= htmlspecialchars($req['wa_peminjam']) ?></a></td>
                        <td><?= htmlspecialchars($req['daftar_barang'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($req['keperluan']) ?></td>
                        <td style="text-align: center;">
                            <span class="status-badge status-<?= strtolower(htmlspecialchars($req['status'])) ?>">
                                <?= htmlspecialchars($req['status']) ?>
                            </span>
                        </td>
                        <td class="actions-cell">
                            <?php if ($req['status'] == 'Pending'): ?>
                                <form action="<?= base_url('admin/peminjaman/update-status') ?>" method="POST"><input type="hidden" name="request_id" value="<?= $req['id'] ?>"><input type="hidden" name="status" value="Disetujui"><button type="submit" class="btn btn-setujui">Setujui</button></form>
                                <form action="<?= base_url('admin/peminjaman/update-status') ?>" method="POST"><input type="hidden" name="request_id" value="<?= $req['id'] ?>"><input type="hidden" name="status" value="Ditolak"><button type="submit" class="btn btn-tolak">Tolak</button></form>
                            <?php elseif ($req['status'] == 'Disetujui'): ?>
                                <form action="<?= base_url('admin/peminjaman/update-status') ?>" method="POST"><input type="hidden" name="request_id" value="<?= $req['id'] ?>"><input type="hidden" name="status" value="Selesai"><button type="submit" class="btn btn-selesai">Selesaikan</button></form>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align:center;">Belum ada permintaan peminjaman.</p>
    <?php endif; ?>
</div>

<style>
.table-wrapper { padding: 20px; overflow-x: auto; }
.table-header { margin-bottom: 20px; }
.table-header h1 { margin: 0; font-size: 24px; }
table { width: 100%; border-collapse: collapse; }
th, td { border: 1px solid #ddd; padding: 12px; text-align: left; vertical-align: middle; white-space: nowrap; }
td:nth-child(4), td:nth-child(5) { white-space: normal; }
th { background-color: #f8f9fa; }
button { padding: 6px 12px; border-radius: 5px; color: white; border: none; cursor: pointer; font-size: 14px; }
.btn-setujui { background-color: #28a745; }
.btn-tolak { background-color: #dc3545; }
.btn-selesai { background-color: #007bff; }
.actions-cell { text-align: center; }
.actions-cell form { display: inline-block; margin: 0 2px; }
.status-badge { padding: 5px 10px; border-radius: 15px; color: white; font-weight: bold; text-align: center; display: inline-block; font-size: 12px; }
.status-pending { background-color: #ffc107; color: #333; }
.status-disetujui { background-color: #28a745; }
.status-ditolak { background-color: #dc3545; }
.status-selesai { background-color: #6c757d; }
</style>