<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    // check changes in http/kernel.php
    // uncomment VerifyCsrfToken
    protected $except = [
        'tags', 'auth', 'token', '/auth/token', 'login', 'notes', 'notes/'
    ];
}
