<?php

namespace App;

use App\Card;
use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    public function cards(){
    	return hasMany(Card::class);
    }
}
