<?php

namespace App\Listeners;

use App\Events\ReadTracking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use DB,Session,Auth;

class ReadTrackingHandling
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ReadTracking  $event
     * @return void
     */
    public function handle(ReadTracking $event)
    {
        $user = Auth::user()->username;
        $count = DB::table('users')
        ->where('username',$user)
        ->get();
        $countPlus = $count[0]->read_count + 1;
        DB::table('users')->where('username',$user)->update(['read_count' => $countPlus]);
        
    }
}
