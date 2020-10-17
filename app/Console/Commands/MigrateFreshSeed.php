<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateFreshSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mfs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $this->info('migrate:fresh start');
        Artisan::call('migrate:fresh');
        $this->info('migrate:fresh end');


        $this->info('db:seed start');
        Artisan::call('db:seed');
        $this->info('db:seed end');
    }
}
