<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminateSupportFacadesValidator;
use IlluminateFoundationBusDispatchesJobs;
use IlluminateFoundationValidationValidatesRequests;
use IlluminateFoundationAuthAccessAuthorizesRequests;
use IlluminateFoundationAuthAccessAuthorizesResources;
use IlluminateHtmlHtmlServiceProvider;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\User;
use Input;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        //
        return view('users.login');
    }

  public function doLogout()
    {
        Session::flush();

        Auth::logout(); // logging out user
        return Redirect::to('crm-login'); // redirection to login screen
    }

  public function doLogin(LoginRequest $request)
    {

        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
        ]);
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $credentials = $request->getCredentials();
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            return array('status'=>'success','msg'=>'Successfully logged in','code'=>200,'redirect'=>true);
        } else {
           return response()->json(['errors'=> array('msg'=>'Username or Password is incorrect')], 422);
        }

    }

    protected function authenticated(Request $request, $user)
    {
        if($user)
        {
            return array('status'=>'success','msg'=>'Successfully logged in','code'=>200,'redirect'=>true);
        }else{
            return response()->json(['errors'=> array('msg'=>'Failed toUpdate.')], 422);
        }

    }

    function openRegisterForm()
    {
        return view('users.register');
    }

    function forgotPassword()
    {
        return view('users.forgot');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request)
    {
        //
        $validated = $request->validate([
            'email' => 'required|email',
        ],
        [
            'email.required' => 'Email field is required.'
        ]);
        $u_email=$request->email;

        $email= array('email'=>$u_email);
        $get = User::whereIn('email', $email)->get()->toArray();
        if($get)
        {
            $sender_name=$get[0]['f_name'];
            $user_lname=$get[0]['l_name'];
            $sender_address="xyz@gmail.com";//from address i.e sswebhelps@gmail.com
            $subject = NULL;

            $sePasswordlink = "http://localhost:100/setPassword";

            $body = '<html>
                    <head>
                        <title>Welcome to CodexWorld</title>
                    </head>
                    <body>
                        <h1>Your Reset Password is Below!</h1>
                        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">
                            <tr>
                                <th>Name:</th><td>'.$sender_name.'-'.$user_lname.'</td>
                            </tr>
                            <tr style="background-color: #e0e0e0;">
                                <th>Email:</th><td>'.$u_email.'</td>
                            </tr>
                            <tr>
                                <th>Set Password link:</th><td><a href="'.$sePasswordlink.'">Reset Password</a></td>
                            </tr>
                            <tr>
                                <th>website:</th><td><a href="'.$sePasswordlink.'">Website</a></td>
                            </tr>
                        </table>
                    </body>
                    </html>';

            $send  = CommonController::sendMessage($sender_address, $sender_name, $email, $subject, $body);

            if($send==1)
            {
                return array('status'=>'success','msg'=>'Sent mail','code'=>200,'redirect'=>true);
            }else{
               return response()->json(['errors'=> array('msg'=>'please enter valida email')], 422);
            }

        }else
        {
           return response()->json(['errors' => array('msg'=>'please enter valida email')],422);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

       $auth= auth()->login($user);

        if($user){
            return array('status'=>'success','msg'=>'Account successfully registered.','code'=>200,'redirect'=>true);
        }else{
            return response()->json(['errors'=> array('msg'=>'Failed not registered.')], 422);
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
