<?php

declare(strict_types=1);

namespace App\Actions;

use App\LoginRateLimiter;
use Illuminate\Http\Request;

class PrepareAuthenticatedSessionAction
{
    public function __construct(
        protected LoginRateLimiter $limiter
    ) {}

    public function handle(Request $request, callable $next): mixed
    {
        if ($request->hasSession()) {
            $request->session()->regenerate();
        }

        $this->limiter->clear($request);

        return $next($request);
    }
}
