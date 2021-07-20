<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendMailJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Email;


class MailController extends Controller
{

    public function delete_email($email_id){
        DB::table('mails')->where('id', $email_id)->delete();
        return Redirect::back();
    }

    public function send_email(){

        $allUser = DB::table('users')->get();

        foreach($allUser as $user){
            $data = array();
            $data['email'] = $user->email;
            $data['status'] = 'PENDING';
            $data['toUser'] = $user->name;
            $data['created_at'] = new \DateTime();
            $email = Email::create($data);
            $content = "Test queue";
            SendMailJob::dispatch($email['id'],$email['toUser'],$email['email'],$content);
        }
        
        return redirect()->back();
    }

    public function manage_email(){
        $email = DB::table('mails')->orderby('created_at', 'desc')->paginate(5);
        return view('email/email_page')->with('emails', $email);
    }

    public function send(){
        SendMailJob::dispatch();
        echo "Sent successfully!";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('email');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        if($validatedData){
            $details=[
                "email"=>"thanhhoacth2013@gmail.com",
                "title"=>$request->title,
                "body"=>$request->body
            ];
            dispatch(new SendMailJob($details));
            return redirect()->route('email.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
