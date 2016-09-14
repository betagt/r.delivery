<?php

namespace CodeDelivery\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'oauth/access_token',
        'api/*',
        'store_user',
        'remember_me',
    ];
}
