<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Jobs\SendMailJob;
use App\Models\Email;
use Carbon\Carbon;
use DateTime;

class notifyUnreadProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:unreadProduct';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to admin about unread product';

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
        $admin = DB::table('users')
        ->join('model_has_roles','model_has_roles.model_id','=','users.id')
        ->join('roles','roles.id','=','model_has_roles.role_id')
        ->where('roles.name','admin')
        ->get();

        $products = DB::table('product')->get();

        foreach($admin as $value){
            foreach($products as $product){
                $from_date = $product->last_access_time;
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
                    $content = "Product " .$product->product_name ." was not read yesterday";
                    SendMailJob::dispatch($email['id'],$email['toUser'],$email['email'],$content);
                }
            }
        }
        return 0;
    }
}
