<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User Test',
            'email' => 'user@example.com',
            'password' => bcrypt('password')
        ]);

        User::factory(5)->create();
        Board::factory(20)->create();
    }
}
