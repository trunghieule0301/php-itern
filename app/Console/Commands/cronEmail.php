<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Jobs\SendMailJob;
use App\Models\Email;
use Carbon\Carbon;
use DateTime;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to inactive users';

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
        $handle_inactive_user = DB::table('users')->get();

        foreach($handle_inactive_user as $value){

            //check last login
            $from_date = $value->last_login_time;
            $to_date = Carbon::now('Asia/Ho_Chi_Minh');
            $first_datetime = new DateTime($from_date);
            $last_datetime = new DateTime($to_date);
            $interval = $first_datetime->diff($last_datetime);
            $final_days = $interval->format('%a');

            if($final_days == 1){
                $data = array();
                $data['email'] = $value->email;
                $data['status'] = 'PENDING';
                $data['toUser'] = $value->name;
                $data['created_at'] = new \DateTime();
                $email = Email::create($data);
                $content = "Send email to inactive users";
                SendMailJob::dispatch($email['id'],$email['toUser'],$email['email'],$content);
            }

        }

        return 0;
    }
}
