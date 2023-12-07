<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\AttemptToAuthenticateAction;
use App\Actions\CanonicalizeUsernameAction;
use App\Actions\EnsureLoginIsNotThrottledAction;
use App\Actions\PrepareAuthenticatedSessionAction;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline as LaravelPipeline;
use Illuminate\Routing\Pipeline;

class AuthenticatedSessionController extends Controller
{
    public function __construct(
        protected StatefulGuard $guard,
    ) {}

    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        return $this->loginPipeline($request)->then(fn() => redirect()->intended(RouteServiceProvider::HOME));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $this->guard->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return to_route('login');
    }

    protected function loginPipeline(LoginRequest $request): LaravelPipeline
    {
        return (new Pipeline(app()))->send($request)->through(array_filter([
            EnsureLoginIsNotThrottledAction::class,
            CanonicalizeUsernameAction::class,
            AttemptToAuthenticateAction::class,
            PrepareAuthenticatedSessionAction::class,
        ]));
    }
}
