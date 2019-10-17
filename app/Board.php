<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Board extends Model
{
	protected $fillable = [
		'img','name','owner_id'
	];
    public function lists(){
    	return hasMany('App\List');
    }
    public function users(){
    	return $this->belongsToMany('App\User')->using('App\UserBoard');
    }

    public function teams(){
    	return $this->belongsToMany('App\Team')->using('App\BoardTeam');
    }
}
