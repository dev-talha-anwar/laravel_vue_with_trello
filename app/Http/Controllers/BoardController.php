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
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:255',
            'recid' => 'required|numeric|exists:boards,id'
        ]);
        if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        if($request->hasFile('image')):
            if($data['img'] = $request->image->store('boards')):
            else:
                return response()->json([
                    'msg' => ['msg' => 'Something went wrong.','type' => 'error']
                ]);
            endif;  
        endif;
        $data['name'] = $request->name;
        $data['owner_id'] = auth()->user()->id;
        if(Board::find($request->recid)->update($data)):
            $boards = Board::paginate(12);
            return response()->json([
                'msg' => ['msg' => 'Board Edited Successfully.','type' => 'success'],
                'data' => $boards
            ]);
        else:
            return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;
    }
    public function destroy($id){
        if(Board::find($id)):
            if(Board::destroy($id)):
                return response()->json([
                    'msg' => ['msg' => 'Board Deleted Successfully.','type' => 'success'],
                    'data' => Board::paginate(12)
                    ]);
            else:
                return response()->json([
                    'msg' => ['msg' => 'Something went wrong.','type' => 'error']
                    ]);
            endif;
        else:
            return response()->json([
                'msg' => ['msg' => 'Board Does Not Exist.','type' => 'error']
            ]);
        endif;
    }
}
