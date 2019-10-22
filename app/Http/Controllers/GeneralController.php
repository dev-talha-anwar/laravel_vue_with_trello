<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('ajax');
    }
    
    public function index()
    {
        $general = General::first();
        return response()->json([
            'data' => $general
        ]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|mimes:jpg,jpeg,png',
            'Facebook' => 'required|string',
            'Twitter' => 'required|string',
            'Instagram' => 'required|string',
            'Linkedin' => 'required|string',
        ]);
        if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        $general = General::first();
        if($request->hasFile('logo')):
            $oldpic = $general->logo;
            if($general->logo = $request->logo->store('logo')):
                Storage::delete($oldpic);
            else:
                return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
                ]);
            endif;
        endif;
        $sociallinks = [
            'Facebook' => $request->Facebook,
            'Twitter' => $request->Twitter,
            'Instagram' => $request->Instagram,
            'Linkedin' => $request->Linkedin
        ];
        $general->social_links = json_encode($sociallinks);
        if($general->save()):
            return response()->json([
                'msg' => ['msg' => 'General Settings Edited Successfully.','type' => 'success'],
                'data' => $general
            ]);
        else:
            return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;
    } 
}
