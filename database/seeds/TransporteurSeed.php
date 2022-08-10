<?php

namespace Database\Seeders;

use App\Transporteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransporteurSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transporteur::factory()->count(20)->create();
    }
}
