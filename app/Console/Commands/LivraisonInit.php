<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LivraisonInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livraison:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('make:Model Livraison -m'); // optional arguments
        $this->call('make:livewire LivraisonController');
        $this->call('make:factory LivraisonFactory --model=Livraison');
        $this->call('make:seed LivraisonSeed');
    }
}
