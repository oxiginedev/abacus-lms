<?php

declare(strict_types=1);

namespace App\Actions;

use App\LoginRateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class EnsureLoginIsNotThrottledAction
{
    protected $limiter;

    public function __construct(LoginRateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle(Request $request, callable $next): mixed
    {
        if ( ! $this->limiter->tooManyAttempts($request)) {
            return $next($request);
        }

        event(new Lockout($request));

        $seconds = $this->limiter->availableIn($request);

        throw ValidationException::withMessages([
            'username' => [
                trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ],
        ])->status(Response::HTTP_TOO_MANY_REQUESTS);
    }
}
