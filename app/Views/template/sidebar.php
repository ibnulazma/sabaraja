<?php
$db     = \Config\Database::connect();

$user = $db->table('tbl_user')
    ->where('id_user')
    ->get()->getRowArray();
?>

<div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="<?= base_url() ?>/foto/logo.png" alt="" width="30px">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">SIAKADINKA</span>
    </a>

    <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">
    <!-- Dashboard -->


    <?php if (session()->get('level') == 1) { ?>
        <li class="menu-item <?= $menu == 'admin' ? 'active' : '' ?>">

            <a href="<?= base_url('admin') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>

        </li>
    <?php } else if (session()->get('level') == 2) { ?>

        <li class="menu-item <?= $menu == 'pendidik' ? 'active' : '' ?>">

            <a href="<?= base_url('guru') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>

        </li>
    <?php } else if (session()->get('level') == 3) { ?>
        <li class="menu-item <?= $menu == 'siswa' ? 'active' : '' ?>">
            <a href="<?= base_url('siswa') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
    <?php } ?>
    <?php if (session()->get('level') == 1) { ?>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setting</span>
        </li>
        <li class="menu-item <?= $menu == 'ta' ? 'active' : '' ?>">
            <a href="<?= base_url('ta') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Account Settings">Tahun Pelajaran</div>
            </a>
        </li>
        <li class="menu-item <?= $menu == 'setting' ? 'active' : '' ?>">
            <a href="<?= base_url('setting') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div data-i18n="Account Settings">Profile Sekolah</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-lock-alt"></i>
                <div data-i18n="Account Settings">Akun</div>
            </a>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Akademik</span></li>
        <!-- Cards -->
        <li class="menu-item <?= $menu == 'peserta' ? 'active' : '' ?>">
            <a href="<?= base_url('peserta') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Basic">Peserta Didik</div>
            </a>
        </li>
        <li class="menu-item <?= $menu == 'guru' ? 'active' : '' ?>">
            <a href="<?= base_url('guru') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="Basic">PTK</div>
            </a>
        </li>
        <li class="menu-item <?= $menu == 'kelas' ? 'active' : '' ?>">
            <a href="<?= base_url('kelas') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                <div data-i18n="Basic">Rombel</div>
            </a>
        </li>
        <li class="menu-item <?= $menu == 'rekap' ? 'active' : '' ?>">
            <a href="<?= base_url('rekap') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-folder-down-arrow"></i>
                <div data-i18n="Basic">Pusat Unduhan</div>
            </a>
        </li>

    <?php } ?>



    <!-- Menu Untuk Guru -->
    <?php if (session()->get('level') == 2) { ?>
        <li class="menu-item <?= $menu == 'profile' ? 'active' : '' ?> <?= $menu == 'profile' ? 'open' : '' ?> ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div class="text-truncate" data-i18n="Account Settings">Profile Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= $submenu == 'profile' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/profile') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Account">Biodata</div>
                    </a>
                </li>
                <li class="menu-item <?= $submenu == 'pendidikan' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/pendidikan') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Account">Pendidikan</div>
                    </a>
                </li>
                <li class="menu-item <?= $submenu == 'keluarga' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/keluarga') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Notifications">Keluarga</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item <?= $menu == 'rombel' ? 'active' : '' ?> <?= $menu == 'rombel' ? 'open' : '' ?> ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                <div class="text-truncate" data-i18n="Account Settings">Rombel</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= $submenu == 'anggotarombel' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/rombel') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Account">Anggota</div>
                    </a>
                </li>
                <li class="menu-item <?= $submenu == 'nilai' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/nilai') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Notifications">Nilai</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-account-settings-connections.html" class="menu-link">
                        <div class="text-truncate" data-i18n="Connections">Connections</div>
                    </a>
                </li>
            </ul>
        </li>
    <?php } ?>



    <!-- SISWA -->

    <?php if (session()->get('level') == 3) { ?>
        <li class="menu-item <?= $menu == 'profilsiswa' ? 'active' : '' ?> <?= $menu == 'profilsiswa' ? 'open' : '' ?> ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div class="text-truncate" data-i18n="Account Settings">Profile</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= $submenu == 'profile' ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa/profile') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Account">Biodata</div>
                    </a>
                </li>
                <li class="menu-item <?= $submenu == 'orangtua' ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa/orangtua') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Account">Data Orang Tua</div>
                    </a>
                </li>
                <li class="menu-item <?= $submenu == 'dataperiodik' ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa/dataperiodik') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Notifications">Periodik</div>
                    </a>
                </li>
                <li class="menu-item <?= $submenu == 'datanilai' ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa/datanilai') ?>" class="menu-link">
                        <div class="text-truncate" data-i18n="Connections">Data Nilai</div>
                    </a>
                </li>
            </ul>
        </li>
    <?php } ?>

</ul>