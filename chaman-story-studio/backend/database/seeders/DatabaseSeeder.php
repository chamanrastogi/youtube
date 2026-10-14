<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Creates the demo user (demo@example.com / password) and ~8 sample
     * Milky / family Hindi comedy stories.
     */
    public function run(): void
    {
        $this->call(StorySeeder::class);
    }
}
