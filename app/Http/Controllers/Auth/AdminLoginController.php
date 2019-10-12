<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware("guest:admin",['except'=>['adminlogout']]);
        $this->middleware('ajax')->only('login');
	}

    public function showloginform(){
    	return view('auth.adminlogin');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|in:on'
        ]);
    	if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        $remember = false;
        if($request->remember){
            $remember = true;
        }
    	if(Auth::guard('admin')->attempt(['email'=>$request->email,'password' => $request->password],$remember)):
    		return response()->json([
                "url" => route('admin'),
                'msg' => ["msg" => "Signin Successfull.","type" => "success"],
                'refresh' => true
            ]);
    	else:
            return response()->json([
                'msg' => ['msg' => 'Invalid Values.','type' => 'error']
            ]);
    	endif;
    }

    public function adminlogout(){
    	Auth::guard('admin')->logout();
        return redirect('admin');
    	// return response()->json([
     //        'refresh' =>true
     //    ]);
    }
}
