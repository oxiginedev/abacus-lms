<aside class="hidden md:block md:shrink-0 w-22 bg-gray-800">
	<div class="flex items-center justify-center py-4">
		<a href="{{ route('dashboard') }}">
			<x-application-mark class="w-auto h-10" />
		</a>
	</div>

	<nav>
		<x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
			<x-icons.home class="w-7 h-auto fill-current"/>
			<span>{{ __('Home') }}</span>
		</x-nav-link>

		<x-nav-link>
			<x-icons.book class="w-7 h-auto fill-current"/>
			<span>{{ __('Courses') }}</span>
		</x-nav-link>

		<x-nav-link>
			<x-icons.calendar class="w-7 h-auto fill-current"/>
			<span>{{ __('Calendar') }}</span>
		</x-nav-link>
	</nav>
</aside>