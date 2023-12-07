<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CanonicalizeUsernameAction
{
    public function handle(Request $request, callable $next): mixed
    {
        $request->merge([
            'username' => Str::lower($request->input('username'))
        ]);

        return $next($request);
    }
}
