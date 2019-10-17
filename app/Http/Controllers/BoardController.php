<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('ajax');
    }
    public function index(){
    	$boards = Board::paginate(12);
    	return response()->json([
             'data' => $boards
        ]);
    }
    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:255'
        ]);
        if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        if($data['img'] = $request->image->store('boards')):
        	$data['name'] = $request->name;
            $data['owner_id'] = auth()->user()->id;
        	if(Board::create($data)):
        		$boards = Board::paginate(12);
            return response()->json([
                'msg' => ['msg' => 'Board Added Successfully.','type' => 'success'],
                'data' => $boards
            ]);
	        else:
	            return response()->json([
	                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
	            ]);
	        endif;
        else:
        	return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;  
    }
}
