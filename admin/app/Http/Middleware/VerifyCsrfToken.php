<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware {

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $addHttpCookie = true;
    protected $except = [
        //
        'api_content', 'api_product_listing','save_content_image'
    ];

}
