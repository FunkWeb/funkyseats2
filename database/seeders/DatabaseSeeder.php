<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Location;
use App\Models\ResourceType;
use App\Models\Role;
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
        Role::create(['name' => 'admin', 'description' => 'Administrator']);
        Role::create(['name' => 'student', 'description' => 'Deltaker']);

        ResourceType::create(['name' => 'Plass', 'description' => 'Kontorplass']);
        ResourceType::create(['name' => 'Parkering', 'description' => 'Parkeringsplass i garasjeanlegg']);
    }
}
