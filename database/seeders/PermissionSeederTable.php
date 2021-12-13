<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'sale']);
        Role::create(['name' => 'invoice']);
        Role::create(['name' => 'warehouse']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);
    }
}
