<?php

namespace Database\Seeders;

use App\Models\Responsable;
use Illuminate\Database\Seeder;

class ResponsableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Responsable::factory()->count(20)->create();
    }
}
