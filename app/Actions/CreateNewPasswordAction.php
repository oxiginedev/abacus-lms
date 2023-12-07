<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Http\Request;

class CreateNewPasswordAction
{
    public function handle(Request $request, callable $next): mixed
    {
        return $next($request);
    }
}
