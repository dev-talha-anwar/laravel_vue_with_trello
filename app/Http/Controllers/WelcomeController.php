<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JavaScript;
class WelcomeController extends Controller
{
    public function index()
    {
    	JavaScript::put([
        'assets' => asset('assets'),
        'storagepath' => Storage::disk('public')->url('/'),
        ]);
        return view('theme.index');
    }
}