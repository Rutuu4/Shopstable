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
        'http://*/web_builder/*',
        'http://*/pageBuilder',
        'http://*/pageBuilder/*',
        'http://*/dashboard/*/*',
        'http://*/menuBuilder/',
        'http://*/menuBuilder/*',
    ];
}
