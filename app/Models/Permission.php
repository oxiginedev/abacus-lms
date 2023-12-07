<?php

declare(strict_types=1);

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $casts = [
        'can_be_removed' => 'boolean'
    ];

    public static function generate(string $item, ?string $group = null): void
    {
        self::query()->firstOrCreate([
            'name' => 'browse_' . $item,
            'group_name' => $group ?? $item,
            'display_name' => __('Browse :item', ['item' => ucfirst($item)]),
            'description' => __('This permission allows you to browse all the :item, with actions as search, filters and more.', ['item' => $item]),
            'can_be_removed' => false
        ]);

        self::query()->firstOrCreate([
            'name' => 'read_' . $item,
            'group_name' => $group ?? $item,
            'display_name' => __('Read :item', ['item' => ucfirst($item)]),
            'description' => __('This permission allows you to read the contents of a record of :item', ['item' => $item]),
            'can_be_removed' => false
        ]);
    }
}
