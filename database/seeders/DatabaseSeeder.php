<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create(["name" => "Naufalix",  "username" => "naufalix",  "password" => bcrypt('admin')]);
        User::create(["name" => "Afianada",  "username" => "afianadaaa",  "password" => bcrypt('admin')]);
        User::create(["name" => "Haniefa",  "username" => "haniefa",  "password" => bcrypt('admin')]);

        
    }
}
