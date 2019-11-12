<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('ajax');
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'list_id' => 'required|exists:lists,id',
            'image' => 'nullable|file|mimes:jpg,jpeg,png',
            'details' => 'nullable|string'
        ]);
        if($validator->fails()):
            return response()->json(['errors' => $validator->errors()]);
        endif;
        $validatedData = $request->all();
        if($request->hasFile('image')){
        	$image = $request->image->store('cards');
        	$validatedData['image'] = $image;
        }
        if(Card::create($validatedData)):
        	$cards = Card::where('list_id',$request->list_id)->get();
        	return response()->json([
                'msg' => ['msg' => 'Card Saved Successfully.','type' => 'success'],
                'property' => $cards
            ]);
        else:
        	return response()->json([
                'msg' => ['msg' => 'Something went wrong.','type' => 'error']
            ]);
        endif;
    }
}
