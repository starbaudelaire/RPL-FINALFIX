<div class="table-wrapper">
    <div class="table-header">
        <h1>Daftar Inventaris Masjid</h1>
        <a href="<?= base_url('inventaris/tambah') ?>" class="btn btn-tambah">Tambah Inventaris Baru</a>
    </div>

    <?php if (!empty($semua_inventaris)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Tanggal Pengadaan</th>
                    <th>Keterangan</th>
                    <th style="width: 15%; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($semua_inventaris as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nama_barang']) ?></td>
                        <td><?= htmlspecialchars($item['jumlah']) ?></td>
                        <td><?= htmlspecialchars($item['kondisi']) ?></td>
                        <td><?= htmlspecialchars(date('d M Y', strtotime($item['tanggal_pengadaan']))) ?></td>
                        <td><?= htmlspecialchars($item['keterangan']) ?></td>
                        <td class="actions-cell">
                            <a href="<?= base_url('inventaris/edit?id=' . $item['id']) ?>" class="btn btn-edit">Edit</a>
                            <?php if (isAdmin()): ?>
                            <form action="<?= base_url('inventaris/hapus') ?>" method="POST" onsubmit="return confirm('Yakin hapus item ini?');">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Belum ada data inventaris.</p>
    <?php endif; ?>
</div>

<style>
.table-wrapper { padding: 20px; }
.table-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
.table-header h1 { margin: 0; font-size: 24px; }
table { width: 100%; border-collapse: collapse; }
th, td { border: 1px solid #ddd; padding: 12px; text-align: left; vertical-align: middle; }
th { background-color: #f8f9fa; }
.btn, button.btn-hapus { text-decoration: none; padding: 8px 15px; border-radius: 5px; color: white; display: inline-block; border: none; cursor: pointer; font-size: 14px; white-space: nowrap; }
.btn-tambah { background-color: #28a745; }
.btn-edit { background-color: #ffc107; color: #333; }
.btn-hapus { background-color: #dc3545; }
.actions-cell { text-align: center; }
.actions-cell form { display: inline-block; margin-left: 5px; }
</style>