<div class="min-h-screen flex flex-col sm:justify-center items-center py-12 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 shadow-xl shadow-secondary-200 overflow-hidden sm:rounded-lg">
        <div class="px-10 py-6 bg-white">
            {{ $content }}
        </div>
        <div class="px-10 py-4 border-t border-secondary-200 bg-secondary-50">
            {{ $footer }}
        </div>
    </div>
</div>
