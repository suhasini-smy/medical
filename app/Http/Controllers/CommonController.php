<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    static function callMasterProcedure($procedure)
    {
        try{

            return DB::select("CALL ".$procedure);
        }catch(Exception $e)
        {

        }
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
        //
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


    static function sendMessage($sender_address, $sender_name, $email, $subject, $body)
    {

        $transport = (new Swift_SmtpTransport(env('MAIL_HOST'), env('MAIL_PORT')))
            ->setUsername(env('MAIL_USERNAME'))
            ->setPassword(env('MAIL_PASSWORD'));

        $mailer    = new Swift_Mailer($transport);

        $message   = (new Swift_Message($subject))
            ->setFrom($sender_address, $sender_name)
            ->setTo($email)
            ->setBody($body)
            ->setContentType('text/html');
            try{
                return $result = $mailer->send($message);
            } catch(\EXCEPTION $e)
            {
                echo $e->getMessage();
            }

    }

}
