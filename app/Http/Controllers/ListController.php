<?php

namespace App\Http\Controllers;

use App\Card;
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
        	return response()->json([
                'msg' => ['msg' => 'List Saved Successfully.','type' => 'success'],
                'data' => [
                	'lists' => $lists,
                ]
            ]);
        else:
        	return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;
    }
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'recid' => 'required|exists:lists,id'
        ]);
        if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        $validatedData['name'] = $request->name;
        if(MainList::find($request->recid)->update($validatedData)):
            $lists = MainList::all();
            return response()->json([
                'msg' => ['msg' => 'List Edited Successfully.','type' => 'success'],
                'data' => [
                    'lists' => $lists,
                ]
            ]);
        else:
            return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;
    }
    public function delete($id){
        if(MainList::destroy($id)):
            $lists = MainList::all();
            return response()->json([
                'msg' => ['msg' => 'List Deleted Successfully.','type' => 'success'],
                'data' => [
                    'lists' => $lists,
                ]
            ]);
        else:
            return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;
    }
    public function show($id){
        $cards = Card::where('list_id',$id)->get();
        return response()->json([
            'property' => $cards
        ]);
    }
}
