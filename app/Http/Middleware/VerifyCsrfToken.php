<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://jay.master.net/web_builder/*',
        'http://jay.master.net/pageBuilder',
        'http://jay.master.net/pageBuilder/*',
        'http://jay.master.net/dashboard/*/*',
    ];
}
