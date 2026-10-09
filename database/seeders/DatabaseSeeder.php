<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@wordpress-site-inventory.com',
            'password' => bcrypt('root')
        ]);

        Site::factory()->create();
        Site::factory()->create();
        Site::factory()->create();
        Site::factory()->create();
    }
}
