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
     */
    public function run(): void
    {
        $admin =  Role::create(["name" => "Admin"]);
       $editor =  Role::create(["name" => "Editor"]);

       $perms1 = Permission::create(["name" => "Create, Read, Update, Post"]);
        $perms2 = Permission::create(["name" => "Delete"]);

        $admin->givePermissionTo($perms1,$perms2);
        $editor->givePermissionTo($perms1);
    }
}
