<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\FilterAdmin;
use App\Filters\FilterPendidik;
use App\Filters\FilterPeserta;
use App\Filters\FilterLulus;


class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteradmin'   => FilterAdmin::class,
        'filterpeserta'    => FilterPeserta::class,
        'filterpendidik'    => FilterPendidik::class,
        'filterlulus'    => FilterLulus::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'filteradmin' =>
            [
                'except' => [
                    'auth',
                    'auth/*',
                    'home',
                    'home/*',
                    'datasiswa',
                    'datasiswa/*',
                    'siswa',
                    'siswa/*',
                    'kelulusan/',
                    'kelulusan/*',
                    '/',
                    // 
                ]
            ],

            'filterpeserta' =>
            [
                'except' => [
                    'auth',
                    'auth/*',
                    'home',
                    'home/*',
                    'loginsiswa',
                    'loginsiswa/*',
                    'datasiswa',
                    'datasiswa/*',
                    'kelulusan/',
                    'kelulusan/*',
                    '/',


                ]
            ],
            'filterpendidik' =>
            [
                'except' => [
                    'auth',
                    'auth/*',
                    'home',
                    'home/*',
                    'loginguru',
                    'loginguru/*',
                    'datasiswa',
                    'datasiswa/*',
                    'kelulusan/',
                    'kelulusan/*',
                    '/',


                ]
            ],
            'filterlulus' =>
            [
                'except' => [
                    'auth',
                    'auth/*',
                    'home',
                    'home/*',
                    '/',


                ]
            ],

            // 'csrf',
            // 'filterpendidik' =>
            // [
            //     'except' => [
            //         'auth', 'auth/*',
            //         'home', 'home/*',
            //         '/'

            //     ]
            // ],
        ],
        'after' => [
            'filteradmin' =>
            [
                'except' => [

                    'admin',
                    'admin/*',
                    'guru',
                    'guru/*',
                    'kelas',
                    'kelas/*',
                    'mapel',
                    'mapel/*',
                    'jadwal',
                    'jadwal/*',
                    'ta',
                    'ta/*',
                    'user',
                    'user/*',
                    'peserta',
                    'peserta/*',
                    'surat',
                    'surat/*',
                    'setting',
                    'setting/*',
                    'ppdb',
                    'ppdb/*',
                    'nilai',
                    'nilai/*',
                    'datatables',
                    'datatables/*',
                    'presensi',
                    'presensi/*',
                    'rekap',
                    'rekap/*'
                ]
            ],

            'filterpeserta' =>
            [
                'except' => [
                    'siswa',
                    'siswa/*',
                    'presensi',
                    'presensi/*',
                    'pelajaran',
                    'pelajaran/*',
                    'pengajuan',
                    'pengajuan/*',


                ]
            ],
            'filterpendidik' =>
            [
                'except' => [
                    'pendidik',
                    'pendidik/*',
                    'nilai',
                    'nilai/*',


                    // '/',
                ]
            ],
            'filterlulus' =>
            [
                'except' => [
                    'kelulusan',
                    'kelulusan/*',

                    // '/',
                ]
            ],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
