<x-guest-layout>
	<x-authentication-card>
		<x-slot name="logo">

		</x-slot>

		<form action="{{ route('login') }}" method="POST">
			@csrf

			<x-slot name="content">
				<div>
					<x-label for="username" value="{{ __('Username') }}" />
					<x-input type="text" name="username" class="block w-full mt-1" :value="old('username')" required autofocus autocomplete="username"/>
				</div>

				<div class="mt-4">
					<x-label for="password" value="{{ __('Password') }}" />
					<x-input type="password" name="password" class="block w-full mt-1" required autofocus autocomplete="current-password"/>
				</div>

				<div class="block mt-4">
	                <label for="remember_me" class="flex items-center">
	                    <x-checkbox id="remember_me" name="remember" />
	                    <span class="ms-2 text-sm text-gray-600">
	                    	{{ __('Remember me') }}
	                    </span>
	                </label>
	            </div>
			</x-slot>

			<x-slot name="footer">
				 <div class="flex items-center justify-between">
	                @if (Route::has('password.request'))
	                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
	                        {{ __('Forgot your password?') }}
	                    </a>
	                @endif

	                <x-button class="ms-4">
	                    {{ __('Sign in') }}
	                </x-button>
	            </div>
			</x-slot>
		</form>
	</x-authentication-card>
</x-guest-layout>