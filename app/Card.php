<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	protected $fillable = [
		'name','details','image','list_id'
	];
    public function lists(){
    	return hasMany(Comment::class);
    }
}
