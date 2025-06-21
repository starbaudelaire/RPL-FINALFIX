<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
    
    <div class="filter-wrapper">
        <h1 class="section-title" style="margin: 0;">Jadwal Kegiatan</h1>
        <form action="<?= base_url('jadwal-kegiatan') ?>" method="GET" class="filter-form">
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

    <div class="event-card-list" style="margin-top: 40px;">
        <?php if (!empty($semua_jadwal)): ?>
            <?php foreach ($semua_jadwal as $jadwal): ?>
                
                <div class="event-card">
                    <div class="date-info">
                        <span class="event-tag">Kajian Rutin</span>
                        <p class="day"><?= date('l, d M Y', strtotime($jadwal['waktu_kajian'])) ?></p>
                        <p class="time"><?= date('H:i', strtotime($jadwal['waktu_kajian'])) ?> WIB</p>
                    </div>

                    <div class="event-details">
                        <h3>Materi</h3>
                        <h2 class="title"><?= htmlspecialchars($jadwal['judul_kajian']) ?></h2>
                        
                        <div class="personnel">
                            <div class="personnel-item">
                                <h4>Penceramah</h4>
                                <p>Ust. <?= htmlspecialchars($jadwal['penceramah']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <div class="section" style="text-align: center; background-color: white; padding: 20px; border-radius: 12px; border: 1px solid var(--border-color);">
                <p>Belum ada jadwal kegiatan untuk bulan dan tahun yang dipilih.</p>
            </div>
        <?php endif; ?>
    </div>
</div>