<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use DB;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email_id;
    protected $toUser;
    protected $toEmail;
    protected $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email_id, $toUser, $toEmail,$content)
    {
        $this->email_id = $email_id;
        $this->toUser = $toUser;
        $this->toEmail = $toEmail;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $objDemo = new \stdClass();
        $objDemo->to_user = $this->toUser;
        $objDemo->content = $this->content;
        $objDemo->from_user = 'Demo Laravel';
        DB::table('mails')->where('id',$this->email_id)->update(['status' => 'SENDING']);

        try{
            Mail::to($this->toEmail)->send(new SendMail($objDemo));
            DB::table('mails')->where('id',$this->email_id)->update(['status' => 'DONE']);
        }
        catch(\Exception $e){
            DB::table('mails')->where('id',$this->email_id)->update(['status' => 'ERROR']);
        }
        
    }
}
