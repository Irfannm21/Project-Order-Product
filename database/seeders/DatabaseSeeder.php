<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        "password" => bcrypt("admin")
    ]);

    \App\Models\User::factory()->create([
        'name' => 'Editor',
        'email' => 'editor@gmail.com',
        "password" => bcrypt("admin")
    ]);

    \App\Models\User::factory()->create([
        'name' => 'Irfan',
        'email' => 'irfan@admin.com',
        "password" => bcrypt("admin")
    ]);

    $this->call(
        [
            \Database\Seeders\RoleSeeder::class
        ]
        );

        \App\Models\User::find(1)->assignRole("Admin");
        \App\Models\User::find(2)->assignRole("Editor");
    }
}
