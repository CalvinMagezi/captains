<?php

namespace App\Console\Commands;

use App\Models\SectionSale;
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
        for ($i=1; $i < 4; $i++) {
            SectionSale::create([
                'section_id' => $i,
                'todays_sales' => 0,
                'yesterdays_sales' => 0,
                'weeks_sales' => 0,
                'months_sales' => 0,
                'years_sales' => 0,
            ]);
        }
    }
}
