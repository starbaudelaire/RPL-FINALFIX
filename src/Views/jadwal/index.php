<div class="table-wrapper">
    <div class="table-header">
        <h1>Jadwal Kajian Masjid</h1>
        <a href="<?= base_url('jadwal/tambah') ?>" class="btn btn-tambah">Tambah Jadwal Baru</a>
    </div>

    <?php if (!empty($semua_jadwal)): ?>
        <table>
            <thead>
                <tr>
                    <th>Judul Kajian</th>
                    <th>Penceramah</th>
                    <th>Waktu & Tanggal</th>
                    <th style="width: 15%; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($semua_jadwal as $jadwal): ?>
                    <tr>
                        <td><?= htmlspecialchars($jadwal['judul_kajian']) ?></td>
                        <td>Ust. <?= htmlspecialchars($jadwal['penceramah']) ?></td>
                        <td><?= htmlspecialchars(date('l, d M Y, H:i', strtotime($jadwal['waktu_kajian']))) ?> WIB</td>
                        <td class="actions-cell">
                            <a href="<?= base_url('jadwal/edit?id=' . $jadwal['id']) ?>" class="btn btn-edit">Edit</a>
                            <?php if (isAdmin()): ?>
                                <form action="<?= base_url('jadwal/hapus') ?>" method="POST" onsubmit="return confirm('Yakin hapus jadwal ini?');">
                                    <input type="hidden" name="id" value="<?= $jadwal['id'] ?>">
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">Belum ada data jadwal kajian.</p>
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