<?php

namespace App;

use App\Admin;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	protected $fillable = [
		'name','details','image','list_id'
	];

}
