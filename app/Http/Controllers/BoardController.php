<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('ajax')->only('update');
    }
    public function index(){
    	$boards = Board::all();
    	return response()->json([
             'data' => $boards
        ]);
    }
}
