<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $role=Role::create(['name' => 'Admin']);
        Role::create(['name' => 'user']);
        Permission::create(['name' => 'comment']);
        $permission= Permission::create(['name' => 'Delete']);
        Role::create(['name' => 'writer']);
        $role->givePermissionTo('comment');
        $permission->assignRole('Admin');
    }
}
