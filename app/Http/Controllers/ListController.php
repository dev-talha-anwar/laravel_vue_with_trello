<?php

namespace App\Http\Controllers;

use App\MainList;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('ajax');
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id'
        ]);
        if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        if(MainList::create($request->all())):
        	$lists = MainList::all();
        	$teams = Team::all();
        	return response()->json([
                'msg' => ['msg' => 'List Saved Successfully.','type' => 'success'],
                'data' => [
                	'lists' => $lists,
                	'teams' => $teams
                ]
            ]);
        else:
        	return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;

    }

}
