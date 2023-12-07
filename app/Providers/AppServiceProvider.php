<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StatefulGuard::class, fn() => Auth::guard('web'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        Gate::after(function (User $user, string $ability): bool {
            return $user->hasRole('Super Admin');
        });
    }
}
