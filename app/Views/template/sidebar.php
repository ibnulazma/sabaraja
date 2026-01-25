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

<?php $level = session()->get('level'); ?>

<ul class="menu-inner py-1">

    <!-- DASHBOARD SESUAI ROLE -->
    <?php if ($level == '1'): ?>
        <li class="menu-item <?= $menu == 'admin' ? 'active' : '' ?>">
            <a href="<?= base_url('admin') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

    <?php elseif ($level == '2'): ?>
        <li class="menu-item <?= $menu == 'pendidik' ? 'active' : '' ?>">
            <a href="<?= base_url('pendidik') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

    <?php elseif ($level == '3'): ?>
        <li class="menu-item <?= $menu == 'siswa' ? 'active' : '' ?>">
            <a href="<?= base_url('siswa') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>
    <?php endif; ?>


    <!-- ================= ADMIN MENU ================= -->
    <?php if ($level == '1'): ?>
        <li class="menu-header small text-uppercase"><span>Setting</span></li>

        <li class="menu-item <?= $menu == 'ta' ? 'active' : '' ?>">
            <a href="<?= base_url('ta') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div>Tahun Pelajaran</div>
            </a>
        </li>

        <li class="menu-item <?= $menu == 'setting' ? 'active' : '' ?>">
            <a href="<?= base_url('setting') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-school"></i>
                <div>Profil Sekolah</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span>Akademik</span></li>

        <li class="menu-item <?= $menu == 'peserta' ? 'active' : '' ?>">
            <a href="<?= base_url('peserta') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div>Peserta Didik</div>
            </a>
        </li>

        <li class="menu-item <?= $menu == 'guru' ? 'active' : '' ?>">
            <a href="<?= base_url('guru') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div>PTK</div>
            </a>
        </li>

        <li class="menu-item <?= $menu == 'kelas' ? 'active' : '' ?>">
            <a href="<?= base_url('kelas') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                <div>Rombel</div>
            </a>
        </li>

        <li class="menu-item <?= $menu == 'rekap' ? 'active' : '' ?>">
            <a href="<?= base_url('rekap') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-folder-down-arrow"></i>
                <div>Pusat Unduhan</div>
            </a>
        </li>
    <?php endif; ?>


    <!-- ================= GURU MENU ================= -->
    <?php if ($level == '2'): ?>
        <li class="menu-item <?= $menu == 'profile' ? 'active open' : '' ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div>Profile Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= $submenu == 'profile' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/profile') ?>" class="menu-link">Biodata</a>
                </li>
                <li class="menu-item <?= $submenu == 'pendidikan' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/pendidikan') ?>" class="menu-link">Pendidikan</a>
                </li>
                <li class="menu-item <?= $submenu == 'keluarga' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/keluarga') ?>" class="menu-link">Keluarga</a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?= $menu == 'rombel' ? 'active open' : '' ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                <div>Rombel</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= $submenu == 'anggotarombel' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/rombel') ?>" class="menu-link">Anggota</a>
                </li>
                <li class="menu-item <?= $submenu == 'nilai' ? 'active' : '' ?>">
                    <a href="<?= base_url('pendidik/nilai') ?>" class="menu-link">Nilai</a>
                </li>
            </ul>
        </li>
    <?php endif; ?>


    <!-- ================= SISWA MENU ================= -->
    <?php if ($level == '3'): ?>
        <li class="menu-item <?= $menu == 'profilsiswa' ? 'active open' : '' ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div>Profile</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?= $submenu == 'profile' ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa/profile') ?>" class="menu-link">Biodata</a>
                </li>
                <li class="menu-item <?= $submenu == 'orangtua' ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa/orangtua') ?>" class="menu-link">Data Orang Tua</a>
                </li>
                <li class="menu-item <?= $submenu == 'dataperiodik' ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa/dataperiodik') ?>" class="menu-link">Periodik</a>
                </li>
                <li class="menu-item <?= $submenu == 'datanilai' ? 'active' : '' ?>">
                    <a href="<?= base_url('siswa/datanilai') ?>" class="menu-link">Data Nilai</a>
                </li>
            </ul>
        </li>
    <?php endif; ?>

</ul>