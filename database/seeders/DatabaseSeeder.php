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
        // \App\Models\Villes::factory(15)->create();

        // \App\Models\User::factory(100)->create(); pas nécéssaire puisque le factory(100) se fait directement dans le EtudiantsFactory

        // \App\Models\Etudiants::factory(100)->create();

        \App\Models\ForumPost::factory(10)->create();
    }
}
