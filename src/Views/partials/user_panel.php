<?php if (is_logged_in()): ?>

    <div class="user-panel">
    
        <div class="header-left">
            <button id="sidebar-toggle" title="Toggle Sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
            <div class="user-welcome">
                Selamat datang, <b><?= htmlspecialchars(auth_user()['name']) ?></b>
                <span class="role-badge">Role: <?= ucfirst(htmlspecialchars(auth_user()['role'])) ?></span>
            </div>
        </div>

        <div class="header-right">
            <form action="<?= base_url('logout') ?>" method="POST" style="margin: 0;">
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>

    </div>

<?php endif; ?>