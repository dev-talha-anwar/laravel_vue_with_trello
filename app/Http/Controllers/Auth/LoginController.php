<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except'=>['logout','userlogout']]);
    }

    public function userlogout(){
        Auth::guard('web')->logout();
        return response()->json([
            'refresh' => true,
        ]);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        if(Auth::guard('web')->attempt(['email'=>$request->email,'password' => $request->password])):
            return response()->json([
                'msg' => ["msg" => "Signin Successfull.","type" => "success"],
                'refresh' => true,
                'auth' => auth()->user()
            ]);
        else:
            return response()->json([
                'msg' => ['msg' => 'Invalid Values.','type' => 'error']
            ]);
        endif;
    }
}
