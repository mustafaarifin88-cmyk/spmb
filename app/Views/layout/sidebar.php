<style>
    .layout-menu {
        background: rgba(15, 23, 42, 0.85) !important;
        backdrop-filter: blur(20px) !important;
        -webkit-backdrop-filter: blur(20px) !important;
        border-right: 1px solid rgba(255, 255, 255, 0.08) !important;
        box-shadow: 4px 0 24px rgba(0, 0, 0, 0.15) !important;
    }
    .layout-menu .menu-link {
        color: #cbd5e1 !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 0.5rem;
        margin: 0.2rem 0.8rem;
    }
    .layout-menu .menu-icon {
        color: #94a3b8 !important;
        transition: all 0.3s ease;
    }
    .layout-menu .menu-item:not(.active) > .menu-link:hover {
        background: rgba(255, 255, 255, 0.08) !important;
        color: #ffffff !important;
        transform: translateX(6px);
    }
    .layout-menu .menu-item:not(.active) > .menu-link:hover .menu-icon {
        color: #ffffff !important;
        transform: scale(1.1);
    }
    .layout-menu .menu-item.active > .menu-link {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%) !important;
        color: #ffffff !important;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4) !important;
        border-radius: 0.5rem;
    }
    .layout-menu .menu-item.active > .menu-link .menu-icon {
        color: #ffffff !important;
    }
    .layout-menu .menu-header-text {
        color: #64748b !important;
        letter-spacing: 1px;
    }
    .layout-menu .app-brand-text {
        color: #ffffff !important;
        text-shadow: 0 2px 10px rgba(255,255,255,0.2);
    }
    .sidebar-profile-box {
        background: rgba(0, 0, 0, 0.2);
        margin: 0 1rem;
        padding: 1rem 0;
        border-radius: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
    .layout-menu .user-profile h6 {
        color: #ffffff !important;
        letter-spacing: 0.5px;
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-3 mb-2">
        <a href="<?= base_url() ?>" class="app-brand-link">
            <i class='bx bxs-school fs-2' style="color: #a855f7;"></i>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">SPMB</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle text-white"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    
    <div class="user-profile text-center mt-3 mb-4 sidebar-profile-box">
        <div class="position-relative d-inline-block">
            <img src="<?= base_url('uploads/profil/' . session()->get('foto_profil')) ?>" alt="Foto Profil" class="rounded-circle mb-2 shadow-lg" style="width: 80px; height: 80px; object-fit: cover; border: 3px solid #6366f1; padding: 2px;">
            <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-light rounded-circle" style="transform: translate(-10px, -15px);"></span>
        </div>
        <h6 class="mb-0 fw-bold"><?= session()->get('nama_lengkap') ?></h6>
        <small class="badge bg-label-info text-uppercase mt-2 shadow-sm" style="font-size: 0.7rem;"><i class='bx bx-check-shield me-1'></i><?= session()->get('level') ?></small>
    </div>

    <ul class="menu-inner py-1">
        <?php if(session()->get('level') == 'admin'): ?>
            <li class="menu-item <?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/dashboard') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-home-circle"></i><div data-i18n="Dashboard">Dashboard</div></a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Master Data</span></li>
            <li class="menu-item <?= uri_string() == 'admin/adminuser' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/adminuser') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-user"></i><div data-i18n="User Admin">User Admin</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/agama' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/agama') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-book"></i><div data-i18n="Agama">Agama</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/pekerjaan' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/pekerjaan') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-briefcase"></i><div data-i18n="Pekerjaan">Pekerjaan</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/persyaratan' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/persyaratan') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-file"></i><div data-i18n="Persyaratan">Upload Online</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/berkasfisik' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/berkasfisik') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-folder-open"></i><div data-i18n="Berkas Fisik">Berkas Fisik</div></a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pendaftaran</span></li>
            <li class="menu-item <?= strpos(uri_string(), 'admin/konfirmasi') !== false ? 'active' : '' ?>">
                <a href="<?= base_url('admin/konfirmasi') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-check-shield"></i><div data-i18n="Konfirmasi">Konfirmasi & Edit</div></a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengaturan</span></li>
            <li class="menu-item <?= uri_string() == 'admin/pengaturan' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/pengaturan') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-calendar-event"></i><div data-i18n="Jadwal SPMB">Jadwal SPMB</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/profilsekolah' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/profilsekolah') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-building-house"></i><div data-i18n="Profil Sekolah">Profil Sekolah</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/slideshow' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/slideshow') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-carousel"></i><div data-i18n="Slideshow">Slideshow</div></a>
            </li>
            <li class="menu-item <?= uri_string() == 'admin/latarbelakang' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/latarbelakang') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-image"></i><div data-i18n="Latar PDF">Latar PDF</div></a>
            </li>
        <?php else: ?>
            <li class="menu-item <?= uri_string() == 'siswa/dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('siswa/dashboard') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-home-circle"></i><div data-i18n="Dashboard">Dashboard</div></a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pendaftaran</span></li>
            <li class="menu-item <?= uri_string() == 'siswa/pendaftaran' ? 'active' : '' ?>">
                <a href="<?= base_url('siswa/pendaftaran') ?>" class="menu-link"><i class="menu-icon tf-icons bx bx-edit"></i><div data-i18n="Isi Formulir">Isi Formulir</div></a>
            </li>
        <?php endif; ?>
    </ul>
</aside>