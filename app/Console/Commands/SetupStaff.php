<?php

namespace App\Console\Commands;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Console\Command;

class SetupStaff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settup:staff';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure users that are staff members into staff table';

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
        $staff = User::where('role','=','staff')->get();
        if(count($staff)){
            foreach($staff as $staff_member){
                $new_staff = new Staff([
                    'staff_number' => $staff_member->staff_number,
                    'color_code' => $staff_member->color_code,
                    'user_key_id' => $staff_member->id
                ]);
                $new_staff->save();
            }
        }

        echo "Successfully Configured Staff";
    }
}
