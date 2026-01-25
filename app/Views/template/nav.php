<?php



$db = \Config\Database::connect();

$level    = session()->get('level');
$username = session()->get('username');

// Default
$roleLabel = 'User';
$avatar    = base_url('foto/default.png');
$nama     = session()->get('nama'); // fallback nama dari session

// Mapping avatar berdasarkan gender
$avatarMap = [
    'admin' => 'foto/default.png',
    'guru'  => [
        'L' => 'foto/muslim.png',
        'P' => 'foto/woman.png',
    ],
    'siswa' => [
        'L' => 'foto/muslim.png',
        'P' => 'foto/woman.png',
    ],
];

switch ($level) {
    case 1: // Admin
        $roleLabel = 'Admin';
        $avatar    = base_url($avatarMap['admin']);
        // Nama tetap dari session
        break;

    case 2: // Guru
        $roleLabel = 'Guru';
        $guru = $db->table('tbl_guru')->where('niy', $username)->get()->getRowArray();

        if ($guru) {
            $nama     = $guru['nama_guru'] ?? $nama; // ambil nama guru jika ada
            $kelamin  = strtoupper(trim($guru['kelamin'] ?? ''));
            $avatar   = !empty($guru['foto'])
                ? base_url('foto/' . $guru['foto'])
                : base_url($avatarMap['guru'][$kelamin] ?? 'foto/default.png');
        }
        break;

    case 3: // Siswa
        $roleLabel = 'Siswa';
        $siswa = $db->table('tbl_siswa')->where('nisn', $username)->get()->getRowArray();

        if ($siswa) {
            $nama    = $siswa['nama_siswa'] ?? $nama; // ambil nama siswa jika ada
            $kelamin = strtoupper(trim($siswa['jenis_kelamin'] ?? ''));
            $avatar  = !empty($siswa['foto'])
                ? base_url('foto/' . $siswa['foto'])
                : base_url($avatarMap['siswa'][$kelamin] ?? 'foto/default.png');
        }
        break;
}










?>






<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
    </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <span class="fw-semibold d-block"><?= esc($nama) ?></span>
        </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="<?= $avatar ?>" alt class="w-px-40 h-auto rounded-circle" />
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="<?= $avatar ?>" alt class="w-px-40 h-auto rounded-circle" />

                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block"><?= esc($nama) ?></span>
                                <small class="text-muted"><?= $roleLabel ?></small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>