<?php

declare(strict_types=1);

namespace App;

use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class LoginRateLimiter
{
    protected $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function attempts(Request $request)
    {
        return $this->limiter->attempts($this->throttleKey($request));
    }

    public function tooManyAttempts(Request $request): bool
    {
        return $this->limiter->tooManyAttempts($this->throttleKey($request), 5);
    }

    public function increment(Request $request): void
    {
        $this->limiter->hit($this->throttleKey($request), 60);
    }

    public function availableIn(Request $request): int
    {
        return $this->limiter->availableIn($this->throttleKey($request));
    }

    public function clear(Request $request): void
    {
        $this->limiter->clear($this->throttleKey($request));
    }

    protected function throttleKey(Request $request): string
    {
        return Str::transliterate(
            string: Str::lower($request->input('username')) . '|' . $request->ip()
        );
    }
}
