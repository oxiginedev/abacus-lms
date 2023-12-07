<?php

declare(strict_types=1);

namespace App\Actions;

use App\LoginRateLimiter;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AttemptToAuthenticateAction
{
    public function __construct(
        protected StatefulGuard $guard,
        protected LoginRateLimiter $limiter,
    ) {}

    public function handle(Request $request, callable $next): mixed
    {
        if ($this->guard->attempt(
            $request->only('username', 'password'),
            $request->boolean('remember_me')
        )) {
            return $next($request);
        }

        $this->limiter->increment($request);

        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')]
        ]);
    }
}
