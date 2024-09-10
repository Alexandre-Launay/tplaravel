<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Civilite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Civilite::factory(3)->create();

        Client::factory(10)->create();

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@tplaravel.com',
            'password' => bcrypt('Test1234'),
        ]);
    }
}
