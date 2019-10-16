<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function lists(){
    	return hasMany(Comment::class);
    }
}
