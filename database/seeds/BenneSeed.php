<?php

namespace Database\Seeders;

use App\Benne;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenneSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Benne::factory()->count(20)->create();
    }
}
