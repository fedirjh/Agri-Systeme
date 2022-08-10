<?php

namespace Database\Seeders;

use App\Models\Agriculteur;
use Illuminate\Database\Seeder;

class AgriculteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agriculteur::factory()->count(20)->create();

    }
}
