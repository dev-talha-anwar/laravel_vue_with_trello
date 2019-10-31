<?php

namespace App;

use App\Card;
use Illuminate\Database\Eloquent\Model;

class MainList extends Model
{
	protected $table = "lists";
    public function cards(){
    	return hasMany(Card::class);
    }
}
