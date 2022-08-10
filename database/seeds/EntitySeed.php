<?php

namespace Database\Seeders;

use App\Models\Entity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entity::factory()->count(10)->create();
    }
}
