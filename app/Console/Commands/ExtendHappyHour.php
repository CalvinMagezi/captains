<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\HappyHour;

use Carbon\Carbon;

class ExtendHappyHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'extend_happy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extends set happy hour time by a single day.';

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
        $happy = HappyHour::where('id','=',1)->first();
        $start = Carbon::parse($happy->start);
        $end = Carbon::parse($happy->end);

        $happy->update([
            'start' => $start->addDay(),
            'end' => $end->addDay(),
        ]);

        echo "Extended Happy Hour Timings \n";
    }
}
