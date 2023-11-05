<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UpgradeToHttpsUnderNgrok
{
    /**
     * Used to force https scheme with ngrok
     */
    public function handle(Request $request, Closure $next) {

        if (str_ends_with($request->getHost(), '.ngrok-free.app')) {
            URL::forceScheme('https');
        }

        return $next($request);
    }
}
