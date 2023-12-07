<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Roles\CreateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): void {}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleRequest $request): void {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): void {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): void {}
}
