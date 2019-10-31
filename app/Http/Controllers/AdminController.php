<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Board;
use App\MainList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use JavaScript;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('ajax')->only('update');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        JavaScript::put([
        'adminassets' => asset('adminassets'),
        'storagepath' => Storage::disk('public')->url('/'),
        ]);
        return view('adminviews.index');
    }
    public function edit($admin){
        $admin = Admin::find($admin);
        return response()->JSON([
            'data' => $admin
        ]); 
    }
    public function update(Request $request,$admin){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'nullable|string'
        ]);
        if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        $admin = Admin::find($admin);
        $admin->name = $request->name;
        if(!empty($request->password)):
        $admin->password = Hash::make($request->password);
        endif;
        if($admin->save()):
            return response()->json([
                'msg' => ['msg' => 'Profile Edited Successfully.','type' => 'success'],
                'data' => $admin
            ]);
        else:
            return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;
    }
}
