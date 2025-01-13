<?php
// File: app/Config/Filters.php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\AuthFilter; // Pastikan AuthFilter diimpor dengan benar

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'auth'          => AuthFilter::class, // Alias untuk AuthFilter
    ];

    public array $required = [
        'before' => ['forcehttps', 'pagecache'],
        'after'  => ['pagecache', 'performance', 'toolbar'],
    ];

    public array $globals = [
        'before' => [
            // Menambahkan filter AuthFilter untuk setiap rute, kecuali login dan register
            'auth' => ['except' => ['login', 'login/*', 'register', 'register/*']]
        ],
        'after' => [],
    ];

    public array $filters = [
        'auth' => ['before' => ['dashboard/*', 'admin/*', 'other_pages/*']] // Filter 'auth' diterapkan pada rute yang memerlukan login
    ];
}


