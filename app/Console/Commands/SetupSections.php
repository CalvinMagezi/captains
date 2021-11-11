<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupSections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settup:sections';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup different sections based on inventory types';

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
        return Command::SUCCESS;
    }
}
