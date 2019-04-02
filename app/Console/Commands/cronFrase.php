<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\GeneradorController;
class cronFrase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:makeFrase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se genera una frase cada 5 minutos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $generador = new GeneradorController();
        $generador->buscarFraseYElegirRandom();
    }
}
